<?php

namespace App\Livewire\Admin;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsersList extends Component
{
    public $search = '';
    public $countries, $states;
    public $country_id, $state_id, $city_id;
    public $user;

    
    public function mount()
    {
        $this->countries = Country::all();
        // $this->name = $this->user->name;
        // $this->surname = $this->user->surname;
        // $this->role = $this->user->role;
        // $this->country_id = $this->user->country_id;
        // $this->state_id = $this->user->state_id;
        // $this->city_id = $this->user->city_id;
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
        $users = User::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('surname', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->paginate(10);


        return view('livewire.admin.users-list', [
            'users' => $users,

        ]);
    }
}
