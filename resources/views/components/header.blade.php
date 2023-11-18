<nav class="navbar navbar-expand-md navbar-light shadow-sm samuraimart-header-container">
   <div class="container">
     <a class="navbar-brand" href="{{ url('/') }}">
      <!--ロゴクリックのリンク-->
       <img src = "{{asset('img/logo.jpg')}}" width="40" heigth="40">
     </a>
     <form class="row g-1">
       <div class="col-auto">
         <input class="form-control samuraimart-header-search-input">
       </div>
       <div class="col-auto"><!--検索フォーム-->
         <button type="submit" class="btn samuraimart-header-search-button">
          <i class="fas fa-search samuraimart-header-search-icon">
            <img src = "{{asset('img/search.jpg')}}" width="40" heigth="40">
          </i>
         </button>
       </div>
     </form>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
       <span class="navbar-toggler-icon"></span>
     </button>
 
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <!-- Right Side Of Navbar -->
       <ul class="navbar-nav ms-auto mr-5 mt-2">
         <!-- Authentication Links -->
         <!-- ログインしていないときの表示開始-->
         @guest
         <li class="nav-item mr-5">
           <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
         </li>
         <li class="nav-item mr-5">
           <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
         </li>
         <hr>
         <li class="nav-item mr-5">
           <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
         </li>
         <li class="nav-item mr-5">
           <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
         </li>
         <!-- ログインしていないときの表示終了-->
         <!-- ログインしているときの表示開始-->
         @else
         <li class="nav-item mr-5">
          <a href="{{route('mypage')}}" >マイページ</a>
           <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             ログアウト
           </a>
 
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
           </form>
         </li>
         @endguest
          <!-- ログインしているときの表示終了-->
       </ul>
     </div>
   </div>
 </nav>