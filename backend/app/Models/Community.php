<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'communities';
    protected $fillable = [
        'name',
        'description',
        'type',
        'cover_image',
        'user_id',
        'category',
        'status',
        'moderator_ids',
        'rules',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function members()
    {
        return $this->hasMany(CommunityMember::class, 'community_id');
    }
}