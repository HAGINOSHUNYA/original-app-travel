@extends('layouts.mypage')
@section('content')

<div class="container text-center">
 
      <div class="card mb-3">
       <img src="{{asset('strage/img/'.$schedule->image_name)}}" class="card-img-top" alt="...">
       <div class="card-body">
        <h3 class="card-title"name="event_category" id="event_category"  for="event_category" class="form-control" onchange="viewChange();" value="{{$schedule->event_category}}">{{$schedule->event_category}}</h3>

       <!-- 移動の場合 -->
@if ($schedule->event_category === '移動')
    @include('schedule_edit.move')
@endif

<!-- 食事の場合 -->
@if ($schedule->event_category === '食事')
    @include('schedule_edit.eat')
@endif

<!-- 観光の場合 -->
@if ($schedule->event_category === '観光')
    @include('schedule_edit.travel')
@endif

<!-- 宿泊の場合 -->
@if ($schedule->event_category === '宿泊')
    @include('schedule_edit.hotel')
@endif
        
     </div>
   </form>
</div>
 

@endsection