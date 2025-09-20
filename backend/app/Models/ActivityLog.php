<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'log_activity';

    protected $fillable = [
        'user_id',
        'type',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
}