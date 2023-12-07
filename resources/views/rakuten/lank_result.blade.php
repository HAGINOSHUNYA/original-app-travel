@extends('layouts.mypage')


@section('content') 
<div class="container">
      <span>
        <a href="{{route('rakuten.index')}}">検索</a> > ランキング検索
      </span> 
      
  <div class="row text-center" >
    <form action="{{route('lank_api')}}">
      @csrf
    
      <select name="keyword" id="onsen" class="form-control">
     <option for="onsen" value="all">総合検索</option>
     <option for="onsen" value="onsen">温泉ランキング検索</option>
     <option for="onsen" value="premium">高級ホテル/旅館ランキング検索</option>

     
     <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
   </form>
    <h1>{{$title}}</h1>
  </div>  

  <main id="main" style="max-width:1500px">
    @foreach($posts as $post )
     <div class="row">
        <div class="card mb-3" id="{{$post->hotel->rank}}">
          <img src="{{$post->hotel->hotelImageUrl}}" class="card-img-top" alt="..."/>
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
  </main>

  

</div>
<aside id="sub">
    @foreach($posts as $post )
    <h2></h2>
    <ul>
      <li>
        <a href="#{{$post->hotel->rank}}">第{{$post->hotel->rank}}位:{{$post->hotel->hotelName}}</a><br>
      </li>
    </ul>
    @endforeach
  </aside>
@endsection