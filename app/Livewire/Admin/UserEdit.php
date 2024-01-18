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

    public $name;
    public $surname;
    public $role;
    public $country_id, $state_id, $city_id;



    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);
        $this->countries = Country::all();
        $this->name = $this->user->name;
        $this->surname = $this->user->surname;
        $this->role = $this->user->role;
        $this->country_id = $this->user->country_id;
        $this->state_id = $this->user->state_id;
        $this->city_id = $this->user->city_id;
    }
    
    public function update()
    {
        $this->user->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'role' => $this->role,
            'country_id' => $this->country_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
        ]);
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.admin.user-edit');
    }
}
