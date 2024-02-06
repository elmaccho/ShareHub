<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRole as UserRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'profile_image_path',
        'background_image_path',
        'website_link',
        'github_link',
        'youtube_link',
        'instagram_link',
        'facebook_link',
        'phone_number',
        'about',
        'country_id',
        'state_id',
        'city_id',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function post():HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function comment():HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function likes():BelongsToMany
    {
        return $this->BelongsToMany(Post::class, 'post_like')->withTimestamps();
    }
    public function likesPost(Post $post)
    {
        return $this->likes()->where('post_id', $post->id)->exists();
    }
    public function hasSocialLinks()
    {
        $socialPlatforms = ['website_link', 'github_link', 'youtube_link', 'instagram_link', 'facebook_link'];

        foreach($socialPlatforms as $socialPlatform){
            if(!empty($this->$socialPlatform)){
                return true;
            }
        }

        return false;
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function isAdmin()
    {
        return $this->role === UserRoles::ADMIN;
    }

    public function isModerator()
    {
        return $this->role === UserRoles::MODERATOR;
    }

    public function isOwnerOfPost(Post $post)
    {
        return $this->id === $post->user_id;
    }

    public function bans(): HasMany
    {
        return $this->hasMany(Ban::class);
    }
    public function isBanned()
    {
        return $this->bans()->exists();
    }
    public function reportUsers(): HasMany
    {
        return $this->hasMany(ReportsUser::class);
    }
    public function chats()
    {
        return $this->belongsToMany(Chat::class, 'chat_user', 'user_id', 'chat_id');
    }
}
