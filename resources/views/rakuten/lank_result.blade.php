@extends('layouts.mypage')


@section('content') 
 <div class="container" id="top">
      <span>
        <p><a href="{{route('rakuten.index')}}">検索</a> > ランキング検索>{{$title}}検索結果</p>
      </span> 
      
  <div class="row text-center" >
    <form action="{{route('lank_api')}}">
      @csrf
    
      <select name="keyword" id="onsen" class="form-control text-center">
     <option for="onsen" value="all">総合検索</option>
     <option for="onsen" value="onsen">温泉ランキング検索</option>
     <option for="onsen" value="premium">高級ホテル/旅館ランキング検索</option>

     
     <input type="submit" name="submit" value="検索"  class="btn btn-primary"/>
   </form>
    
  </div>  



  <div class="container text-center" style="max-width:1800px">
    <h1>{{$title}}検索結果</h1>
      <hr>
        @foreach($posts as $post )
        @dump($post)
       
             <div class="card mb-3" style="max-width: 1800px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{$post->hotel->hotelImageUrl}}" class="img-fluid rounded-start" alt="..." style="height: 250px;width:450px;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h1 class="card-title">第{{$post->hotel->rank}}位{{$post->hotel->hotelName}}</h1>
                      <p class="card-text">{{$post->hotel->middleClassName}}</p>
                      <p class="card-text"><small class="text-body-secondary">リンクURL：<a href="{{ $post->hotel->planListUrl }}" target="_blank">ホテルHP</a></small></p>
                    </div>
                  </div>
                </div>
              </div>
        @endforeach
        <div class="back-to-top">
                <a href="#top">ページ上部へ</a>
              </div>
   </div>
       
              
    
@endsection

{{--

  
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
    
    </div> 

  
  

--}}
