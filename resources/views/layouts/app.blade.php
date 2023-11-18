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
    /**FontAwesome */
    <script src="https://kit.fontawesome.com/22ccb04945.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div id="app">
        <!--ヘッダー部分コンポネーション開始-->
        @component('components.header')
        @endcomponent
        <!--ヘッダー部分コンポネーション終了-->

        <main class="py-4 md-5">
            @yield('content')
        </main>

        <!--フッター部分コンポネーション開始-->
        @component('components.footer')
        @endcomponent
        <!--フッター部分コンポネーション終了-->
    </div>
</body>
</html>
