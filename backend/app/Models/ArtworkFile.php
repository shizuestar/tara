<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'image_title',
        'image_path',
        'description'
    ];

    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class, 'artwork_id');
    }
}