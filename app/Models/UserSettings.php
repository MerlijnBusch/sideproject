<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo('App\Models\User');

    }
}
