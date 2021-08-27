@if(auth()->user()->id != $user->id)
    @if (auth()->user()->isFollowing($user->id))
        <td>
            <form action="{{route('unfollow',  $user->id)}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>Unfollow
                </button>
            </form>
        </td>
    @else
        <td>
            <form action="{{route('follow',  $user->id)}}" method="POST">
                @csrf

                <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-success">
                    <i class="fa fa-btn fa-user"></i>Follow
                </button>
            </form>
        </td>
    @endif
@endif
