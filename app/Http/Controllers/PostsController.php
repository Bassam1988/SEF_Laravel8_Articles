<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categories::all();
        return view('articles.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $this->validatePosts();
        $post=new Posts(request(['title','summary','body']));
        $post->user_id=auth()->id();
        $post->save();
        $post->categories()->attach(request('categories'));

        return redirect( route('postDetails',$post));


        /*$post=new Posts();

        $post->title=request('title');
        $post->summary=request('summary');
        $post->body=request('body');

        $post->save();*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        return view('articles.postDetails',['posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        $categories=Categories::all();
       
        return view('articles.edit',['post'=>$posts,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
       // die($post->user->is(auth()->user()));
        $this->authorize('update',$post);
        $this->validatePosts();
        $post->title=request('title');
        $post->summary=request('summary');
        $post->body=request('body');
 
        $post->save();
        if(request('categories')){
            $post->categories()->detach();
            $post->categories()->attach(request('categories'));
        }
        
        return redirect( route('postDetails',$post));
        
        //$posts->categories()->attach(request('categories'));

        ///return redirect( route('postDetails',$posts));

       //$posts->update($this->validatePosts());

       
       /*$posts->title=request('title');
       $posts->summary=request('summary');
       $posts->body=request('body');

       $posts->save();*/
    }
    public function validatePosts()
    {
       return request()->validate([
        'title'=>'required',
        'summary'=>'required',
        'body'=>'required',
        'categories'=> 'exists:categories,id'

    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
    public function others($user_id)
    {
        //die($user_id);
        $user=User::find($user_id);
      
        $follows=$user->follows;
        $posts=[];
        foreach($follows as $follow)
        {
            $follow_post=$follow->posts;
            foreach($follow_post as $post)
            {
               array_push($posts,$post);
            }
//            $posts=array_merge($posts,$follow_post);
        }
    
        return view('articles.others',['posts'=>$posts]);
        
    }

}
