@extends('layouts.app')

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






<div class="wrapper">
  <main class="main">
    <h1>新着</h1>
  @include('index.recentiy_card')
   
  </main>
  
  
  
  
  <aside class="sidebar">
    
    <div class="widget widget--sticky"><h1>サブ</h1><br><h1>サブ</h1><br><h1>サブ</h1><br><h1>サブ</h1><br><h1>サブ</h1><br><h1>サブ</h1><br></div>
  </aside>
</div>
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


        