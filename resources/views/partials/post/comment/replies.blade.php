@foreach($comments as $comment)
<div class="display-comment"
  @if(!is_null($comment->parent_id))style="margin-left: 100px;"@endif
>
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->comment }}</p>
    <a href="" id="reply"></a>
    @if(is_null($comment->parent_id))
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" class="form-control" />
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
    @endif

    @include('partials.post.comment.replies', ['comments' => $comment->replies])

</div>
@endforeach
