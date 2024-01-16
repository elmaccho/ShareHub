<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View
    {
        $loggedUser = Auth::user();

        return view('admin.dashboard', compact('loggedUser'));
    }

    public function showUsers(): View
    {
        $users = User::paginate(10);
        return view('admin.views.users.index', compact('users'));
    }
}