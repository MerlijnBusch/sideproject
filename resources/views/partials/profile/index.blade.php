@extends('layouts.main')

@section('page-title')
<h1>profile index</h1>
@endsection

@section('content')

    @foreach($posts as $post)

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
    @endforeach

@endsection

@section('footer-scripts')
      @include('layouts.scripts.postFooter')
@endsection
