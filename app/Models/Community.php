<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'cover_image',
        'user_id'
    ];

    // Community creator
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Community members
    public function members(): HasMany
    {
        return $this->hasMany(CommunityMember::class);
    }

    // Community posts
    public function posts(): HasMany
    {
        return $this->hasMany(CommunityPost::class);
    }

    // Artworks in this community
    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class);
    }

    // Projects in this community
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    // Get all users who are members
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'community_members')
                    ->withPivot('role', 'joined_at')
                    ->withTimestamps();
    }
}