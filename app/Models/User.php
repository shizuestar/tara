<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'bio',
        'role',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relations
    // Communities created by user
    // public function communities(): HasMany
    // {
    //     return $this->hasMany(Community::class);
    // }

    // Community memberships
    public function communityMemberships(): HasMany
    {
        return $this->hasMany(CommunityMember::class);
    }

    // Community posts
    public function communityPosts(): HasMany
    {
        return $this->hasMany(CommunityPost::class);
    }

    // Community post comments
    public function communityPostComments(): HasMany
    {
        return $this->hasMany(CommunityPostComment::class);
    }

    // Artworks created by user
    public function artworks(): HasMany
    {
        return $this->hasMany(Artwork::class, 'creator_id');
    }

    // Artwork likes
    public function artworkLikes(): HasMany
    {
        return $this->hasMany(ArtworkLike::class);
    }

    // Artwork comments
    public function artworkComments(): HasMany
    {
        return $this->hasMany(ArtworkComment::class);
    }

    // Projects created by user
    public function createdProjects(): HasMany
    {
        return $this->hasMany(Project::class, 'creator_id');
    }

    // Project memberships
    public function projectMemberships(): HasMany
    {
        return $this->hasMany(ProjectMember::class);
    }

    // Project tasks assigned to user
    public function assignedTasks(): HasMany
    {
        return $this->hasMany(ProjectTask::class, 'assigned_to');
    }

    // Project likes
    public function projectLikes(): HasMany
    {
        return $this->hasMany(ProjectLike::class);
    }

    // Project comments
    public function projectComments(): HasMany
    {
        return $this->hasMany(ProjectComment::class);
    }

    // Comment likes
    public function commentLikes(): HasMany
    {
        return $this->hasMany(ProjectCommentLike::class);
    }

    // Events organized by user
    public function organizedEvents(): HasMany
    {
        return $this->hasMany(Organizer::class);
    }

    // Event registrations
    public function eventRegistrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    // Event comments
    public function eventComments(): HasMany
    {
        return $this->hasMany(EventComment::class);
    }

    // Blogs authored by user
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'author_id');
    }

    // Blog likes
    public function blogLikes(): HasMany
    {
        return $this->hasMany(BlogLike::class);
    }

    // Blog comments
    public function blogComments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }

    // Get all communities user is member of
    public function communities(): BelongsToMany
    {
        return $this->belongsToMany(Community::class, 'community_members')
                    ->withPivot('role', 'joined_at')
                    ->withTimestamps();
    }

    // Get all projects user is member of
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_members')
                    ->withPivot('role', 'joined_at')
                    ->withTimestamps();
    }
}
