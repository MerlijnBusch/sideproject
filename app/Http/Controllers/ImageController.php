<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($user, $slug)
    {
        $pathToFile = storage_path("app\\public\\post\\" . $user . "\\" . $slug);
        return response()->file($pathToFile);
    }
}
