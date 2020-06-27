<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Room;
use App\Mail\MailReservSender;
use App\Http\Requests\ReservRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Services\DateConverter;
use DateTime;
use Mail;

class ReservationController extends Controller
{
  // метод возвращает страницу с брониваронием с данными о занятых датах и типе выбранного номера,
  // если был отправлен параметр в строке
    public function index(Request $req){
        try {
            // $records = DB::table('records')->get();
            $rooms = DB::table('rooms')->get();
        } catch (Exception $e) {
            return response()->view('errors.500', [], 500);
        }
        $type = $req->route('type');
        if ($type == null){
          $type = 6;
        }
        return view('reservation.reserv', compact( 'rooms', 'type' ));
        // return view('reservation.reserv', compact( 'rooms', 'type', 'disableDates' ));
    }

    // метод добавляет заявку на бронирование номера и отправляет владельцу на почту письмо с новой заявкой
    protected function AddUserToSheduler (ReservRequest $req ){

        $record = new Record();
        $room = new Room();
        $record->arrival_date = $req->input('arrival');
        $record->departure_date = $req->input('depart');

        $record->email = $req->input('email');
        $record->count_persons = $req->input('count');
        $record->type_room = $req->input('type');
        $record->username = $req->input('username');
        $record->phone = $req->input('phone');
        $record->uuid = Str::uuid();
        $record->confirmed = false;
        try{
            // получение разницы в днях между заселением и выселением
            $arrival = DateTime::createFromFormat("m/d/Y", $record->arrival_date);
            $depart = DateTime::createFromFormat("m/d/Y", $record->departure_date);
            $interval = $arrival->diff($depart);
            $curDate = new DateTime();
            $curDate->format('m/d/Y');
            if($arrival < $curDate || $depart < $curDate){
                return redirect()->route('reserv-page')->with('error', 'Некорректное значение  даты.');
            }
            $room =  DB::table('rooms')->where('type', $record->type_room)->first();
            if($room == null){
                return redirect()->route('reserv-page')->with('error', 'Заявка не была обработана, попробуйте позже.');
            }
            $record->price = $room->price * $interval->d;
            $record->save();

        }catch(Exception $e){
            return redirect()->route('reserv-page')->with('error', 'Заявка не была обработана, попробуйте позже.');
        }
        Mail::send(new MailReservSender($record, $room->name));
        return redirect()->route('reserv-page')->with('success-record', 'Заявка была отправлена.');
    }

    // метод осущствляет поиск свободных номеров по указаным датам и типу
    protected function FetchRoomsByType(Request $req){
        $arrival = $req->input('date-start');
        $depart = $req->input('date-end');
        $type = $req->input('type-room');
        $count = $req->input('count-person');
        if(($arrival == null) || ($depart == null) || ($type == null)) {
            return response()->view('errors.404', [], 404);
        }
        $available1 = 0;
        $available2 = 0;
        $available3 = 0;
        $records = null;
        $rooms = null;
        try {
            $converter = new DateConverter();
            if($type == 0){
                $records = DB::table('records')->get();
            }else{
                $records = DB::table('records')->where('type_room', $type)->get();
                if($type == 1){
                  $available2 = 5;
                  $available3 = 6;
                }
                if($type == 2){
                  $available1 = 11;
                  $available3 = 6;
                }
                if($type == 3){
                  $available1 = 11;
                  $available2 = 5;
                }
            }
            foreach($records as $r){
              $converter->setDates($r->arrival_date, $r->departure_date);
              foreach($converter->getDates() as $date){
                if((($date > $arrival) && ($date < $depart)) || (($date == $arrival) || ($date == $depart))) {
                  switch ($r->type_room) {
                    case 1:
                    $available1 += 1;
                    break;
                    case 2:
                    $available2 += 1;
                    break;
                    case 3:
                    $available3 += 1;
                    break;
                    default:
                    $available2 += 100;
                    break;
                  }
                  break;
                }
              }
            }
            $rooms = DB::table('rooms')->get();
            $data = array(
                        'available1'  => $available1,
                        'available2' => $available2,
                        'available3' => $available3
                    );
            return view('reservation.reserv',  compact( 'rooms', 'type', 'data', 'arrival', 'depart', 'count' ));
        } catch (Exception $e) {
            return response()->view('errors.500', [], 500);
        }
    }

    // метод подтверждает заявку с запроса прищедшего из почты владельца
    protected function ConfirmClient ( Request $req ){
        $uuid = $req->route('uuid');
        if($uuid == null){
            return response()->view('errors.404', [], 404);
        }
        try {
            $findRecord = DB::table('records')->where('uuid', $uuid)->first();
            if(empty($findRecord)){
                return 'Не найдена запись в бд с таким идентификатором.';
            }else {
                DB::table('records')->where( 'uuid', $findRecord->uuid )->update(['confirmed' => true]);
            }
        } catch (Exception $e) {
            return response()->view('errors.500', [], 500);
        }

        return "<strong>Заявка успешно подтверждена.</strong>";
    }
}
