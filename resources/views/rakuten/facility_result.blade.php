@extends('layouts.mypage')

@section('content')
<div class="container text-center">
<span>
        <a href="{{route('rakuten.index')}}">検索</a> > 施設検索 > 検索結果
      </span> 
 <div class="row">
    <selec class="form-control">  
         <option value="施設">施設検索</option>
    </select>
    
</div>
<div class="container text-center">
<form action="{{route('facility_api')}}">
    @csrf
    
   
            @include('facility.middleClasses')
       
 
            @include('facility.smallClasses')

            @include('facility.detailClasses')
            <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
            </form>
          </div>
<hr>
          
            <div class="container text-center">
              <h1>検索結果</h1>
             <hr>
              @if($posts != "")
              @foreach($posts->hotels as $post)
              {{--@dump($post->hotel[0]->hotelBasicInfo)--}}

              <div class="card mb-3" style="max-width: 1800px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    @include('carousels.facility_result_carousels')
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                    <p class="card-text"><small class="text-body-secondary">{{$post->hotel[0]->hotelBasicInfo->hotelKanaName}}</small></p>
                      <h3 class="card-title">{{$post->hotel[0]->hotelBasicInfo->hotelName}}</h3>
                      <p class="card-text">TEL:{{$post->hotel[0]->hotelBasicInfo->telephoneNo}}</p>
                      <p class="card-text">住所:〒{{$post->hotel[0]->hotelBasicInfo->postalCode}}　{{$post->hotel[0]->hotelBasicInfo->address1}}{{$post->hotel[0]->hotelBasicInfo->address2}}</p>
                      <p class="card-text">最寄駅:{{$post->hotel[0]->hotelBasicInfo->nearestStation}}駅</p>
                      <p class="card-text">アクセス:{{$post->hotel[0]->hotelBasicInfo->access}}</p>
                      
                      
                      
                      
                      
                      <p class="card-text">{{$post->hotel[0]->hotelBasicInfo->hotelSpecial}}</p>
                      <p class="card-text"><small class="text-body-secondary">リンクURL：<a href="{{ $post->hotel[0]->hotelBasicInfo->hotelInformationUrl }}" target="_blank">ホテルHP</a></small></p>
                    </div>
                  </div>
                </div>
              </div>

              
              @endforeach

              @else
              <!--エラー時の表示-->
              <h1>{{$message}}</h1>
              @endif
            </div>
      
   


 

@endsection