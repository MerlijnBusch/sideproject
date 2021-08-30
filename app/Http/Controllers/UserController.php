<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserFollowed;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function follow(User $user)
    {
        $follower = auth()->user();
        if ($follower->id == $user->id) {
            return back()->withError("You can't follow yourself");
        }
        if (!$follower->isFollowing($user->id)) {

            if (
                !$user->unreadNotifications()
                    ->where('data->follower_id', $follower->id)
                    ->where('data->follower_name', $follower->name)
                    ->where('created_at', '>', Carbon::now()->subMinutes(10)->toDateTimeString())
                    ->exists()
            ) {
                $user->notify(new UserFollowed($follower));
            }

            $follower->follow($user->id);


            return back()->withSuccess("You are now friends with {$user->name}");
        }
        return back()->withError("You are already following {$user->name}");
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if ($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }
}
