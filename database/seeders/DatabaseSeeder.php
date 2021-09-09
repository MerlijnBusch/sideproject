<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\BookmarkItem;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed
        \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Comment::factory(50)->create();
        \App\Models\Bookmark::factory(10)->create();

        foreach ((range(1, 3)) as $index) {
            $post = Post::query()->where("id", $index)->first();
            $bookmarkItem = new BookmarkItem();
            $post->bookmarkItem()->attach($bookmarkItem, ['bookmarks_id' => 1]);
        }

        foreach ((range(1, 10)) as $index) {
            $comment = Comment::query()->where("id", $index)->first();
            $Item = new BookmarkItem();
            $comment->bookmarkItem()->attach($Item, ['bookmarks_id' => 1]);
        }

    }
}
