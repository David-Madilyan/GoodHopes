<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index () {
        return view('index');
    }

    public function GetAllRooms(){
        $rooms = DB::table('rooms')->get();
        return view('description', compact( 'rooms' ));
    }
}
