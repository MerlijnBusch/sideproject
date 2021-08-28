<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_name',
        'permissions',
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    protected $casts = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany('App\Models\User', 'role_id');

    }
}
