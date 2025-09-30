<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'thumbnail', 'palette', 'typography', 'period',
        'visual_style', 'media', 'status', 'category_id', 'community_id', 'user_id', 'views'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function tags()
    {
        return $this->hasMany(ArtworkTag::class);
    }

    public function likes()
    {
        return $this->hasMany(ArtworkLike::class);
    }

    public function files()
    {
        return $this->hasMany(ArtworkFile::class);
    }

    public function comments()
    {
        return $this->hasMany(ArtworkComment::class)->whereNull('parent_id');
    }
}