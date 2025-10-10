<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $fillable = ['user_id', 'visit_date', 'visit_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}