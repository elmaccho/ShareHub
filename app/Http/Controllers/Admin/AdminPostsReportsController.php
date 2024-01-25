<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReportsPost;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsReportsController extends Controller
{
    public function index(): View
    {
        $loggedUser = Auth::user();
        $reportedPosts = ReportsPost::paginate(10);

        return view('admin.views.reports.posts', compact([
            'loggedUser',
            'reportedPosts'
        ]));
    }
}
