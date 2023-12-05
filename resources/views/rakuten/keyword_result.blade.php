<div>
@extends('layouts.mypage')
</div>
@section('content')

<main id="main">
  
  <div> class="container"
  
    <span>
     <a href="{{route('rakuten.index')}}">検索</a> > キーワード検索
    </span>
    <!---->
    <div> class="row text-center"
      <select name="search" id="search"  for="search" class="form-control"  style="display:"> 
        <option value="曖昧">キーワード検索</option>
      </select>
      <form action="{{route('keyword')}}" class="from-control">
        @csrf
        <label>キーワード検索</label>
        <input type="text" name="keyword" value="{{$keyword}}" >
        <input type="submit" name="submit" value="送信"  class="btn btn-primary">
      </form>
    </div>
    <!---->
    
    <div>  class="row text-center"
      @foreach($posts->hotels as $hotels )
        @foreach($hotels->hotel[0] as $hotel)
          {{--@dump($hotel)--}}          
            <div class="card mb-3" style="max-width: 1300px;" id="{{$hotel->hotelNo}}">
              <div class="row g-0">
                <div class="col-md-2">
                  <img src="{{$hotel->hotelThumbnailUrl}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <h5 class="card-title">{{$hotel->hotelName}}</h5>
                    <p class="card-text">{{$hotel->hotelSpecial}}</p>
                    <p class="card-text"><small class="text-body-secondary">{{$hotel->address1}}{{$hotel->address2}}</small></p>
                  </div>
                </div>
              </div>
            </div>
       @endforeach   
     @endforeach  
    </div> 
    
  </div> 

</main>
  <aside id="sub">
    
    <h2></h2>
    <ul>
    @foreach($posts->hotels as $hotels )
        @foreach($hotels->hotel[0] as $hotel)
      <li>
      <a href="#{{$hotel->hotelNo}}">{{$hotel->hotelName}}</a>
      </li>
      @endforeach   
     @endforeach  
    </ul>

  </aside>


@endsection