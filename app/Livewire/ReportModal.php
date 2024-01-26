<?php

namespace App\Livewire;

use App\Models\ReportsComment;
use App\Models\ReportsPost;
use App\Models\ReportsUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReportModal extends Component
{
    public $targetId;
    public $type;
    public $reporterId;
    public $category;
    public $reason;
    public $isModalOpen = false;

    protected $listeners = ['showReportModal' => 'openModal'];

    public function openModal($data)
    {
        $this->targetId = $data['targetId'];
        $this->type = $data['type'];
        $this->reporterId = $data['reporterId'];
        $this->category = '';
        $this->reason = '';
        $this->isModalOpen = true;
    }
    public function closeReportModal()
    {
        $this->isModalOpen = false;
    }
    public function render()
    {
        return view('livewire.report-modal');
    }
    public function report()
    {
        $this->reason = empty($this->reason) ? null : $this->reason;

        if($this->reporterId == $this->targetId){
            return;
        }

        

        switch($this->type){
            case 'user':
                ReportsUser::create([
                    'user_id' => $this->targetId,
                    'reporter_id' => $this->reporterId,
                    'category' => $this->category,
                    'reason' => $this->reason,
                ]);
                break;

            case 'post':
                ReportsPost::create([
                    'post_id' => $this->targetId,
                    'reporter_id' => $this->reporterId,
                    'category' => $this->category,
                    'reason' => $this->reason,
                ]);
                break;

            case 'comment':
                ReportsComment::create([
                    'comment_id' => $this->targetId,
                    'reporter_id' => $this->reporterId,
                    'category' => $this->category,
                    'reason' => $this->reason,
                ]);
                break;

            default:
                break;
        };

        $this->closeReportModal();
        $this->reset();

        $this->dispatch(
            'reportedPopup',
              type : 'success',
              title : 'Reported!',
              position : 'top-end'  
            );
    }
}
