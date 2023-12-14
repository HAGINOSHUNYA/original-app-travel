@extends('layouts.mypage')

@section('content')
<span>
    <a href="{{ route('mypage') }}" class="link-dark text-decoration-none">マイページ</a> > <a href="{{route('plan.index')}}" class="link-dark text-decoration-none">プラン一覧</a>>{{$plan->name}}のスケジュール一覧
</span>
<div class="container text-center" style="max-width: 800px;"><!--プラン名と日付-->
    <div class="row" style="padding: 0px;margin-top: 0px;">
      
    <h1>プラン名：{{$plan->name}}</h1>
    <p style="text-align: right;">
        日付：
        {{\Carbon\Carbon::parse($plan->start_day)->format('n月j日')}}
        ～
        {{\Carbon\Carbon::parse($plan->end_day)->format('n月j日')}}
    </p>
    </div>
</div>
</div>   
<hr style="margin: 0px;padding: 0px;">
<div class="container text-center" style="max-width: 800px"><!--サイドバーと一覧-->
    <div class="row">
        <a href="{{route('schedule_create',$plan )}}" class="link-dark text-decoration-none">+スケジュール追加</a>
        <hr>
    </div>
    <h1>スケジュール一覧</h1>

    <div>
    <form action="{{route('search_results')}}" method="GET" class="form-control text-center">
        @csrf
    <input type="text" name="query" placeholder="検索キーワードを入力" class="form-control text-center">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-primary" type="submit">検索</button>
    </div>
    </form>
    </div>
  <hr>

    @foreach ($results as $result)
     <div class="card mb-3" style="max-width: 800px;">
        <div class="row g-0" >
            <div class="col-md-4">
                @if($result->image_name)
                    <img src="{{ asset('storage/img/' . $result->image_name) }}" class="img-fluid rounded-start" alt="...">
                @else
                    <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image">
                @endif
            </div>
            <div class="col-md-8" style="padding: 0px;">
            <a href="{{ route('schedule_show', ['schedule' => $schedule, 'plan' => $plan->id]) }}" class="link-dark text-decoration-none">
                <div class="card-body">
                    <h1 class="card-title" style="margin-bottom: 0px;">{{ $result->event_category }}</h1>
                    {{$result->way}}
                    <h3 class="card-text" style="margin-bottom: 0px;">開始予定時刻：{{ \Carbon\Carbon::parse($result->start_time)->format('H時i分') }}</h2>
                    
                      
                        <button type="button" class="btn btn-outline-dark btn-lg" style="margin-top: 0px;"> 
                            @if($result->isFavoritedBy(Auth::user()))
                            <a href="{{ route('favorite', $result) }}" class="link-dark text-decoration-none">
                                   <i class="fa-solid fa-star"></i>
                                   お気に入り中</small>
                             </a>
                            @else
                            <a href="{{ route('favorite', $result) }}" class="link-dark text-decoration-none">
                                  <i class="fa-regular fa-star"></i>
                                  お気に入り追加する</small>
                            </a>
                            @endif
                        </button>
                      
                        
                    

             </a>
        </div>
    </div>
  </div>
</div>
  
@endforeach

{{$schedules->links()}}




@foreach($results as $result)

@dump($result->event_category)

@endforeach