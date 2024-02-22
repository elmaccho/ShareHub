<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostPageController extends Controller
{
    public function index(Post $post): View
    {
        return view('postpage.index', compact(['post']));
    }
}
