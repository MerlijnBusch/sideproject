@extends("auth.layouts")

@section('content')
<div id="register" class="auth-main-form-container">
    <h4 class="auth-main-container-header">Create an Account</h4>
    <form method="POST" action="{{ route('register') }}" class="auth-main-container-form">
        @csrf

        <input id="name" type="text" placeholder="{{ __('Name') }}" class="auth-main-container-input" name="name"
               value="{{ old('name') }}" required autocomplete="name" autofocus>

        <input id="email" type="email" placeholder="{{ __('Email') }}" class="auth-main-container-input" name="email"
               value="{{ old('email') }}" required autocomplete="email">

        <input id="password" type="password" placeholder="{{ __('Password') }}" class="auth-main-container-input"
               name="password" required autocomplete="new-password">

        <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="auth-main-container-input" name="password_confirmation" required
                   autocomplete="new-password">


        <button type="submit" class="auth-main-container-btn">
            {{ __('Register') }}
        </button>

    </form>
</div>

@endsection
