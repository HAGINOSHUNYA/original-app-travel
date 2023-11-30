<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//ファサード利用
use App\Models\Plan;
use App\Models\Schedule;

class UserController extends Controller
{
    public function mypage(Schedule $schedules)
     {
         $plans = Auth::user()->plans;
         //ユーザーが持つPlanテーブルの情報を取得したい
        
         //dd($plans);
         return view('users.mypage', compact('plans','schedules'));
     }

     public function createpage(){

        return view('users.create');
     }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = Auth::user();
 
         return view('users.edit', compact('user'));
    }


    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function user_update(Request $request, User $user)//情報変更機能
    {
        //
        $user = Auth::user();
 
        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->postal_code = $request->input('postal_code') ? $request->input('postal_code') : $user->postal_code;
        $user->address = $request->input('address') ? $request->input('address') : $user->address;
        $user->comment = $request->input('comment') ? $request->input('comment') : $user->comment;
        $user->update();
       

        return to_route('mypage');
    }

    public function edit_password()//パスワード変更画面
    {
        return view('users.edit_password');
    }

    public function update_password(Request $request)//パスワード変更機能
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

     public function destroy(Request $request)//退会機能
     {
         $user = Auth::user();
 
         if ($user->deleted_flag) {
             $user->deleted_flag = false;
         } else {
             $user->deleted_flag = true;
         }
         $user->update();
 
         Auth::logout();
         return redirect('/');
     }

     public function favoritepage()//お気に入りページ
     {
         $user = Auth::user();
 
         $favorites = $user->favorites(Schedule::class)->get();
 
         return view('users.favorite', compact('favorites'));
     }
  

  
}
