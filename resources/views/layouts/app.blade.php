<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @if ( Auth::check() )
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">   
    @endif
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="jAdmin sticky-menu">
    <div id="jWrap">
        @guest
            <main class="py-4">
                @yield('form-login')
            </main>
        @else
            @include('layouts.sidebar')
            <div id="jWrapContent">
                @include('layouts.top')
                <div id="jBody">
                    <main class="jMain py-5 mt-3">
                        @yield('content')
                    </main>
                </div>
               
            </div>
        @endguest
    </div>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.3'><\/script>".replace("HOST", location.hostname));
//]]>
</script>
</body>
</html>
