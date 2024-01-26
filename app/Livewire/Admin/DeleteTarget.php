<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\Models\ReportsComment;
use App\Models\ReportsPost;
use Livewire\Component;

class DeleteTarget extends Component
{
    public $targetId;
    public $reportId;
    public $type;

    public function mount($targetId, $reportId, $type)
    {
        $this->targetId = $targetId;
        $this->reportId = $reportId;
        $this->type = $type;
    }

    public function delete()
    {
        // dd(
        //     $this->targetId,
        //     $this->reportId,
        //     $this->type
        // );

        if($this->type == 'post'){
            $report = ReportsPost::where('id', $this->reportId)->first();
            $post = Post::where('id', $this->targetId)->first();
            if($report){
                $report->delete();
            }
            if($post){
                $post->comments()->delete();
                $post->delete();
            }
        }
        if($this->type == 'comment'){
            $report = ReportsComment::where('id', $this->reportId)->first();
            $post = Comment::where('id', $this->targetId)->first();
            if($report){
                $report->delete();
            }
            if($post){
                $post->delete();
            }
        }

        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.admin.delete-target');
    }
}
