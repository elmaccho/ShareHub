<?php

namespace App\Livewire;

use App\Http\Requests\UserSettingsRequest;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserSettings extends Component
{
    public $user;
    #[Rule('required|max:255')]
    public $name;
    #[Rule('required|max:255')]
    public $surname;
    #[Rule('nullable|regex:/^[0-9]{9,15}$/')]
    public $phone_number;
    #[Rule('nullable|max:1000')]
    public $about;
    public $countries, $states;
    public $country_id, $state_id, $city_id;
    #[Rule('nullable|max:255|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/i')]
    public $website_link, $github_link, $youtube_link, $instagram_link, $facebook_link;
    public function mount()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->countries = Country::all();
        $this->country_id = $this->user->country_id;
        $this->state_id = $this->user->state_id;
        $this->city_id = $this->user->city_id;
        $this->website_link = $user->website_link;
        $this->github_link = $user->github_link;
        $this->youtube_link = $user->youtube_link;
        $this->instagram_link = $user->instagram_link;
        $this->facebook_link = $user->facebook_link;
        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->phone_number = $user->phone_number;
        $this->about = $user->about;

    }
    public function render()
    {
        return view('livewire.user-settings');
    }
    public function submit()
    {
        $validated = $this->validate();

        try {
            $this->user->update($validated);
    
            $this->dispatch(
                'settingsUpdated',
                  type : 'success',
                  title : 'Settings updated!',
                  position : 'top-end'  
                );
        } catch (\Throwable $th) {
            $this->dispatch(
                'settingsUpdated',
                type : 'error',
                title : 'Something went wrong...',
                position : 'top-end'                 
            );
        }

    }
}
