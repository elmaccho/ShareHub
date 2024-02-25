<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- CSS --}}
    @vite(['resources/css/app.css', 'resources/css/nav.css', 'resources/sass/app.scss'])

    {{-- JavaScript --}}
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        @if(!Request::is('login') && !Request::is('register'))
            @include('layouts.nav')
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript">
        @yield('javascript')

    </script>
    @yield('js-files')
</body>
</html>
