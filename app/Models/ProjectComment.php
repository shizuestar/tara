<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'comment',
        'parent_comment_id'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProjectComment::class, 'parent_comment_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(ProjectComment::class, 'parent_comment_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(ProjectCommentLike::class, 'comment_id');
    }
}