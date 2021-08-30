<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use Notifiable;

    use Billable;

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role_id',
        'email_verified_at',
        'updated_at',
        'created_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role_id' => 'integer',
    ];


    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo('App\Models\Role');

    }

    public function post(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany('App\Models\Post', 'user_id');

    }

    public function bookmarks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany('App\Models\Bookmark', 'user_id');

    }

    public function followers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(self::class, 'follow_user', 'follow_id', 'user_id')
            ->withTimestamps();
    }

    public function follows(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(self::class, 'follow_user', 'user_id', 'follow_id')
            ->withTimestamps();
    }

    public function follow($userId): User
    {
        $this->follows()->attach($userId);
        return $this;
    }

    public function unfollow($userId): User
    {
        $this->follows()->detach($userId);
        return $this;
    }

    public function isFollowing($userId): bool
    {
        return !is_null($this->follows()->where('follow_id', $userId)->first());
    }

    public function settings(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\UserSettings');
    }
}
