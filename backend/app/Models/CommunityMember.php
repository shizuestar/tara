<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CommunityMember extends Pivot
{
    protected $table = 'community_members';

    protected $casts = [
        'role' => 'string',
        'joined_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'community_id',
        'user_id',
        'role',
        'joined_at',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}