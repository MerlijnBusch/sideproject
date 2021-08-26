<div class="card-footer text-muted">
    2 days ago

    <a class="" href="{{ route('post.show', $post )}}">comments</a>

    {{$post->totalAmountOfLikesForPost($post)}}<button onclick="postFooter('{{$post->uuid}}', '{{ route('post.like')}}')">like</button>

    <button onclick="postFooter('{{$post->uuid}}', '{{ route('post.bookmark')}}')">bookmark</button>
    <a class="" href="{{ route('post.follow', $post )}}">follow</a>
</div>
