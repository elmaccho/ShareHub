<?php

namespace App\Livewire\Admin;

use App\Models\Ban;
use Livewire\Component;

class BannedUsersList extends Component
{
    public $search = '';
    protected $bannedUsers;

    public function mount()
    {
        $this->bannedUsers = Ban::all();
    }

    public function render()
    {
        if (empty($this->search)) {
            $this->bannedUsers = Ban::with('user')->paginate(10);
        } else {
            $this->bannedUsers = Ban::where('category', 'like', '%' . $this->search . '%')
                ->orWhere('reason', 'like', '%' . $this->search . '%')
                ->orWhereHas('user', function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('surname', 'like', '%'.$this->search.'%');
                })
                ->with('user')
                ->paginate(10);
        }
    
        return view('livewire.admin.banned-users-list', [
            'bannedUsers' => $this->bannedUsers
        ]);
    }
}
