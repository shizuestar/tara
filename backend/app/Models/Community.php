<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'cover_image',
        'user_id',
        'category',
        'status',
        'rules',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->hasMany(CommunityMember::class);
    }

    public function moderators()
    {
        return $this->members()->where('role', 'moderator');
    }
}