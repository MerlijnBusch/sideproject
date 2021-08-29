@extends("auth.layouts")

@section('content')
    <div id="login" class="auth-main-form-container">
    <h4 class="auth-main-container-header">Sign in</h4>

    <form method="POST" action="{{ route('login') }}" class="auth-main-container-form">
        @csrf

        <div class="">
            <input id="email" type="email" class="auth-main-container-input" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>

        <div class="">
            <input id="password" type="password" class="auth-main-container-input"
                   name="password" required autocomplete="current-password">
        </div>

        @if (Route::has('password.request'))
            <a class="auth-main-container-forgotpassword" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif

        <button type="submit" class="auth-main-container-btn">
            {{ __('Login') }}
        </button>


    </form>

</div>

@endsection
