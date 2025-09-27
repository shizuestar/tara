<?php
namespace App\Models;

   use Illuminate\Database\Eloquent\Model;

   class Blog extends Model
   {
       protected $fillable = ['author_id', 'category_id', 'cover_image', 'title', 'content', 'slug', 'status', 'views'];

       public function category()
       {
           return $this->belongsTo(Category::class);
       }

       public function author()
       {
           return $this->belongsTo(User::class, 'author_id');
       }

       public function comments()
       {
           return $this->hasMany(BlogComment::class);
       }

       public function likes()
       {
           return $this->hasMany(BlogLike::class);
       }

        public function bookmarks()
        {
            return $this->morphMany(Bookmark::class, 'bookmarkable');
        }

       protected $casts = [
        'tags' => 'array',
    ];

       
    public function scopeFilter($query, $filters)
    {
        if (!empty($filters['keyword'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', "%{$filters['keyword']}%")
                  ->orWhere('content', 'like', "%{$filters['keyword']}%");
            });
        }

        if (!empty($filters['category'])) {
            $query->whereHas('category', function ($q) use ($filters) {
                $q->where('name', $filters['category']);
            });
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
    }
   }
