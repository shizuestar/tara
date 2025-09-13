<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_organizers');
    }
}
