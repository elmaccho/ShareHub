<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCommentsReportsController extends Controller
{
    public function index(): View
    {
        $loggedUser = Auth::user();

        return view('admin.views.reports.comments', compact([
            'loggedUser'
        ]));
    }
}
