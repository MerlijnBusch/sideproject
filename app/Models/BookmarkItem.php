<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkItem extends Model
{
    use HasFactory;

    protected $table = 'bookmark_items';

    protected $with = [
        'posts',
        'comments',
    ];

    protected $fillable = [
        'bookmarks_id',
    ];

    public function bookmark(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo('App\Models\Bookmark');

    }

    public function posts(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Post::class, 'bookmark_item');
    }


    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Comment::class, 'bookmark_item');
    }
}
