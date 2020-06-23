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
        // $a1 = new DateConverter();
        // $a2 = new DateConverter();
        // $a3 = new DateConverter();
        // $a4 = new DateConverter();
        // $disableDates = array();
        // foreach($records as $record){
        //     switch ($record->type_room) {
        //         case 1:
        //             $a1->setDates($record->arrival_date, $record->departure_date);
        //           break;
        //         case 2:
        //             $a2->setDates($record->arrival_date, $record->departure_date);
        //           break;
        //         case 3:
        //             $a3->setDates($record->arrival_date, $record->departure_date);
        //           break;
        //         case 4:
        //             $a4->setDates($record->arrival_date, $record->departure_date);
        //           break;
        //     }
        // }
        // array_push($disableDates, $a1->getDates(), $a2->getDates(), $a3->getDates(), $a4->getDates());
        // // return dd($disableDates);
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
            $curDate = date("m/d/Y");
            if($curDate->diff($arrival) < 0 || $curDate->diff($depart) < 0){
                return view('reservation.reserv')->with('error', 'Некорректное значение  даты.');
            }
            $room =  DB::table('rooms')->where('type', $record->type_room)->first();
            if($room == null){
                return view('reservation.reserv')->with('error', 'Заявка не была обработана, попробуйте позже.');
            }
            $record->price = $room->price * $interval->d;
            $record->save();

        }catch(Exception $e){
            return view('reservation.reserv')->with('error', 'Заявка не была обработана, попробуйте позже.');
        }
        Mail::send(new MailReservSender($record, $room->name));
        return view('reservation.reserv')->with('success-record', 'Заявка была отправлена.');
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
            }
            foreach($records as $r){
              $check = true;
              $converter->setDates($r->arrival_date, $r->departure_date);
              foreach($converter->getDates() as $date){
                if((($date > $arrival) && ($date < $depart)) || (($date == $arrival) || ($date == $depart))) {
                  $check = false;
                  break;
                }
              }
              if($check){
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
                }
              }
            }
            $rooms = DB::table('rooms')->get();
            // array_push($availables, $type_1, $type_2, $type_2);
            // if($type_1 < 10){  array_push($availables, $type_1);  } else $type_1 = 0;
            // if($type_2 < 5){  array_push($availables, $type_2);  } else $type_2 = 0;
            // if($type_3 < 4){ array_push($availables, $type_3);  } else $type_3 = 0;
            // if($type == 0){
            //     $rooms_available = DB::table('rooms')->where('type',  [$type_1, $type_2, $type_3])->get();
            // }else{
            //     $rooms_available = DB::table('rooms')->where('type',  $type_1)->get();
            // }
            // return dd($available2);
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
