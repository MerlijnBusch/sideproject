@extends('layouts.main')

@section('page-title')
<h1>create post</h1>
@endsection

@section('content')

    create a post here!
    <form class="" method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <input id="image" type="file" name="image">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="title" placeholder="Enter Post title" name="title">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="description" name="description" placeholder="Enter Post description"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Upload</button>
        </form>


@endsection
