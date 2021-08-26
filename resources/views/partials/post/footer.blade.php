<div class="card-footer text-muted">
    2 days ago

    <a class="" href="{{ route('post.show', $post )}}">comments</a>

    {{$post->totalAmountOfLikesForPost($post)}}<button onclick="postFooter('{{$post->uuid}}', '{{ route('post.like')}}')">like</button>
    <button onclick="postFooter('{{$post->uuid}}', '{{ route('post.bookmark')}}')">bookmark</button>
    @if (auth()->user()->isFollowing($post->user->id))
          <td>
              <form action="{{route('unfollow',  $post->user->id)}}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" id="delete-follow-{{ $post->user->id }}" class="btn btn-danger">
                      <i class="fa fa-btn fa-trash"></i>Unfollow
                  </button>
              </form>
          </td>
      @else
          <td>
              <form action="{{route('follow',  $post->user->id)}}" method="POST">
                  {{ csrf_field() }}

                  <button type="submit" id="follow-user-{{ $post->user->id }}" class="btn btn-success">
                      <i class="fa fa-btn fa-user"></i>Follow
                  </button>
              </form>
          </td>
      @endif
</div>
