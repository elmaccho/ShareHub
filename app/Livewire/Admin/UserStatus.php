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

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);
    }

    public function render()
    {
        return view('livewire.admin.user-status');
    }
}
