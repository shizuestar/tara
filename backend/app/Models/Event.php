<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events'; // pastikan nama tabel

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
        'end_date'   => 'date',
        'time_start' => 'string', // karena di DB tipe TIME, lebih aman pakai string
        'time_end'   => 'string', // sama dengan time_start
    ];

    /**
     * Relasi ke Category (satu kategori bisa punya banyak event)
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke Organizers (satu event bisa punya banyak organizer)
     */
    public function organizers(): HasMany
    {
        return $this->hasMany(Organizer::class);
    }

    /**
     * Relasi ke Tickets (satu event bisa punya banyak jenis tiket)
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Relasi ke Registrations (peserta yang daftar di event)
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    /**
     * Relasi ke Comments (komentar dari peserta/pengunjung)
     */
    public function comments(): HasMany
    {
        return $this->hasMany(EventComment::class);
    }
}
