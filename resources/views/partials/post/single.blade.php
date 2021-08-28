<div class="card">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <img class="card-img-top post-single-container-image" src="{{  url($post->image_path . "/" . $post->id)}}"/>
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->description}}</p>
    </div>

    <div class="card-footer text-muted">
        2 days ago

        <a class="" href="{{ route('post.show', $post )}}">comments</a>

        {{$post->totalAmountOfLikesForPost($post)}}
        <button onclick="postFooter('{{$post->uuid}}', '{{ route('post.like')}}')">like</button>
        <button onclick="postFooter('{{$post->uuid}}', '{{ route('post.bookmark')}}')">bookmark</button>

    </div>
</div>
