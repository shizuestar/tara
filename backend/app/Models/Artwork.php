<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'category_id',
        'community_id',
    ];

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
}