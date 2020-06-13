<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Http\Requests\ReservRequest;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    //для этого метода нужно еще отправлять на почту владельца письмо
    public function AddUserToSheduler (ReservRequest $req ){

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
      $record->save();

      return redirect()->route('reserv-page')->with('success-record', 'Заявка была отправлена.');
    }
}
