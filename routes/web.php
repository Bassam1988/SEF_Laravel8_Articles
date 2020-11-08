<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Articles/others/{user_id}', [App\Http\Controllers\PostsController::class, 'others'])->name('otherArticles');
Route::get('/Articles/add', [App\Http\Controllers\PostsController::class, 'create'])->name('addArticle');
Route::post('/Articles', [App\Http\Controllers\PostsController::class, 'store'])->name('storeArticle');
Route::post('/Articles/addComment/{post_id}', [App\Http\Controllers\CommentsController::class, 'store'])->name('storeComment');
Route::get('/Articles/{posts}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('editArticle');
Route::put('/Articles/{post}', [App\Http\Controllers\PostsController::class, 'update'])->name('updateArticle');
Route::get('/postDetails/{posts}', [App\Http\Controllers\PostsController::class, 'show'])->name('postDetails');
