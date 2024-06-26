<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'likes',
        'comments',
        'saves',
        'user_id',
        'category_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments(): HasMany
    {
        return $this->HasMany(Comment::class);
    }
    public function likes():BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'post_like')->withTimestamps();
    }
    public function reportPosts(): HasMany
    {
        return $this->hasMany(ReportsPost::class);
    }
    public function postImage(): HasMany
    {
        return $this->hasMany(PostImage::class);
    }
    public function hasImage()
    {
        return $this->postImage()->exists();
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
