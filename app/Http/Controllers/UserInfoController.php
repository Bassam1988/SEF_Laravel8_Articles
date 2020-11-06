<?php

namespace App\Http\Controllers;

use App\Models\User_info;
use Illuminate\Http\Request;

class UserInfoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_info  $user_info
     * @return \Illuminate\Http\Response
     */
    public function show(User_info $user_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_info  $user_info
     * @return \Illuminate\Http\Response
     */
    public function edit(User_info $user_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_info  $user_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_info $user_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_info  $user_info
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_info $user_info)
    {
        //
    }
}