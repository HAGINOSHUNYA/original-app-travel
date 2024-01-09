@extends('layouts.mypage')

@section('content')
<div class="container text-center">
  <h1>楽天ホテル簡易検索</h1>
  <hr>
</div>

<div class="container text-center">
    <select name="search" id="search"  for="search" class="form-control text-center form-text" onchange="searchChange();" style="display:"> 
         <option class="form-text">--- 検索方法を選択してください ---</option>
         <option value="曖昧">キーワード検索</option>
         <option  value="空室">空室検索</option> 
         <option value="ランキング">ランキング検索</option>
         <option value="施設">施設検索</option>
    </select>
    
    <div class="row">  
   
  

    @include('rakutenapi_search.keyword')
    
    @include('rakutenapi_search.vacancy')
    
    @include('rakutenapi_search.lank')
    
      @include('rakutenapi_search.facility')
    </div>
    

    
    
</div>

   

@endsection
