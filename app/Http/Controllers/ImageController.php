<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($user, $slug, $post_id)
    {
        $post = Post::findOrFail($post_id);
        //@todo make policy to check if the user is allowed to view this image
        $pathToFile = storage_path("app\\public\\post\\" . $user . "\\" . $slug);
        return response()->file($pathToFile);
    }
}
