<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookmarks = User::query()->where('id', auth()->user()->id)->first()->bookmarks;
        return view('partials.bookmark.index', ['bookmarks' => $bookmarks]);
    }

    public function ajaxGet(Bookmark $bookmark): \Illuminate\Http\JsonResponse
    {
        $bookmarks = User::query()->where('id', auth()->user()->id)->first()->bookmarks;

        return response()->json();
    }
}
