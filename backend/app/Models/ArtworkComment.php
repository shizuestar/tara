<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtworkComment extends Model
{
    protected $fillable = ['artwork_id', 'user_id', 'parent_id', 'text', 'likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }

    public function replies()
    {
        return $this->hasMany(ArtworkComment::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(ArtworkComment::class, 'parent_id');
    }

    public function likes()
    {
        return $this->hasMany(ArtworkCommentLike::class, 'comment_id');
    }
}