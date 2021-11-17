<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('partials.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {

                $validated = $request->validate([
                    'title' => 'string',
                    'image' => 'mimes:jpeg,png',
                    'description' => 'string',
                ]);

                $extension = $request->image->extension();
                $request->image->storeAs("\\public\\post\\".Auth()->user()->name."\\", time().".".$extension);
                $imageName = Storage::url("public\\post\\".Auth()->user()->name."\\" .time().".".$extension);

                Post::create([
                   'title' => $validated['title'],
                   'image_path' => $imageName,
                   'description' => $validated['description'],
                   'user_id' => Auth::id(),
                   'uuid' => Str::uuid(),
                ]);

                Session::flash('success', "Success!");
                return \Redirect::back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('partials.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function like(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->query($request->uuid);
        return response()->json(['status' => 'Success']);
    }

    private function query($uuid){
        $post = Post::query()->where('uuid', $uuid)->first();
        $matchThese = ['user_id' => Auth()->user()->id, 'post_id' => $post->id];

        if(DB::table('like_post')->where($matchThese)->first()) {
              DB::table('like_post')->where($matchThese)->delete();
        } else {
            DB::table('like_post')->insert([
                'user_id' => Auth()->user()->id,
                'post_id' => $post->id,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
