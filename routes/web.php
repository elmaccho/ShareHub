<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/{user}/background-image', [ProfileController::class, 'deleteBackgroundImage'])->name('profile.deleteBackgroundImage');
    Route::delete('profile/{user}/profile-image', [ProfileController::class, 'deleteProfileImage'])->name('profile.deleteProfileImage');  
    
    Route::post('home/posts', [PostController::class, 'store'])->name('post.store');
    Route::get('home/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('home/post/edit/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('home/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('home/post/create', [HomeController::class, 'create'])->name('post.create');
    
    Route::post('home/{post}/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('home/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::post('home/post/{post}/like', [PostLikeController::class, 'like'])->name('post.like');
    Route::post('home/post/{post}/unlike', [PostLikeController::class, 'unlike'])->name('post.unlike');
});

Auth::routes();