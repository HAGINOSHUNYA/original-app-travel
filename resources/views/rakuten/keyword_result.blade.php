@extends('layouts.mypage')

@section('content')
<div class="container">
      <span>
        <a href="{{route('rakuten.index')}}">検索</a> > キーワード検索
      </span>
</div>
<div class="container text-center">
  
  <div class="row text-center">
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
    
  <div class="row text-center"> 
    @foreach($posts->hotels as $hotels )
      @foreach($hotels->hotel[0] as $hotel)
       
       <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#kyewordModal{{ $hotel->hotelNo }}" class="card mb-3" style="max-width: 650px;">
         <div class="row g-0">
           <div class="col-md-4">
             <img src="{{$hotel->hotelThumbnailUrl}}" class="img-fluid rounded-start" alt="...">
           </div>
           <div class="col-md-8">
             <div class="card-body">
              <h5 class="card-title">{{$hotel->hotelName}}</h5>
              <p class="card-text">{{$hotel->hotelSpecial}}</p>
              <p class="card-text"><small class="text-body-secondary">{{$hotel->address1}}{{$hotel->address2}}</small></p>
             </div>
           </div>
         </div>
       </a>
           
        
      
      @endforeach   
    @endforeach
    
  </div>
   
    
    

    
    
</div>


@endsection
