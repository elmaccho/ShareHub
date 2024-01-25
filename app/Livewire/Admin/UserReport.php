<?php

namespace App\Livewire\Admin;

use App\Models\ReportsUser;
use Livewire\Component;

class UserReport extends Component
{
    public $reportId;
    public function mount($reportId)
    {
        $this->reportId = $reportId;
    }
    public function reject()
    {
        $reject = ReportsUser::where('id', $this->reportId)->first();
        
        if($reject){
            $reject->delete();
        }
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.admin.user-report');
    }
}
