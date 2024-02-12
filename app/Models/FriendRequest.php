<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FriendRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_id', 
        'requested_id', 
        'status'
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function requested()
    {
        return $this->belongsTo(User::class, 'requested_id');
    }
    public function getReadableCreatedAt()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
