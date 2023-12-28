@extends('layouts.mypage')

@section('content')
<main id="main">
    
        <h1 style="margin:0px">新着一覧</h1>
        <hr style="margin-top:0px">
        @include('index.recommend_card')
    
</main>

<aside id="sub">
  <h2>UserMenu</h2>
  <ul>
    <li>
        <a href="{{route('mypage')}}" class="link-dark text-decoration-none">マイページ</a>
    </li>

    <li> 
        <a href="{{route('plan.index')}}" class="link-dark text-decoration-none">プラン一覧</a>
    </li>

    
    
  </ul>
  <h2>HotelSerch</h2>
  <ul>
    <li>
        <a href="{{route('rakuten.index')}}">楽天ホテル簡易検索</a>
    </li>
    <li>
        <a href="https://travel.rakuten.co.jp/" target="_blank" rel="noopener noreferrer">楽天トラベル</a>へ
    </li>
    <li>
        <a href="https://www.jalan.net/" target="_blank" rel="noopener noreferrer">じゃらん</a>へ
    </li>
   
  </ul>
  
</aside>





@endsection
<!--
<div class="container">
   
</div>
<div class="container">
    <div class="row">
      <h1>新着一覧</h1>
        @foreach ($recently_schedules as $recently_schedule)
             <div class="col-3">
                 <div class="row">
                     <div class="col-12">
                         <p>
                            {{$recently_schedule->id}}
                             {{ $recently_schedule->event_category }}<br>
                             <label>{{ $recently_schedule->created_at }}</label>
                         </p>
                     </div>
                 </div>
             </div>

            
         @endforeach
    </div>
</div>
-->


        