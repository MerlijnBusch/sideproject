<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'description',
        'user_id'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function user()
    {

        return $this->belongsTo('App\Models\User');

    }
}
