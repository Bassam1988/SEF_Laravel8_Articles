<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Posts::class)->latest();
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function info()
    {
        return $this->hasOne(User_info::class);
    }


    public function follows()
    {
        return $this->belongsToMany(User::class,'follows', 'follower_id','follow_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow_id');
    }

}
