<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportsPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'reporter_id',
        'category',
        'reason',
    ];

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
    public function reportedPost(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
