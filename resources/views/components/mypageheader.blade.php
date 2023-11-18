<nav class="navbar navbar-expand-md navbar-light shadow-sm samuraimart-header-container">
   <div class="container">
     <a class="navbar-brand" href="{{ route('index') }}">
      <!--ロゴクリックのリンク-->
       <img src = "{{asset('img/logo.jpg')}}" width="40" heigth="40">
     </a>
     
     <div class="d-flex justify-content-center">
       <h1>マイページ</h1>
     </div>
     
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
          <a class="nav-link" href="{{route('mypage')}}" >
          <i class="fas fa-user mr-1">マイページ</i>
          </a>
           <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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