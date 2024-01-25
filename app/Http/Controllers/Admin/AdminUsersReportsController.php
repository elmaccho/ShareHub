<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReportsUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersReportsController extends Controller
{
    public function index(): View
    {
        $loggedUser = Auth::user();
        $reportedUsers = ReportsUser::paginate(10);


        return view('admin.views.reports.users', compact([
            'loggedUser',
            'reportedUsers'
        ]));
    }
}
