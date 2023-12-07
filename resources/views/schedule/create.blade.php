@extends('layouts.mypage')
@section('content')

<div class="container text-center">
{{--@dump($plan)--}}
 
 <select name="event_category" id="event_category"  for="event_category" class="form-control" onchange="viewChange();" style="display:"> 
  <option class="text-center">--- 何を ---</option>
  <option class="text-center" value="移動">移動</option>
  <option class="text-center" value="観光">観光</option>
  <option class="text-center" value="食事">食事</option>
  <option class="text-center" value="宿泊">宿泊</option>
 </select>

 <!-- 移動の場合 -->
       @include('schedule_create.move')
     

    <!-- 食事の場合 -->
      @include('schedule_create.eat')
   

    <!-- 観光の場合 -->
    @include('schedule_create.travel')
    

    <!-- 宿泊の場合 -->
    @include('schedule_create.hotel')
   






</div>

@endsection