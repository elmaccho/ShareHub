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
    public function post(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
