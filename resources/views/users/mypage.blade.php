@extends('layouts.mypage')

@section('content')
<div class="container text-center">
  

  

  <div class="row">
     <!--新規作成のモーダル呼び出し部分開始-->
     @include('modals.create_plan')  
             <a href="#" class="link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addPlanModal">
                     <span class="fs-5 fw-bold">＋</span>&nbsp;新規作成
             </a>          
      <!--新規作成のモーダル呼び出し部分終了-->     
  </div>
   
  <div class="row">
    <a href="{{route('plan.index')}}" class="link-dark text-decoration-none">プラン一覧</a>
  </div>

  <div class="row">
  <i class="fa-solid fa-star"></i>
    <a href="{{route('mypage.favorite')}}"class="link-dark text-decoration-none">お気に入り一覧</a>
  </div>

  <div class="row">
  <i class="fa-solid fa-user"></i>
   <a href="{{route('mypage.edit')}}" class="link-dark text-decoration-none"> アカウント情報変更</a>
  </div>

  
  <div class="row">
   <a href="{{route('mypage.edit_password')}}" class="link-dark text-decoration-none"> パスワード変更</a>
  </div>



</div>
@endsection