@extends('layouts.app')
 
 @section('content')
 <div class="container  d-flex justify-content-center">
     <div class="row">
         <h1>お気に入り</h1>
     </div>
         <hr>
 
         <div class="row">
             @foreach ($favorites as $fav)
                 <div class="col-md-10">
                     <a href="{{route('schedule_show', ['schedule' => $fav->favoriteable_id, 'plan' => App\Models\Schedule::find($fav->favoriteable_id)->plan_id])}}" class="w-25">
                        詳細
                     </a>
                     
                         <h5>{{App\Models\Schedule::find($fav->favoriteable_id)->event_category}}</h5>
                         <h6>時間;{{App\Models\Schedule::find($fav->favoriteable_id)->start_time}}</h6>
                     
                 </div>
             
             <div class="col-md-2">
                 <a href="{{ route('favorite', $fav->favoriteable_id) }}" class="samuraimart-favorite-item-delete">
                     削除
                 </a>
             </div>
             
             @endforeach
         </div>
 
         <hr>
     
 </div>
 @endsection