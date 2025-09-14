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
        return $this->members()->wherePivot('role', 'admin');
    }

    public function moderators()
    {
        return $this->members()->wherePivot('role', 'moderator');
    }

    public function recentActivities()
    {
        return $this->hasMany(CommunityPost::class)->take(5);
    }

    public function recentProjects()
    {
        return Project::where('community_id', $this->id)->take(5);
    }

    public function recentArtworks()
    {
        return Artwork::where('community_id', $this->id)->take(5);
    }

    public function getMemberCountAttribute()
    {
        return $this->members()->count();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function posts()
    {
        return $this->hasMany(CommunityPost::class, 'community_id');
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