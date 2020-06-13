<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // get all records from db
    protected function Index(){
        $records = DB::table('records')->get();
        return view('auth.userAdmin', compact('records'));
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
            DB::table('records')->where('uuid', $uuid)->delete();
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage() ]);
        }
        // return redirect('override-panel');
        return response()
        ->json(['success'=>'Запись была успешно удалена.']);
    }

    protected function AddNewClient ( Request $req ){
        $record = new Record();
        try {
            $record->arrival_date = $req->input('arrival');
            $record->departure_date = $req->input('depart');
            $record->email = $req->input('email');
            $record->count_persons = $req->input('count');
            $record->type_room = $req->input('type');
            $record->username = $req->input('username');
            $record->phone = $req->input('phone');
            $record->uuid = Str::uuid();
            $record->confirmed = 1;
            $record->save();
        } catch (Exception $e) {
            return response()->json([ 'error'=> $e->getMessage() ]);
        }
        return response()->json([ 'success'=>'Запись была успешно добавлена.' ]);
    }
}
