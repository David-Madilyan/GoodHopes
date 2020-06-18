<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use App\Models\Room;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // get all records from db
    protected function Index(){
        $records = DB::table('records')->get();
        $rooms = DB::table('rooms')->get();
        return view('auth.userAdmin', compact('records', 'rooms'));
    }

    protected function ComfirmClient(Request $req){
        $uuid = $req->input('uuid');
        try {
            $findRecord = DB::table('records')->where('uuid', $uuid)->first();
            if(empty($findRecord)){
                return response()->json(['error'=>'Не найдена запись в бд с таким идентификатором.']);
            }else {
                DB::table('records')->where( 'uuid', $findRecord->uuid )->update(['confirmed' => true]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage() ]);
        }
        return response()->json(['success'=>'Подтверждение бронирования прошло успешно.']);
        // return response()->json(['success'=> 'asdadads ada as ' . $findRecord->username ]);
    }


    protected function DeleteRequestClient(Request $req){

        $uuid = $req->input('uuid');
        try {
            Record::where('uuid', $uuid)->delete();
            // DB::table('records')->where('uuid', $uuid)->delete();
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage() ]);
        }
        // return redirect('override-panel');
        return response()
        ->json(['success'=>'Запись была успешно удалена.']);
    }

    protected function AddNewClient ( Request $req ){
        $record = new Record();
        $days = $req->input('daysLag');
        try {
            $record->arrival_date = $req->input('arrival');
            $record->departure_date = $req->input('depart');
            $record->email = $req->input('email');
            $record->count_persons = $req->input('count');
            $record->type_room = $req->input('type');
            $record->username = $req->input('username');
            $record->phone = $req->input('phone');
            $record->uuid = Str::uuid();
            $record->confirmed = $req->input('confirmed');

            $room =  DB::table('rooms')->where('room_type', $record->type_room)->first();
            $record->price = $room->price * $days;

            $record->save();
        } catch (Exception $e) {
            return response()->json([ 'error'=> $e->getMessage() ]);
        }
        return response()->json([ 'success'=>'Запись была успешно добавлена.' ]);
    }

    protected function ChangeDataClient(Request $req){
        try {
            Record::where('uuid', $req->input('uuid'))->update(
              [
                'arrival_date' => $req->input('arrival'),
                'departure_date' => $req->input('depart'),
                'email' => $req->input('email'),
                'count_persons' => $req->input('count'),
                'type_room' => $req->input('type'),
                'username' => $req->input('username'),
                'price' => $req->input('price'),
                'phone' => $req->input('phone'),
                'confirmed' => $req->input('confirmed')
              ]);

        } catch (Exception $e) {
            return response()->json([ 'error'=> $e->getMessage() ]);
        }
        return response()->json([ 'success'=>'Запись была успешно Обновлена.' ]);
    }

    protected function ChangeDataRooms(Request $data){
        // $room = new Room();
        try{
            for ($i = 0; $i < count($data->all()); $i++) {
              $name = $data->input("room{$i}.name");
              $price = $data->input("room{$i}.price");
              $description = $data->input("room{$i}.description");
              $type = $data->input("room{$i}.type");
              DB::table('rooms')->where('type', $type)->update([
                'name' => $name,
                'price' => $price,
                'description' => $description,
                // 'type' => $type
              ]);
            }
        }catch(Exception $e){
            return response()->json([ 'error'=> $e->getMessage() ]);
        }
        return response()->json([ 'success'=>'Данные о номерах успешно сохранены.' ]);

    }
}
