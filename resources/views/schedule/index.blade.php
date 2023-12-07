@extends('layouts.mypage')

@section('content')
<div class="container text-center" style="max-width: 1800px"><!--プラン名と日付-->
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
</div>   

<div class="container text-center" style="max-width: 1800px"><!--サイドバーと一覧-->
    <div class="row">
        <a href="{{route('schedule_create',$plan )}}">+スケジュール追加</a>
        <hr>
    </div>
  

    @foreach ($schedules as $schedule)
     <div class="card mb-3" style="max-width: 1800px;">
        <div class="row g-0">
            <div class="col-md-4">
                @if($schedule->image_name)
                    <img src="{{ asset('storage/img/' . $schedule->image_name) }}" class="img-fluid rounded-start" alt="...">
                @else
                    <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image">
                @endif
            </div>
            <div class="col-md-8">
            <a href="{{ route('schedule_show', ['schedule' => $schedule, 'plan' => $plan->id]) }}" class="link-dark text-decoration-none">
                <div class="card-body">
                    <h1 class="card-title" style="margin-bottom: 50px;">{{ $schedule->event_category }}</h1>
                    <h2 class="card-text" style="margin-bottom: 30px;">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H時i分') }}</h2>
                    <p class="card-text" style="margin-bottom: 30px;">
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end" >
                        <button type="button" class="btn btn-outline-dark btn-lg" style="margin-top: 50px;"> 
                            @if($schedule->isFavoritedBy(Auth::user()))
                            <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                                   <i class="fa-solid fa-star"></i>
                                   お気に入り中</small>
                             </a>
                            @else
                            <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                                  <i class="fa-regular fa-star"></i>
                                  お気に入り追加する</small>
                            </a>
                            @endif
                        </button>
                       </div>
                        
                    </p>

             </a>
        </div>
    </div>
  </div>
</div>
  
@endforeach

{{$schedules->links()}}
  
    {{--
  
    <div class="row">
        @if ($schedules)

        
        @foreach ($schedules as $schedule)
            <a href="{{ route('schedule_show', ['schedule' => $schedule, 'plan' => $plan->id]) }}" class="link-dark text-decoration-none">
                <div class="card mb-3" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md">
                            <div class="card-img d-flex justify-content-between">
                            <img src="{{ asset('storage/img/' . $schedule->image_name) }}" class="img-fluid rounded-start" alt="...">
                        </div>

                        <div class="col-md-12">
                            <div class="card-body">
                                <h3 class="card-title">{{ $schedule->event_category }}</h3>
                                <p class="card-text">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H時i分') }}</p>
                                <p class="card-text">{{ $schedule->way }}</p>
                                <p class="card-text">{{ $schedule->start_place }}</p>
                            
                                <div> 
                                    @if($schedule->isFavoritedBy(Auth::user()))
                                        <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                                            <i class="fa-solid fa-star"></i>
                                             お気に入り中
                                        </a>
                                    @else
                                        <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                                            <i class="fa-regular fa-star"></i>
                                            お気に入り追加する
                                        </a>
                                    @endif
                                </div>
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
        {{$schedules->links()}}
</div>

--}}
@endsection

