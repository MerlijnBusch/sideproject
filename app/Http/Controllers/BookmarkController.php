<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\BookmarkItem;
use App\Models\Comment;
use App\Models\Post;
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

    public function bookmarkItems(Bookmark $bookmark): \Illuminate\Http\JsonResponse
    {
        $posts = $bookmark->items()
            ->where("bookmark_item_type", 'App\\Models\\Post')
            ->with('posts')
            ->get()
            ->toArray();

        $comments = $bookmark->items()
            ->where("bookmark_item_type", 'App\\Models\\Comment')
            ->with('comments')
            ->get()
            ->toArray();

        return response()->json(['posts' => $posts, 'comments' => $comments]);
    }

}
