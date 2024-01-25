<?php

namespace App\Livewire\Admin;

use App\Models\Ban;
use App\Models\ReportsUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BanForm extends Component
{
    public $userId;
    public $user;
    public $loggedUser;
    public $banCategories;
    public $category;
    
    public $reason;
    public $banDuration = 7;
    public $startDate;
    public $endDate;
    public $bans;
public function mount($userId, $category = null, $reason = null)
{
    $this->bans = Ban::find($userId);
    $this->loggedUser = Auth::user();
    $this->userId = $userId;
    $this->user = User::find($userId);
    $this->banCategories;
    $this->category = $category ?? null;
    $this->reason = $reason ?? null;


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

        if(ReportsUser::where('user_id', $this->userId)->exists()){
            ReportsUser::where('user_id', $this->userId)->delete();
        }

        if(Ban::where('user_id', $this->userId)->exists()){
            $this->dispatch(
            'alreadyBanned',
              type : 'info',
              title : 'This user is already banned!',
              position : 'top-end'  
            );

            return;
        }

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
        return view('livewire.admin.ban-form');
    }
}
