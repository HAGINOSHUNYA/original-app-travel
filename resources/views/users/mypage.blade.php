@extends('layouts.mypage')

@section('content')
<h1 style="text-align: center;">マイページ</h1>
<hr>
<div class="container text-center" style="max-width: 800px">
  <div class="row">
      <div class="col-2 user_name">
        <img src="{{ asset('img/no_img.jpg')}}" class="user_icon">
        <br>
       {{ Auth::user()->name }}<br>
        {{ Auth::user()->address }}
      </div>
      <div class="col-10">
        <div id="user_comment" >
          @if(Auth::user()->comment != null)
            {{ Auth::user()->comment }}
          @else
            コメント入力
          @endif
          
         <br>
         @include('modals.user_edit') <!--ユーザー情報の変更モーダル-->
         <!-- Button trigger modal -->
        </div>
        
        <div class="text-end">
          <button type="button" class="btn btn-primary text-end" data-bs-toggle="modal" data-bs-target="#user_edit"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
          更新する
          </button>
        </div>
      </div>
  </div>
</div>
<div class="row"><br></div>
<div class="row"><br></div>
  
<div class="container text-center">
  <div class="row">
     <!--新規作成のモーダル呼び出し部分開始-->
     @include('modals.create_plan')  
      <a href="#" class="link-dark text-decoration-none mypage_text" data-bs-toggle="modal" data-bs-target="#addPlanModal">
       <i class="fa-solid fa-plus">プラン作成</i>
      </a>          
      <!--新規作成のモーダル呼び出し部分終了-->     
  </div>
  <hr>

  

  <div class="row">
    <div class="col-6">
        <i class="fa-solid fa-clipboard mypage_text"></i>  
        <a href="{{route('plan.index')}}" class="link-dark text-decoration-none mypage_text">プラン一覧</a>
    </div>
    <div class="col-6" >
       <i class="fa-solid fa-star mypage_text"></i>
       <a href="{{route('mypage.favorite')}}"class="link-dark text-decoration-none mypage_text" >お気に入り一覧</a>
    </div>
  </div>

  <div class="row">
      <div class="col-6">
        <i class="fa-solid fa-user mypage_text"></i>
        <a href="{{route('mypage.edit')}}" class="link-dark text-decoration-none mypage_text"> アカウント情報変更</a>
    </div>
    <div class="col-6">
      <i class="fa-solid fa-pen mypage_text"></i>
      <a href="{{route('mypage.edit_password')}}" class="link-dark text-decoration-none mypage_text"> パスワード変更</a>
    </div>
  </div>

</div>
@endsection