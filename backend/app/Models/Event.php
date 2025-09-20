<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'start_date',
        'end_date',
        'time_start',
        'time_end',
        'location',
        'description',
        'status',
        'image_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function comments()
    {
        return $this->hasMany(EventComment::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    protected $casts = [
        'start_date' => 'date',
    ];

}