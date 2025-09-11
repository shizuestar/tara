<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtworkTag extends Model
{
    protected $table = 'artwork_tags';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'artwork_id', 'tag'
    ];

    protected $casts = [
        'artwork_id' => 'integer',
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class, 'artwork_id');
    }
}