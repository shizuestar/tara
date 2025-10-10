<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'category_id',
        'avatar',
        'cover_image',
        'creator_id',
        'rules',
        'type',
        'views',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'community_members')
                    ->using(CommunityMember::class)
                    ->withPivot('role', 'joined_at')
                    ->withTimestamps()
                    ->orderBy('community_members.role', 'desc')
                    ->orderBy('community_members.joined_at', 'desc');
    }

    public function admins()
    {
        return $this->members()->where('community_members.role', 'admin');
    }

    public function moderators()
    {
        return $this->members()->where('community_members.role', 'moderator');
    }

    public function posts()
    {
        return $this->hasMany(CommunityPost::class, 'community_id');
    }

    public function recentActivities()
    {
        return $this->hasMany(CommunityPost::class)->with(['user:id,name,avatar'])->latest();
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'community_id');
    }

    public function artworks()
    {
        return $this->hasMany(Artwork::class, 'community_id');
    }

    public function recentProjects()
    {
        return $this->projects()->latest()->take(5);
    }

    public function recentArtworks()
    {
        return $this->artworks()->latest()->take(5);
    }

    public function getMemberCountAttribute()
    {
        return $this->members()->count();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function isMember(User $user): bool
    {
        return $this->members()
                    ->where('user_id', $user->id)
                    ->exists();
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($community) {
            if ($community->avatar) {
                Storage::disk('public')->delete($community->avatar);
            }
            if ($community->cover_image) {
                Storage::disk('public')->delete($community->cover_image);
            }
        });
    }
}