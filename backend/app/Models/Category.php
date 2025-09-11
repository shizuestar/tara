<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name', 'description'
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function artworks()
    {
        return $this->hasMany(Artwork::class, 'category_id');
    }
}