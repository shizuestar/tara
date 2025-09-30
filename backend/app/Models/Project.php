<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'creator_id',
        'community_id',
        'category_id',
        'type_id',
        'description',
        'cover_images',
        'start_date',
        'end_date',
        'progress',
        'status',
        'collaboration_goals',
    ];

    // Existing relationships
    public function comments()
    {
        return $this->hasMany(ProjectComment::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function timeline()
    {
        return $this->hasMany(ProjectTimeline::class);
    }

    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function milestones()
    {
        return $this->hasMany(ProjectMilestone::class);
    }

    public function likes()
    {
        return $this->hasMany(ProjectLike::class);
    }

    public function tasks()
    {
        return $this->hasMany(ProjectTask::class);
    }

    public function type()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    // Add the new files relationship
    public function files()
    {
        return $this->hasMany(ProjectFile::class);
    }

    public function joinRequests()
    {
        return $this->hasMany(ProjectJoinRequest::class);
    }

    public function getStatusTextAttribute()
    {
        return match ($this->status) {
            'ongoing' => 'Sedang Berjalan',
            'pending' => 'Menunggu',
            'completed' => 'Selesai',
            default => 'Tidak Diketahui',
        };
    }
}