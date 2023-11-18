<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    
    <!--FontAwesome -->
    <script src="https://kit.fontawesome.com/22ccb04945.js" crossorigin="anonymous"></script>
    <!--javascript-->
    <script src="{{ asset('/js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <!--ヘッダー部分コンポネーション開始-->
        @component('components.mypageheader')
        @endcomponent
        <!--ヘッダー部分コンポネーション終了-->

        <main class="py-4 md-5">
            <!--バリデーションエラーの表示部分開始-->
      @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
      @endif
      <!--バリデーションエラーの表示部分終了-->
            @yield('content')
        </main>

        <!--フッター部分コンポネーション開始-->
        @component('components.footer')
        @endcomponent
        <!--フッター部分コンポネーション終了-->
    </div>
</body>
</html>
