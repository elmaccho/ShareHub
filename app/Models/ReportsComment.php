<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportsComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'reporter_id',
        'category',
        'reason',
    ];
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
    public function reportedComment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
