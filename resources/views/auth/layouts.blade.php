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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
          rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<body>

<style>
    html, body {
        width: 100%;
        height: 100%;
    }

    body {
        background-image: url({{ asset('images/loginbackground.jpg') }});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        /*background-size: 120%;*/
    }

    .auth-main {
        display: flex;
        width: 1100px;
        height: 600px;
        margin: 0 auto;
        flex-direction: row;
    }

    .auth-main-switch {
        width: 33%;
        background: #fff;
    }

    .auth-main-container {
        width: 100%;
        /*background: #1d68a7;*/
        background-image: url({{ asset('images/loginbackground.jpg') }});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .auth-main-form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        margin: 40px 0 0 0;
    }

    .auth-main-container-input {
        margin: 10px 0;
        display: block;
        width: 100%;
        height: 45px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 2px;
    }

    .auth-main-container-header {
        margin-bottom: 30px;
        font-size: xxx-large;
        color: #1e1a52eb;
    }

    .auth-main-container-form {
        width: 50%;
        flex-direction: column;
        display: flex;
    }

    .auth-main-container-forgotpassword {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #111;
        font-size: 14px;
        text-decoration-line: underline;
        margin-bottom: 15px;
        text-underline-offset: 5px;

    }

    .auth-main-container-btn:hover {
        color: #fff;
        background-color: #0976a2;
        border-color: #093344;
    }
    .auth-main-container-btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        color: #093344;
        background-color: transparent;
        background-image: none;
        border-color: #0976a2;
        width: 200px;
        margin: auto;
    }
</style>

@include('partials.handlers.success')
@include('partials.handlers.error')

@include('layouts.nav')

<main class="auth-main">
    <div class="auth-main-container">
            @yield('content')
    </div>
</main>
</body>
</html>
