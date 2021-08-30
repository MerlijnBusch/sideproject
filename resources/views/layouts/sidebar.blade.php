<div class="sidebar">
    <a href="/" class="">
        <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul>
        <li>
            <a class="" href="{{ route('profile.index', auth()->user()->name) }}">{{auth()->user()->name}}</a>
        </li>
        <li>
            <a class="" href="{{ route('notification.index') }}">{{ __('sidebar.Notifications') }}</a>
        </li>
        <li>
            {{ __('sidebar.Messages') }}
        </li>
        <li>
            <a class="" href="{{ route('bookmark.index') }}">{{ __('sidebar.Bookmarks') }}</a>
        </li>
        <li>
            {{ __('sidebar.Subscriptions') }}
        </li>
        <li>
            {{ __('sidebar.Settings') }}
        </li>
    </ul>
    <hr>
    <footer>
        <li>
            <a class="" href="{{ route('post.create')}}">create Post</a>
        </li>
    </footer>
</div>




