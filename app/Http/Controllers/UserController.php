<?php

namespace App\Http\Controllers;

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
            $follower->follow($user->id);

            $user->notify(new UserFollowed($follower));

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

    public function notifications()
    {
        //dd(array_unique(auth()->user()->unreadNotifications()->where('type', '!=', 'App\Notifications\UserFollowed')->get()->toArray(), SORT_REGULAR));
        //return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();;
    }
}
