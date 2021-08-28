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
          <a class="" href="{{ route('notification.index') }}">Notifications</a>
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
    <hr>
    <footer>
      <li>
          <a class="" href="{{ route('post.create')}}">create Post</a>
      </li>
    </footer>
  </div>
