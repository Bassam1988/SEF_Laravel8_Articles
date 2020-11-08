<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;

class commentController extends Controller
{
    public function postComments($post_id)
    {
        $post=Posts::find($post_id);
        return $post->comments;
    }
}
