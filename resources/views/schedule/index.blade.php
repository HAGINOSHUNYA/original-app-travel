@extends('layouts.mypage')

@section('content')
<div class="container text-center">
    <div class="row">
        <h1>プラン名：{{$plan->name}}</h1>
    </div>
    <div class="row">
        日付：
        {{\Carbon\Carbon::parse($plan->start_day)->format('n月j日')}}
        ～
        {{\Carbon\Carbon::parse($plan->end_day)->format('n月j日')}}
        <br>
    </div>
    
    <div class="row">
        <a href="{{route('schedule_create',$plan )}}">+スケジュール追加</a>
        <hr>
    </div>

    <div class="row">
        @if ($schedules)

        
         @foreach ($schedules as $schedule)
           <a href="{{route('schedule_show',$schedule)}}" class="link-dark text-decoration-none">
             <div class="card mb-3" style="max-width: 100%;">
                 <div class="row g-0">
                     
                     <div class="col-md-9">
                       <div class="card-body">
                            <h3 class="card-title">{{$schedule->event_category}}</h3>
                            <p class="card-text">{{$schedule->start_time}}</p>
                            <p class="card-text">{{$schedule->way}}</p>
                            <p class="card-text">{{$schedule->start_place}}</p>
                            <p>
                             @if($schedule->isFavoritedBy(Auth::user()))
                             <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                             <i class="fa-solid fa-star"></i>
                             お気に入り解除
                             </a>
                             @else
                             <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                             <i class="fa-regular fa-star"></i>
                             お気に入り追加
                             </a>
                             @endif
                           </p>
                       </div>
                       
                 </div>
                       
              </div>
             </div>
           </a>
         @endforeach
        </div>
        @else
        <p>スケジュールはありません。</p>
        @endif
        </div>
</div>
@endsection

