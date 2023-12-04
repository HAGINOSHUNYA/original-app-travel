<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//ファサード利用
use App\Models\User;
use App\Models\Plan;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plan $plan, Schedule $schedules)
{
    $schedules = Schedule::where('plan_id', $plan->id)->get();
      
  
    //dd($schedules);
    return view('schedule.index', compact('plan','schedules'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Plan $plan,Schedule $schedule)
    {
        //
        return view('schedule.create',compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request , Schedule $schedule, Plan $plan)
    {
      
    //dd($request);
       $schedule -> event_category = $request-> input('event_category');
       $schedule->start_time =$request-> input('start_time');
       $schedule->end_time	 =$request-> input('end_time');
       $schedule->required_time =$request-> input('required_time');
       $schedule->place =$request-> input('reservation');
       $schedule->cost =$request-> input('cost');
       $schedule->start_place =$request-> input('start_place');
       $schedule->end_place =$request-> input('end_place');
       $schedule->item =$request-> input('item');
       $schedule->way =$request-> input('way');

        // アップロードされたファイル（name="image"）が存在すれば処理を実行する
        if ($request->hasFile('image')) {
        // アップロードされたファイル（name="image"）をstorage/app/public/productsフォルダに保存し、戻り値（ファイルパス）を変数$image_pathに代入する
        $image_path = $request->file('image')->store('public/img');
        // ファイルパスからファイル名のみを取得し、Productインスタンスのimage_nameプロパティに代入する
        $schedule->image_name = basename($image_path);
        }

        $schedule->recommend_flag = $request->has('recommend_flag') ? true : false;


       $schedule->user_id = Auth::id();
       $schedule->plan_id = $plan->id;
       $schedule->save();
        return redirect()->route('schedule',compact('schedule','plan'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule ,Plan $plan)
    {
       
        // $schedules = Schedule::where('plan_id', $plan->id)->get();
        return view('schedule.show',compact('schedule','plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule, Plan $plan)
    {
       
        $schedule->event_category = $request->input('event_category');
        $schedule->start_time = $request->input('start_time');
        $schedule->end_time = $request->input('end_time');
        $schedule->required_time = $request->input('required_time');
        $schedule->place = $request->input('reservation');
        $schedule->cost = $request->input('cost');
        $schedule->start_place = $request->input('start_place');
        $schedule->end_place = $request->input('end_place');
        $schedule->item = $request->input('item');
        $schedule->way = $request->input('way');

        // アップロードされたファイル（name="image"）が存在すれば処理を実行する
        if ($request->hasFile('image')) {
        // アップロードされたファイル（name="image"）をstorage/app/public/productsフォルダに保存し、戻り値（ファイルパス）を変数$image_pathに代入する
        $image_path = $request->file('image')->store('public/img');
        // ファイルパスからファイル名のみを取得し、Productインスタンスのimage_nameプロパティに代入する
        $schedule->image_name = basename($image_path);
        }

        $schedule->recommend_flag = $request->has('recommend_flag') ? true : false;

        $schedule->user_id = Auth::id();
        $schedule->plan_id = $plan->id;
       
        $schedule->save();

    return redirect()->route('schedule_show', compact('schedule', 'plan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }

    public function favorite(Schedule $schedule)//お気に入り追加機能
    {
        Auth::user()->togglefavorite($schedule);

        return back();
    }
    
  
    public function update_password(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return to_route('mypage.edit_password');
        }

        return to_route('mypage');
    }
}
