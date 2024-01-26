<?php

namespace App\Livewire\Admin;

use App\Models\ReportsComment;
use App\Models\ReportsPost;
use App\Models\ReportsUser;
use Livewire\Component;

class UserReport extends Component
{
    public $reportId;
    public $type;
    public function mount($reportId, $type)
    {
        $this->reportId = $reportId;
        $this->type = $type;
    }
    public function reject()
    {
        if($this->type == 'user'){
            $reject = ReportsUser::where('id', $this->reportId)->first();
            if($reject){
                $reject->delete();
            }
        }
        if($this->type == 'post'){
            $reject = ReportsPost::where('id', $this->reportId)->first();
            if($reject){
                $reject->delete();
            }
        }
        if($this->type == 'comment'){
            $reject = ReportsComment::where('id', $this->reportId)->first();
            if($reject){
                $reject->delete();
            }
        }
        $this->dispatch(
            'reportedPopup',
              type : 'success',
              title : 'Report Rejected!',
              position : 'top-end'  
            );
        // return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.admin.user-report');
    }
}
