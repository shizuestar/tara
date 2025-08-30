<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'type'
    ];

    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}