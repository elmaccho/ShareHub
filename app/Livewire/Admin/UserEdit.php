<?php

namespace App\Livewire\Admin;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $userId;
    public $user;
    public $countries, $states;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);
        $this->countries = Country::all();
    }
    public function render()
    {
        return view('livewire.admin.user-edit');
    }
}
