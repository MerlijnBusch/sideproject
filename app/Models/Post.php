<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

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

    public function user()
    {

        return $this->belongsTo('App\Models\User');

    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable')->whereNull('parent_id');
    }
}
