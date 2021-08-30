<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Post;

class NewPost extends Notification implements ShouldQueue
{
    use Queueable;

    protected $following;
    protected $post;

    public function __construct(User $following, Post $post)
    {
        $this->following = $following;
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'following_id' => $this->following->id,
            'following_name' => $this->following->name,
            'post_uuid' => $this->post->uuid,
        ];
    }
}
