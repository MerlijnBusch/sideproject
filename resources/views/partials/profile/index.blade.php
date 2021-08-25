@extends('layouts.main')

@section('content')

<h1>profile index</h1>
{{$user->name}}

    <style>
      .profile-index-post-container{
          display: flex;
          flex-direction: column;
          align-items: center;
      }

      .profile-index-post-container-image{
          height: auto;
          width: 100%;
          max-width: 300px;
      }

      .profile-index-post-container-title {
          align-items:  flex-start;
          width: 300px;
      }

      .profile-index-post-container-description {
          align-items:  flex-start;
          width: 300px;
      }

    </style>

    @foreach($posts as $post)
        <div class="profile-index-post-container">
            <div class="profile-index-post-container-title">
              {{$post->title}}
            </div>
            <img class="profile-index-post-container-image" src="{{$post->image_path}}"/>

            <div class="profile-index-post-container-description">
              {{$post->description}}
            </div>
        </div>
    @endforeach


@endsection
