<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }

    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class, 'category_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function scopeSearch($query, $keyword): void
    {
        $query->where('name', 'like', "%{$keyword}%")
              ->orWhere('description', 'like', "%{$keyword}%");
    }
}