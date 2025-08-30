<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'image_path'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'time_start' => 'datetime',
        'time_end' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function organizers(): HasMany
    {
        return $this->hasMany(Organizer::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(EventComment::class);
    }
}