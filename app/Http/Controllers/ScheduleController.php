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
    $schedules = Schedule::where('plan_id', $plan->id)->paginate(5);
      
  
    //dd($schedules);
    return view('schedule.index', compact('plan','schedules'));
}

    public function search(Request $request, Plan $plan, Schedule $schedules){
    $query = $request->input('query');
    $user_id = Auth::id();
  

    $schedules = Schedule::where('plan_id', $plan->id)->paginate(5);
        
        
        //dump($schedule);



    
    // ここで検索処理を実装する
    $results = Schedule::where('plan_id', $plan->id)
    ->where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('way', 'LIKE', '%' . $query . '%')
            ->orWhere('move_way', 'LIKE', '%' . $query . '%')
            ->orWhere('comment', 'LIKE', '%' . $query . '%')
            ->orWhere('address', 'LIKE', '%' . $query . '%')
            ->orWhere('start_place', 'LIKE', '%' . $query . '%')
            ->orWhere('end_place', 'LIKE', '%' . $query . '%')
            ->orWhere('place', 'LIKE', '%' . $query . '%');
    })
    ->get();

              //dump($request['query']);
  //dump($user_id);
  //dump($results);        


                     
                       
     return view('schedule.search_results', compact('plan','schedule','results'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Plan $plan,Schedule $schedule)
    {
        //
        $day = date('Y-m-d', strtotime($plan->start_day));
        return view('schedule.create',compact('day','plan'));
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
       $schedule->reservation = $request->has('reservation');//has メソッドはフォームデータに reservation が存在し、かつその値が null でない場合に true を返します
       $schedule->cost =$request-> input('cost');
       $schedule->start_place =$request-> input('start_place');
       $schedule->start_day =$request-> input('start_day');
       $schedule->end_place =$request-> input('end_place');
       $schedule->item =$request-> input('item');
       $schedule->place =$request-> input('place');
       $schedule->address =$request-> input('address');
       $schedule->way =$request-> input('way');
       $schedule->move_way =$request-> input('move_way');
       $schedule->comment = $request->input('comment');
       $schedule->title =$request-> input('title');
       $schedule->appeal =$request-> input('appeal');

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
        dump($schedule->start_time);

        $day = date('Y-m-d', strtotime($schedule->start_day));
        $time = date('H:i:s', strtotime($schedule->start_time));
        $end_time = date('H:i:s', strtotime($schedule->end_time));
       
        // $schedules = Schedule::where('plan_id', $plan->id)->get();
        return view('schedule.show',compact('day','time','end_time','schedule','plan'));
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
        $schedule -> event_category = $request-> input('event_category');
       $schedule->start_time =$request-> input('start_time');
       $schedule->end_time	 =$request-> input('end_time');
       $schedule->required_time =$request-> input('required_time');
       $schedule->reservation = $request->has('reservation');//has メソッドはフォームデータに reservation が存在し、かつその値が null でない場合に true を返します
       $schedule->cost =$request-> input('cost');
       $schedule->start_place =$request-> input('start_place');
       $schedule->end_place =$request-> input('end_place');
       $schedule->item =$request-> input('item');
       $schedule->place =$request-> input('place');
       $schedule->address =$request-> input('address');
       $schedule->way =$request-> input('way');
       $schedule->move_way =$request-> input('move_way');
       $schedule->comment = $request->input('comment');
       $schedule->title =$request-> input('title');
       $schedule->appeal =$request-> input('appeal');

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

    return redirect()->route('schedule', compact('schedule', 'plan'));
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
       $schedule->delete();
       return redirect()->route('schedule')->with('flash_message','削除しました');
    }

    public function favorite(Schedule $schedule)//お気に入り追加機能
    {
        Auth::user()->togglefavorite($schedule);

        return back();
    }
    
  
   
}
