<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\NewComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());

        $post = Post::query()->where('uuid', $request->post_uuid)->first();
        $post->comments()->save($comment);

        $this->ExecuteNewNotificationForNewComment($comment, $post);

        return back();
    }

    public function replyStore(Request $request)
    {

        $comment = Comment::query()->where('uuid', $request->get('comment_uuid'))->first();
        //dd($comment, $request->get('comment_uuid'));
        if (!is_null($comment->parent_id)) return back();
        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $comment->id;
        $reply->uuid = Str::uuid();


        $post = Post::query()->where('uuid', $request->post_uuid)->first();
        $post->comments()->save($reply);

        $this->ExecuteNewNotificationForNewComment($reply, $post);

        return back();

    }

    private function ExecuteNewNotificationForNewComment($comment, $post){

        //Check when ever there are already is a comment in the last amount x of time before we create a new notification
        //so that we dont spam the user if mutiple user commented under the post at the same time!
        if(!$post->user->unreadNotifications()
            ->where('data->post_id', $post->id)
            ->where('created_at', '>', Carbon::now()->subMinutes(15)->toDateTimeString())
            ->exists()
        ) $post->user->notify(new NewComment($comment, $post));
    }
}
