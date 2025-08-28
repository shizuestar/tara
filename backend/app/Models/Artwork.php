<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'palette',
        'typography',
        'period',
        'status',
        'community_id',
        'category_id',
        'creator_id'
    ];

    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(ArtworkTag::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(ArtworkLike::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ArtworkComment::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(ArtworkFile::class, 'artwork_id');
    }

    // Accessor for likes count
    public function getLikesCountAttribute(): int
    {
        return $this->likes()->count();
    }

    // Accessor for comments count
    public function getCommentsCountAttribute(): int
    {
        return $this->comments()->count();
    }
}