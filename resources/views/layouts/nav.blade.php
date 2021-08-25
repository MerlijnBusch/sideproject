<nav class="nav-container">
    <div>
        logo
    </div>

    <div class="nav-action-container">
        @guest
            <a class=""
               href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class=""
                   href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @endguest

        @auth
        <ul>
            <li>
                <a class=""
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();">
                    {{ __('Logout') }}
                </a>
            </li>
        </ul>
            <form id="logout-form-nav"
                  action="{{ route('logout') }}"
                  method="POST">
                @method('POST')
                @csrf
            </form>
        @endauth
    </div>
</nav>
