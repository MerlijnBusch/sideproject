<div class="sidebar">
    <a href="/" class="">
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul>
      <li>
          <a class="" href="{{ route('profile.index', auth()->user()->name) }}">Mine story</a>
      </li>
      <li>
          Notifications
      </li>
      <li>
          Messages
      </li>
      <li>
          Bookmarks
      </li>
      <li>
          Subscriptions
      </li>
      <li>
          Settings
      </li>
    </ul>

    {{--dd(auth()->user()->unreadNotifications()->limit(5)->get()->toArray())--}}

    <hr>
    <footer>
      <li>
          <a class="" href="{{ route('post.create')}}">create Post</a>
      </li>
    </footer>
  </div>
