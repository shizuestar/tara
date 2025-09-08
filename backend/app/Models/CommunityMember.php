<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityMember extends Model
{
    protected $table = 'community_member';
    protected $fillable = [
        'community_id',
        'user_id',
        'role',
        'joined_at',
    ];

    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}