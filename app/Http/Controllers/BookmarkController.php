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
        if($bookmark->user()->first()->id != auth()->user()->id)
            return response()->json(["status" => "error", "message" => "this is not your bookmark!"]);

        $data = $bookmark->items()
            ->orderBy("created_at", "DESC")
            ->get();

        //@todo remove user_ids from the array list!
        foreach ($data as $item) {
            if ($item["bookmark_item_type"] == "App\\Models\\Post") {
                $item["post"] = Post::query()->where("id", $item["bookmark_item_id"])->first();
            }
            if ($item["bookmark_item_type"] == "App\\Models\\Comment") {
                $item["comment"] = Comment::query()->where("id", $item["bookmark_item_id"])->first();
            }
        }

        return response()->json($data);
    }

}
