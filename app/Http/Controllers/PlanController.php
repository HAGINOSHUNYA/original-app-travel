<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Category;
use App\Models\schedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//ファサード利用

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $plans = Auth::user()->plans;
        //ユーザーが持つPlanテーブルの情報を取得したい
        $plans = Plan::sortable()->paginate(5);
       
        //dd($plans);
        return view('plan.index', compact('plans'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Plan $plan)
    {
        $request->validate([
            'name'=>'required',
            'start_day'=>'required',
            'end_day'=>'required'
        ]);
        $plan->name = $request->input('name');
        $plan->start_day = $request->input('start_day');
        $plan->end_day = $request->input('end_day');
        $plan->comment = $request->input('comment');
        $plan->user_id = Auth::id();
        $plan->save();

        return redirect()->route('plan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
      
        $plan->name = $request->input('name');
        $plan->start_day = $request->input('start_day');
        $plan->end_day = $request->input('end_day');
        $plan->all_price = $request->input('all_price');
        $plan->comment = $request->input('comment');
        $plan->user_id = Auth::id();
        $plan->save();

        return redirect()->route('mypage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
        $plan->delete();
 
        return redirect()->route('mypage'); 
    }
}
