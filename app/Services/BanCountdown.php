<?php

namespace App\Services;
use Carbon\Carbon;

class BanCountdown
{
    public function calculateRemainingDays(Carbon $startDate, Carbon $endDate){
        $today = Carbon::today();
        $daysRemaining = $today->diffInDays($endDate, false);
    
        return max(0, $daysRemaining);
    }
}