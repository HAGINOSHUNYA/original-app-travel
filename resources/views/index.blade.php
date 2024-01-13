@extends('layouts.mypage')

@section('content')
<div class="container" id="index-container">
<div id="index-menu">

<h2>UserMenu</h2>

    <a href="{{route('mypage')}}" class="link-dark text-decoration-none" style="font-size:200%;">・マイページ</a>

    <a href="{{route('plan.index')}}" class="link-dark text-decoration-none" style="font-size:200%;">・プラン一覧</a>

<h2>HotelSerch</h2>

    <a href="{{route('rakuten.index')}}" style="font-size:200%;">・楽天ホテル簡易検索</a>

</div>
   
    <div class="row" id="index-content">

    <h1 style="margin:0px">新着一覧</h1>
        <hr style="margin-top:0px">
        @include('index.recommend_card')
    </div>

   
</div>








{{--

<div class="container text-center" style="max-width: 2000px">
<main id="main">

    
        <h1 style="margin:0px">新着一覧</h1>
        <hr style="margin-top:0px">
        @include('index.recommend_card')

</main>
</div>

<aside id="sub">
  <h2>UserMenu</h2>
  <ul>
    <li>
        <a href="{{route('mypage')}}" class="link-dark text-decoration-none" style="font-size:200%;">マイページ</a>
    </li>
    <li> 
        <a href="{{route('plan.index')}}" class="link-dark text-decoration-none" style="font-size:200%;">プラン一覧</a>
    </li>
  </ul>
  <h2>HotelSerch</h2>
  <ul>
    <li>
        <a href="{{route('rakuten.index')}}" style="font-size:200%;">楽天ホテル簡易検索</a>
    </li>
  </ul>
</aside>



--}}
@endsection
