<?php

use App\Http\Controllers\admin\AdminBannedUsersController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
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


Route::middleware(['auth', 'verified', 'CheckIfBanned'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/{user}/background-image', [ProfileController::class, 'deleteBackgroundImage'])->name('profile.deleteBackgroundImage');
    Route::delete('profile/{user}/profile-image', [ProfileController::class, 'deleteProfileImage'])->name('profile.deleteProfileImage');  

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/edit/{user}', [SettingsController::class, 'update'])->name('settings.update');

    Route::post('home/posts', [PostController::class, 'store'])->name('post.store');
    Route::get('home/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('home/post/edit/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('home/{post}', [PostController::class, 'destroy'])->name('home.post.destroy');
    Route::delete('profile/{post}', [PostController::class, 'destroy'])->name('profile.post.destroy');
    Route::get('home/post/create', [HomeController::class, 'create'])->name('post.create');
    
    Route::delete('comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::post('home/post/{post}/like', [PostLikeController::class, 'like'])->name('post.like');
    Route::post('home/post/{post}/unlike', [PostLikeController::class, 'unlike'])->name('post.unlike');

    Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');

    Route::middleware(['can:isAdmin'])->group(function(){
        Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/get-states', [AdminUserController::class, 'getStates']);
        Route::get('/admin/get-cities', [AdminUserController::class, 'getCities']);
        Route::delete('/admin/{post}', [PostController::class, 'destroy'])->name('admin.dashboard.deletepost');

        Route::get('/admin/post', [AdminPostController::class, 'index'])->name('admin.posts.index');
        Route::get('/admin/banned users', [AdminBannedUsersController::class, 'index'])->name('admin.banned_users.index');
    });
});

Auth::routes();