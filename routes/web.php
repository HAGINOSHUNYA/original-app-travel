<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\PostlController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Api\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('public_index');
});
//ユーザー関連ページのルーティング
Route::controller(UserController::class)->group(function () {
    Route::get('users/mypage', 'mypage')->name('mypage')->middleware('auth');//マイページ表示
    Route::get('users/mypage/edit', 'edit')->name('mypage.edit')->middleware('auth');//ユーサー情報作成
    Route::put('users/mypage', 'user_update')->name('mypage.update')->middleware('auth');//ユーザー情報変更
    Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password')->middleware('auth');//パスワード変更画面
    Route::put('users/mypage/password', 'update_password')->name('mypage.update_password')->middleware('auth');//パスワード変更機能
    Route::delete('users/mypage/delete', 'destroy')->name('mypage.destroy');//退会機能
    Route::get('users/mypage/favorite', 'favoritepage')->name('mypage.favorite')->middleware('auth');//お気に入り一覧
});

//プラン関係
Route::controller(PlanController::class)->group(function(){
    Route::get('users/plan/index', 'index')->name('plan.index')->middleware('auth');
    Route::post('users/mypage', 'store')->name('mypage.store')->middleware('auth');//plan新規作成機能
    Route::put('users/plan/index', 'update')->name('mypage.update')->middleware('auth');//plan更新
    Route::delete('users/plan/index', 'destroy')->name('mypage.delete')->middleware('auth');//plan削除

})->middleware('auth');


//スケジュール関係
Route::controller(ScheduleController::class)->group(function(){
    Route::get('mypage/schedule/{plan}/index', 'index')->name('schedule')->middleware('auth');
    Route::get('mypage/{schedule}/{plan}/show', 'show')->name('schedule_show')->middleware('auth');
    Route::get('mypage/schedule/{plan}/create', 'create')->name('schedule_create')->middleware('auth');
    Route::post('mypage/schedule/{plan}', 'store')->name('schedule_store')->middleware('auth');
    Route::post('mypage/schedule/{schedule}/{plan}/updata', 'update')->name('schedule_updata')->middleware('auth');
    Route::get('mypage/{schedule}/favorite','favorite')->name('favorite')->middleware('auth');//お気に入り追加機能
    Route::get('mypage/search/index','search')->name('search_results')->middleware('auth');
});
//Route::resource('goals.todos', TodoController::class)->only(['store', 'update', 'destroy'])->middleware('auth');

//トップページ関係
Route::controller(WebController::class)->group(function(){
    Route::get('web/travel/index', 'index')->name('index')->middleware('auth');
    Route::get('web/travel/{schedule}/public/show', 'public_schedule')->name('public_schedule')->middleware('auth');
    //.
    
    
    Route::get('web/trvel/public_index','public_index')->name('public_index');

});
Route::resource('travel','App\Http\Controllers\TravelController');
Auth::routes();

//メール送信後に認証されていない場合にリダイレクトさせる
Route::resource('travel', 'App\Http\Controllers\TravelController')->middleware(['auth', 'verified']);
 Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//QiitaのAPIルーティング
Route::get('apiindex', 'App\Http\Controllers\PostController@index');
Route::get('/create', function () {
    return view('form');
})->name('views.form');
Route::post('/send', 'App\Http\Controllers\PostController@send');

//楽天ホテルAPIのルーティング

Route::controller(HotelController::class)->group(function(){
    Route::get('rakuten/index', 'index')->name('rakuten.index')->middleware('auth');//検索画面
    Route::get('rakuten/index/keyword', 'keyword_api')->name('keyword')->middleware('auth');//キーワード検索機能
    Route::get('rakuten/index/keyword/show', 'keyword_show')->name('keyword_show')->middleware('auth');//キーワード検索結果ページ
    Route::get('rakuten/index/lank', 'lank_api')->name('lank_api')->middleware('auth');//キーワード検索機能
    Route::get('rakuten/index/facility', 'facility_api')->name('facility_api')->middleware('auth');//施設検索機能
    Route::post('rakuten/index/vacncy', 'vacancy')->name('vacancy_api')->middleware('auth');//空室検索機能


})

;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

