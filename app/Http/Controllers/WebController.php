<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class WebController extends Controller
{
    //
    public function index(){
        $recently_schedules = Schedule::orderBy('created_at', 'desc')->take(4)->get();
        $recommend_schedules = Schedule::where('recommend_flag', true)->take(3)->get();
    return view('index',compact('recently_schedules','recommend_schedules'));
    }
}
