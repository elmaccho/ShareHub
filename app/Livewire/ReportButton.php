<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReportButton extends Component
{
    public $type;
    public $targetId;
    public $reporterId;
    public function mount($type, $targetId)
    {
        $this->type = $type;
        $this->targetId = $targetId;
        $this->reporterId = Auth::user()->id;
    }
    public function render()
    {
        return view('livewire.report-button');
    }
    public function showReportModal()
    {
        $this->dispatch('showReportModal', [
            'targetId' => $this->targetId,
            'type' => $this->type,
            'reporterId' => $this->reporterId,
        ]);
    }
}
