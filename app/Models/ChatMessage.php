<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'chat_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function isAuthenticatedUsers()
    {
        return $this->user_id === Auth::user()->id;
    }
    public function getReadableCreatedAt()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
