<?php

namespace App\Livewire\Admin;

use App\Enums\BanReason;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Ban;

class UserStatus extends Component
{
    public $userId;
    public $user;
    public $loggedUser;
    public $banCategories;
    public $category;
    
    public $reason;
    public $banDuration;
    public $startDate;
    public $endDate;
    public $bans;

    public function mount($userId)
    {
        $this->bans = Ban::find($userId);
        $this->loggedUser = Auth::user();
        $this->userId = $userId;
        $this->user = User::find($userId);
        $this->banCategories;
        $this->banDuration = 7;
        $this->category = '';
        $this->reason = '';
        $this->startDate = Carbon::today()->format('Y-m-d');
    }
    public function calculateEndDate()
    {
        if($this->banDuration > 0){
            $this->endDate = Carbon::today()->addDays($this->banDuration)->format('Y-m-d');
        }
    }
    public function submit()
    {
        $this->calculateEndDate();
        $this->reason = empty($this->reason) ? null : $this->reason;

        Ban::create([
            'user_id' => $this->userId,
            'category' => $this->category,
            'reason' => $this->reason,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate
        ]);

        return redirect(request()->header('Referer'));
    }   

    public function render()
    {
        return view('livewire.admin.user-status');
    }
}
