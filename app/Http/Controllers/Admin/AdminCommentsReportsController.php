<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReportsComment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCommentsReportsController extends Controller
{
    public function index(): View
    {
        $loggedUser = Auth::user();
        $reportedComments = ReportsComment::paginate(10);

        return view('admin.views.reports.comments', compact([
            'loggedUser',
            'reportedComments'
        ]));
    }
}
