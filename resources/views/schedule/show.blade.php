@extends('layouts.mypage')
@section('content')
<div class="container text-center">
    <h1>{{$plan->name}}{{$schedule->event_category}}の編集</h1>
<hr>
</div>

<div class="container text-center" style="max-width: 800px;">
 
     
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
 

@endsection