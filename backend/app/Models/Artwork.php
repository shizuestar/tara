<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $table = 'artworks';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title', 'description', 'thumbnail', 'palette', 'typography', 'period', 'status', 'community_id', 'category_id'
    ];

    protected $casts = [
        'status' => 'string',
        'community_id' => 'integer',
        'category_id' => 'integer',
    ];

    public function images()
    {
        return $this->hasMany(ArtworkFile::class, 'artwork_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->hasMany(ArtworkTag::class, 'artwork_id');
    }
}