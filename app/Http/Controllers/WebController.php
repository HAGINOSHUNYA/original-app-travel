<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Plan;
use App\Models\User;

class WebController extends Controller
{
    //
    public function index(Schedule $schedule,Plan $plan){
        $recently_schedules = Schedule::orderBy('created_at', 'desc')->take(4)->get();
        $recommend_schedules = Schedule::where('recommend_flag', true)->take(4)->get();
    


  

    return view('index',compact('recently_schedules','recommend_schedules','schedule','plan'));
    }

    public function public_schedule(Schedule $schedule,Plan $plan){

        $user = User::find($schedule->user_id);
        $plan =Schedule::find($schedule->plan_id);
        
        
        

        return view('public_schedule_show',compact('schedule','plan','user'));
    }
}
