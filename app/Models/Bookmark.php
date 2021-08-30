<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo('App\Models\User');

    }

    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany('App\Models\BookmarkItem', 'bookmarks_id');

    }
}
