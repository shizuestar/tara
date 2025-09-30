<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectJoinRequest extends Model
{
    protected $fillable = [
        'project_id', 'user_id', 'name', 'email', 'role', 'message', 'status',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}