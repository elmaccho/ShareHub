<?php

namespace App\Livewire\Admin;

use App\Models\Ban;
use Livewire\Component;

class UnbanButton extends Component
{
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function unban(){
        $ban = Ban::where('user_id', $this->userId)->first();

        if($ban){
            $ban->delete();
        }
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.admin.unban-button');
    }
}
