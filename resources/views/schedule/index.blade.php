@extends('layouts.mypage')

@section('content')


<div class="container text-center" style="max-width: 800px;"><!--プラン名と日付-->
<span>
    <p><a href="{{ route('mypage') }}" class="link-dark text-decoration-none">マイページ</a> > <a href="{{route('plan.index')}}" class="link-dark text-decoration-none">プラン一覧</a>>{{$plan->name}}のスケジュール一覧</p>
</span>


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
<div class="container text-center" style="max-width: 1000px"><!--サイドバーと一覧-->
    <div class="row">
        <a href="{{route('schedule_create',$plan )}}" class="link-dark text-decoration-none add">+スケジュール追加</a>
        <hr>
    </div>
    <h1>スケジュール一覧</h1>
    <div>
    Sort By
    @sortablelink('start_day', '日付順')
  </div>

    <div>
    <form action="{{route('search_results',['plan'=>$plan->id])}}" method="post" class="form-control text-center">
        @csrf
    <input type="text" name="query" placeholder="検索キーワードを入力" class="form-control text-center">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-primary" type="submit">検索</button>
    </div>
    </form>
    </div>
  <hr>

    @foreach ($schedules as $schedule)
     <div class="card mb-3" style="max-width: 1000px;">
        <div class="row g-0" >
            <div class="col-md-4">
                @dump($schedule->image_name)
                @if($schedule->image_name)
                    <img src="https://app-travel-buket.s3.ap-northeast-1.amazonaws.com/{{ $schedule->image_name }}" class="img-fluid rounded-start" alt="..." style="height: 200px;width:300px; ">
                @else
                    <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image" style="height: 200px;width:300px;">
                @endif
            </div>
            <div class="col-md-8" style="padding: 0px;">
            <a href="{{ route('schedule_show', ['schedule' => $schedule, 'plan' => $plan->id]) }}" class="link-dark text-decoration-none">
                <div class="card-body">
                    <h1 class="card-title" style="margin-bottom: 0px;">{{ $schedule->title }}</h1>
                    {{$schedule->way}}
                    <h3 class="card-text" style="margin-bottom: 0px;">開始予定時刻：{{ \Carbon\Carbon::parse($schedule->start_day)->format('Y年m月d日') }}{{ \Carbon\Carbon::parse($schedule->start_time)->format('H時i分') }}</h2>
            </a>
          
            <div class="d-grid gap-2 d-md-block">
                <button type="button" class="btn btn-outline-primary" style="margin-top: 0px;"> 
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
             
                <form action="{{ route('destroy', $schedule)}}" method="post">
                    @csrf
                    @method('delete')   
                    <button class="btn btn-danger"type="submit">削除</button>                                     
                </form>
            </div>
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
                                <h6 class="card-title">{{ $schedule->event_category }}</h6>
                                <p class="card-text">開始予定時刻：{{ \Carbon\Carbon::parse($schedule->start_time)->format('H時i分') }}</p>
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

