@extends('layouts.main')

@section('page-title')
  <h1>Some post title</h1>
@endsection

@section('content')

  <div class="card">
      <div class="card-header">
        Featured
      </div>
          <div class="card-body">
              <img class="card-img-top profile-index-image" src="{{  url($post->image_path . "/" . $post->id)}}"/>
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->description}}</p>
          </div>
      @include('partials.post.footer', ['post' => $post])
  </div>

  @include('partials.post.comment.replies', ['comments' => $post->comments, 'post_id' => $post->id])

  <h5>Leave a comment</h5>
  <form method="post" action="{{ route('comment.add') }}">
      @csrf
      <div class="form-group">
          <input type="text" name="comment" class="form-control" />
          <input type="hidden" name="post_id" value="{{ $post->id }}" />
      </div>
      <div class="form-group">
          <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
      </div>
  </form>

@endsection

@section('footer-scripts')
      @include('layouts.scripts.postFooter')
@endsection
