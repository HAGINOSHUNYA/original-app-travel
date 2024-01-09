@extends('layouts.mypage')

@section('content')

<div class="container text-center">
        <div class="row">
         <h1>{{$schedule->title}}</h1>
         <hr>
        </div>
        
</div>
      
<div class="container text-center">

<div class="row" style="max-width: 1800px;">
  <div class="col-1"></div>
  <div class="col-10">
              @if($schedule->image_name)
                                <img src="https://app-travel-buket.s3.ap-northeast-1.amazonaws.com/{{ $schedule->image_name }}" class="img-fluid rounded-start" alt="..." style="height: 500px;width:1000px; ">
                            @else
                                <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image" style="height: 200px;width:1000px; ">
                            @endif
    </div>
    <div class="col-1"></div>
</div>
<hr>
<div class="row">
    <p class="public_text">場所:{{$schedule->place}}</p>
    <p class="public_text">日付:{{$schedule->start_day}}　{{ \Carbon\Carbon::parse($schedule->start_time)->format('H時i分') }}</p>
    <p class="public_text">コメント:{{$schedule->comment}}</p>
    <p class="card-text"><small class="text-body-secondary">作成者：{{ App\Models\Schedule::find($schedule->id)->user->name }}　さん</small></p>

    <button type="button"  class="btn btn-outline-primary" style="margin-top: 0px;"> 
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




@endsection