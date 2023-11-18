<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Category;
use App\Models\schedule;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//トップページ
    {
        $plans = Plan::all();
 
         return view('travel.index', compact('plans'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//新規作成ページ
    {
        $plans = Plan::all();
        return view('travel.create',compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function planstore(Request $request,Plan $plan)//新規作成機能
    {
        $request->validate([
            'name'=>'required',
            'opendaytime'=>'required',
            'clausedaytime'=>'required'
        ]);
        $plan->name = $request->input('name');
        $plan->opendaytime = $request->input('opendaytime');
        $plan->clausedaytime = $request->input('clausedaytime');
        $plan->comment = $request->input('comment');
        $plan->user_id = Auth::id();
        $plan->save();

        return redirect()->route('user.mypage');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)//詳細ページ
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)//更新ページ
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
    public function update(Request $request, Plan $plan)//更新機能
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)//削除機能
    {
        //
    }
}
