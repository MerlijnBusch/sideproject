@extends('layouts.main')

@section('page-title')
    <h1>profile index</h1>
    {{$post->user->name}}

    @include('partials.profile.follow', ['user' => $post->user])

@endsection

@section('content')

    @include('partials.post.single', ['post' => $post])

    @include('partials.post.comment.replies', ['comments' => $post->comments, 'post_id' => $post->id])

    <h5>Leave a comment</h5>
    <form method="post" action="{{ route('comment.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" class="form-control"/>
            <input type="hidden" name="post_id" value="{{ $post->id }}"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;"
                   value="Add Comment"/>
        </div>
    </form>

@endsection

@section('footer-scripts')
    @include('layouts.scripts.postFooter')
@endsection
