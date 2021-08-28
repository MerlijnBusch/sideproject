@extends('layouts.main')

@section('page-title')

    all incoming notifications

@endsection

@section('content')

    @forelse ($notifications as $notify)
        @switch($notify['type'])
            @case("App\Notifications\UserFollowed")
                @include('partials.notification.type.userfollowed', ['notification' => $notify])
            @break

            @case("App\Notifications\NewPost")
                @include('partials.notification.type.newpost', ['notification' => $notify])
            @break

            @case("App\Notifications\NewComment")
                @include('partials.notification.type.newcomment', ['notification' => $notify])
            @break
        @endswitch
    @empty
        <p>No Notifications!</p>
    @endforelse

@endsection

@section('footer-scripts')

@endsection
