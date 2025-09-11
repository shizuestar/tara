<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkFile extends Model
{
    use HasFactory;

    protected $table = 'artwork_files';

    protected $fillable = ['artwork_id', 'image_title', 'image_path', 'description', 'user_id'];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }
}