<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GirisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubredditController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::get('/logout',[LoginController::class,'logout']);



Route::middleware(['auth'])->group(function () {
    Route::resource('/homes', HomeController::class);
    Route::resource('/post', PostController::class);
    Route::post('/like/{post}',[LikeController::class,'store']);
    Route::post('/lik/{comment}',[LikeController::class,'commentstore']);

    Route::post('/comment',[CommentController::class,'store']);
    Route::post('/comment/{comment}',[CommentController::class,'commentstore']);
    Route::delete('/commentdelete/{comment}',[CommentController::class,'destroy']);

    Route::resource('/subreddit',SubredditController::class);

    Route::post('/join/{subreddit}',[JoinController::class,'join']);
});

Route::get('/test',function(){
    return view('other.test');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
