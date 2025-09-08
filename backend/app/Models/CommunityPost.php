<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityPost extends Model
{
    protected $table = 'community_posts';
    protected $fillable = [
        'community_id',
        'user_id',
        'title',
        'content',
        'type',
        'file_url',
    ];

    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(CommunityPostComment::class, 'post_id');
    }
}