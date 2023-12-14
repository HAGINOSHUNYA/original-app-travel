@extends('layouts.mypage')

@section('content')
<div class="container text-center">
  <div class="row">
    <h1>プラン一覧</h1>
    <hr>
  </div>
</div>
<div class="container text-center" style="max-width: 800px">
  <div>
    Sort By
    @sortablelink('start_day', '日付順')
  </div>

  <div class="row">
    @foreach ($plans as $plan) 
     <div class="plan-index" >
       <a href="{{route('schedule',$plan)}}" class="link-dark text-decoration-none">
        <h2> 
          {{ $plan->name }}<br>
          予定開始日：{{\Carbon\Carbon::parse($plan->start_day)->format('n月j日')}}<br>
          予定終了日：{{\Carbon\Carbon::parse($plan->end_day)->format('n月j日')}}<br>
          {{ $plan->comment }}
        </h2>
       </a>
     </div>
     <hr>
    @endforeach
 </div>

 
    {{ $plans->links() }}
   
</div>












@endsection