<nav class="navbar navbar-expand-md navbar-light shadow-sm samuraimart-header-container">
   <div class="container text-center">
     <a class="navbar-brand" href="{{ route('index') }}">
      <!--ロゴクリックのリンク-->
      {{ config('app.name', 'Laravel') }}
      
     </a>
     
     <div class="col-md-11" >
       
     </div>
     
     <div class="collapse navbar-collapse">           
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                             {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('mypage')}}">マイページ</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
   
                             </ul>
                        </div>

                          
                            
                        @endguest
                    </ul>
                </div>
   </div>
 </nav>