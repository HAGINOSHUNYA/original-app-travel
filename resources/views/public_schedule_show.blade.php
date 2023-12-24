@extends('layouts.app')

@section('content')

<div class="container text-center">
        <div class="row">
         <h1>{{$schedule->titley}}</h1>
         <hr>
        </div>
        
</div>
      
<div class="container text-center">

<div class="row" style="max-width: 1800px;">
  <div class="col-4"></div>
  <div class="col-4">
              @if($schedule->image_name)
                                <img src="{{ asset('storage/img/' . $schedule->image_name) }}" class="img-fluid rounded-start" alt="...">
                            @else
                                <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image">
                            @endif
    </div>
    <div class="col-4"></div>
</div>
<hr>
<div class="row">
    <p class="public_text">場所:{{$schedule->place}}</p>
    <p class="public_text">日にち:{{$schedule->start_day}}　{{ \Carbon\Carbon::parse($schedule->start_time)->format('H時i分') }}</p>
    <p class="public_text">コメント:{{$schedule->comment}}</p>

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