<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // get all records from db
    protected function Index(){
        $records = DB::table('records')->get();
        return view('auth.userAdmin', compact('records'));
    }

    protected function ComfirmClient(Request $req){
        $uuid = $req->input('uuid');
        $findRecord = DB::table('records')->where('uuid', $uuid)->first();

        if(empty($findRecord)){
            return response()->json(['error'=>'Не найдена запись в бд с таким идентификатором.']);
        }else {
            DB::table('records')->where( 'uuid', $findRecord->uuid )->update(['confirmed' => true]);
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
        return response()->json(['success'=>'Запись была успешно удалена.']);
    }
}
