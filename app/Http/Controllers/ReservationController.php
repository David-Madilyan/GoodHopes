<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Http\Requests\ReservRequest;
use Illuminate\Support\Str;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use DateTime;

class ReservationController extends Controller
{
    public function index(Request $req){

      $rooms = DB::table('rooms')->get();
      $type = $req->route('type');
      return view('reserv', compact( 'rooms', 'type' ));
      // return dd($req->route('type'));
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
