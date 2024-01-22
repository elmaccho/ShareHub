<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function index()
    {
        $loggedUser = Auth::user();
        $posts = Post::paginate(5);


        return view('admin.views.posts.index', compact([
            'loggedUser',
            'posts'
        ]));
    }
}
