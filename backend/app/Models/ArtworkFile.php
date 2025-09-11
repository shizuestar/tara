<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtworkFile extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'gallery_id', 'artwork_id', 'image_path', 'description'
    ];

    protected $casts = [
        'gallery_id' => 'integer',
        'artwork_id' => 'integer',
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class, 'artwork_id');
    }
}