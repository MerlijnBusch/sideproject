<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<body>
<div class="body-container">
    @include('partials.handlers.success')
    @include('partials.handlers.error')

    @include('layouts.nav')

    <main class="main-content">
        <div class="main-content-force-width">
        @yield('content')
        </div>
    </main>

    @include('layouts.footer')
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
