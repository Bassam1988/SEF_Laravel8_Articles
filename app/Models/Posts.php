<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class)->latest();
       
    }

    public function commentsinfo()
    {
        return $this->hasMany(Comments::class)->latest()->with(['user','user.info'])->get();
        // return $post->comments->with(['user','user.info'])->get();
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }
}
