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

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function organizers()
    {
        return $this->belongsToMany(Organizer::class, 'event_organizers');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function comments()
    {
        return $this->hasMany(EventComment::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
