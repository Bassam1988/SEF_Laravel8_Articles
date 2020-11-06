<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
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
        return view('postDetails',['posts'=>$posts]);
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
    public function update(Request $request, Posts $posts)
    {

        $this->validatePosts();
        $posts->title=request('title');
        $posts->summary=request('summary');
        $posts->body=request('body');
 
        $posts->save();
        if(request('categories')){
            $posts->categories()->detach();
            $posts->categories()->attach(request('categories'));
        }
        
        return redirect( route('postDetails',$posts));
        
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

}
