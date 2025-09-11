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
        'banner',
        'creator_id',
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

    // Members relationship (through pivot table)
    public function members()
    {
        return $this->belongsToMany(User::class, 'community_members')
                    ->withPivot('role', 'joined_at')
                    ->withTimestamps()
                    ->orderBy('role', 'desc')
                    ->orderBy('joined_at', 'desc');
    }

    // Admins (members with admin role)
    public function admins()
    {
        return $this->members()->wherePivot('role', 'admin');
    }

    // Moderators (members with moderator role)
    public function moderators()
    {
        return $this->members()->wherePivot('role', 'moderator');
    }

    // Recent activities (posts, comments, etc.)
    public function recentActivities()
    {
        return $this->hasMany(CommunityPost::class)->take(5);
    }

    // Recent projects related to this community
    public function recentProjects()
    {
        return Project::where('community_id', $this->id)->take(5);
    }

    // Recent artworks from this community
    public function recentArtworks()
    {
        return Artwork::where('community_id', $this->id)->take(5);
    }

    // Get member count
    public function getMemberCountAttribute()
    {
        return $this->members()->count();
    }

    // Scope for active communities
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Delete avatar and banner when community is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($community) {
            if ($community->avatar) {
                Storage::disk('public')->delete($community->avatar);
            }
            if ($community->banner) {
                Storage::disk('public')->delete($community->banner);
            }
        });
    }
}