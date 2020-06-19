<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Http\Requests\ReservRequest;
use Illuminate\Support\Str;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use App\Http\Services\DateConverter;
use DateTime;

class ReservationController extends Controller
{
    public function index(Request $req){
        try {
            $records = DB::table('records')->get();
            $rooms = DB::table('rooms')->get();
        } catch (Exception $e) {

        }
        $a1 = new DateConverter();
        $a2 = new DateConverter();
        $a3 = new DateConverter();
        $a4 = new DateConverter();
        $disableDates = array();
        foreach($records as $record){
            switch ($record->type_room) {
                case 1:
                    $a1->setDates($record->arrival_date, $record->departure_date);
                  break;
                case 2:
                    $a2->setDates($record->arrival_date, $record->departure_date);
                  break;
                case 3:
                    $a3->setDates($record->arrival_date, $record->departure_date);
                  break;
                case 4:
                    $a4->setDates($record->arrival_date, $record->departure_date);
                  break;
            }
        }
        array_push($disableDates, $a1->getDates(), $a2->getDates(), $a3->getDates(), $a4->getDates());
        // return dd($disableDates);
        $type = $req->route('type');
        return view('reserv', compact( 'rooms', 'type', 'disableDates' ));
    }

    //для этого метода нужно еще отправлять на почту владельца письмо
    protected function AddUserToSheduler (ReservRequest $req ){

        $record = new Record();

        $record->arrival_date = $req->input('date-start');
        $record->departure_date = $req->input('date-end');

        $record->email = $req->input('email');
        $record->count_persons = $req->input('count-person');
        $record->type_room = $req->input('type-room');
        $record->username = $req->input('username');
        $record->phone = $req->input('phone');
        $record->uuid = Str::uuid();
        $record->confirmed = false;
        try{
            // получение разницы в днях между заселением и выселением
            $arrival = DateTime::createFromFormat("m/d/Y", $record->arrival_date);
            $depart = DateTime::createFromFormat("m/d/Y", $record->departure_date);
            $interval = $arrival->diff($depart);
            $room =  DB::table('rooms')->where('type', $record->type_room)->first();

            $record->price = $room->price * $interval->d;
            $record->save();

        }catch(Exception $e){
          return redirect()->route('reserv-page')->withErrors('errors', 'Заявка не была обработана, попробуйте позже.');
        }
        return redirect()->route('reserv-page')->with('success-record', 'Заявка была отправлена.');
    }
}
