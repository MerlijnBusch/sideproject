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
                    <img class="card-img-top profile-index-image" src="{{  asset($post->image_path)}}"/>
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
      </div>
    @endforeach


@endsection
