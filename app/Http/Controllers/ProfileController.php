<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($name)
    {
        $user = User::query()->where('name', '=', $name)->first();
        if (!isset($user)) {
            abort(404);
        }

        $posts = $user->post()->get();

        return view('partials.profile.index', ['user' => $user, 'posts' => $posts]);
    }
}
