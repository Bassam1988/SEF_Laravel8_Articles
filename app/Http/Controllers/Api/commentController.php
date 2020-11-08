<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;

class commentController extends Controller
{
    public function postComments()
    {
        $id=request('post_id');
        $post=Posts::find($id);
        return $post->commentsinfo();
    }

    public function addNewComment()
    {
        $post_id=request('post_id');
        $comment= new Comments();
        $comment->body=request('body');
        $comment->posts_id=$post_id;
        $comment->user_id=request('user_id');
        $comment->save();
        return true;
        
    }
}
