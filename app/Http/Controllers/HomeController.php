<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $loggedUser = Auth::user();
        // $posts = Post::all();
        $comments = Comment::all();

        return view('home.home', compact('loggedUser',
        // 'posts',
        'comments'));
    }
    public function create()
    {
        return view('home.create');
    }
}
