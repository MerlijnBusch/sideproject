<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }

    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'description',
        'user_id',
        'uuid'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany('App\Models\Comment', 'commentable')->whereNull('parent_id');
    }

    public function totalAmountOfLikesForPost(Post $post): int
    {
        return DB::table('like_post')->where('post_id', $post->id)->count();
    }
}
