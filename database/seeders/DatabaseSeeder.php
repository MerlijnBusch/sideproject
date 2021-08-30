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

        foreach ((range(1, 6)) as $index) {
            $post = Post::all()->random();
            $bookmarkItem = new BookmarkItem();
            $post->bookmarkItem()->attach($bookmarkItem, ['bookmarks_id' => Bookmark::all()->random()->id]);
        }

        foreach ((range(1, 25)) as $index) {
            $comment = Comment::all()->random();
            $bookmarkItem = new BookmarkItem();
            $comment->bookmarkItem()->attach($bookmarkItem, ['bookmarks_id' => Bookmark::all()->random()->id]);
        }

    }
}
