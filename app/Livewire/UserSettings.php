<?php

namespace App\Livewire;

use App\Http\Requests\UserSettingsRequest;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserSettings extends Component
{
    public $user;
    public $name;
    public $surname;
    public $phone_number;
    public $about;
    public $countries, $states;
    public $country_id, $state_id, $city_id;
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
    public function submit(UserSettingsRequest $request)
    {
        // dd(
        //     $this->country_id,
        //     $this->state_id,
        //     $this->city_id,
        //     $this->website_link,
        //     $this->github_link,
        //     $this->youtube_link,
        //     $this->instagram_link,
        //     $this->facebook_link,
        //     $this->name,
        //     $this->surname,
        //     $this->phone_number,
        //     $this->about,
        // );
        $validatedData = $request->validated();
        try {
            $this->user->update($validatedData);
    
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
