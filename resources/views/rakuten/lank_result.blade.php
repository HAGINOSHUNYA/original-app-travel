@extends('layouts.mypage')


@section('content') 
     
<main id="main">

</main>

<aside id="sub">
  <h2>Menu</h2>
  <ul>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
  </ul>
  <h2>Menu</h2>
  <ul>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
  </ul>
  <h2>Menu</h2>
  <ul>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
    <li>Subject</li>
  </ul>
</aside>



<div class="col-2 sticky-top" class="navber">
@foreach($posts as $post )
<a href="#{{$post->hotel->rank}}">第{{$post->hotel->rank}}位:{{$post->hotel->hotelName}}</a><br>

@endforeach
</div>
<div class="container">
   <span>
        <a href="{{route('rakuten.index')}}">検索</a> > ランキング検索
      </span> 
      
 <div class="row text-center" >
  <form action="{{route('lank_api')}}">
@csrf
    
     <input type="checkbox"  name="keyword" id="onsen" value="onsen">
     <label for="onsen">温泉ランキング検索</label>

     <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
  

</form>
    <h1>{{$title}}</h1>
  </div>  

  
    @foreach($posts as $post )
     <div class="row">

        <div class="card mb-3" id="{{$post->hotel->rank}}">
          <img src="{{$post->hotel->hotelImageUrl}}" class="card-img-top" alt="...">
            <div class="card-img-overlay">
              <h1>第{{$post->hotel->rank}}位</h1>

            </div>
            <div class="card-body">
              <h5 class="card-title">{{$post->hotel->hotelName}}</h5>
              <p class="card-text">{{$post->hotel->userReview}}</p>
              <a href="{{$post->hotel->hotelInformationUrl}}" class="card-text"><small class="text-body-secondary">公式HP</small></a>
              <a href="{{$post->hotel->planListUrl}}" class="card-text"><small class="text-body-secondary">プランを見る</small></a>
            </div>
        </div>
     </div>
    
              
    @endforeach

 



</div>






@endsection