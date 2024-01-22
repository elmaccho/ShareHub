<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ban;
use App\Services\BanCountdown;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AdminBannedUsersController extends Controller
{
    protected $banCountdown;
    public function __construct(BanCountdown $banCountdown)
    {
        $this->banCountdown = $banCountdown;
    }
    public function index(): View
    {
        $loggedUser = Auth::user();
        $bannedUsers = Ban::paginate(10);

        foreach ($bannedUsers as $bannedUser){
            $bannedUser->remainingDays = $this->banCountdown->calculateRemainingDays(
                Carbon::parse($bannedUser->start_date),
                Carbon::parse($bannedUser->end_date)
            );
        }

        return view('admin.views.banned_users.index', compact([
            'loggedUser',
            'bannedUsers'
        ]));
    }
}
