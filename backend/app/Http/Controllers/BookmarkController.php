<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Category;
use App\Models\BlogLike;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index(Request $request)
    {
        $types = [
            'all' => 'Semua',
            'Blog' => 'Blog',
            'Artwork' => 'Karya Seni',
            'CommunityPost' => 'Posting Komunitas',
            'Project' => 'Project',
            'Event' => 'Acara',
        ];

        $bookmarks = Bookmark::where('user_id', auth()->id())
            ->with([
                'bookmarkable' => function ($query) {
                    $query->with('category');
                    $query->with('comments');
                    // Muat likes hanya untuk Blog
                    $query->when($query->getModel()->bookmarkable_type === 'App\\Models\\Blog', function ($q) {
                        $q->with(['likes' => function ($query) {
                            $query->where('user_id', auth()->id());
                        }]);
                    });
                }
            ])
            ->get();

        $filteredBookmarks = $bookmarks;
        $type = $request->query('type', 'all');
        if ($type !== 'all') {
            $filteredBookmarks = $filteredBookmarks->filter(function ($bookmark) use ($type) {
                return class_basename($bookmark->bookmarkable_type) === $type;
            });
        }

        $category = $request->query('category', 'all');
        if ($category !== 'all') {
            $filteredBookmarks = $filteredBookmarks->filter(function ($bookmark) use ($category) {
                return optional($bookmark->bookmarkable->category)->name === $category;
            });
        }

        $categories = Category::all();
        $userLikes = [
            'Blog' => auth()->check() ? BlogLike::where('user_id', auth()->id())->pluck('blog_id')->toArray() : [],
            'Artwork' => [],
            'CommunityPost' => [],
            'Project' => [],
            'Event' => [],
        ];

        $userBookmarks = Bookmark::where('user_id', auth()->id())->pluck('bookmarkable_id', 'bookmarkable_type')->toArray();

        return view('public.user.bookmark', compact('bookmarks', 'filteredBookmarks', 'categories', 'types', 'type', 'category', 'userLikes', 'userBookmarks'));
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'bookmarkable_id' => 'required|integer',
            'bookmarkable_type' => 'required|string|in:App\\Models\\Blog,App\\Models\\Artwork,App\\Models\\CommunityPost,App\\Models\\Project,App\\Models\\Event',
        ]);

        $bookmark = Bookmark::where([
            'user_id' => auth()->id(),
            'bookmarkable_id' => $request->bookmarkable_id,
            'bookmarkable_type' => $request->bookmarkable_type,
        ])->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['bookmarked' => false, 'message' => 'Bookmark dihapus']);
        } else {
            Bookmark::create([
                'user_id' => auth()->id(),
                'bookmarkable_id' => $request->bookmarkable_id,
                'bookmarkable_type' => $request->bookmarkable_type,
            ]);
            return response()->json(['bookmarked' => true, 'message' => 'Bookmark ditambahkan']);
        }
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::where('user_id', auth()->id())->findOrFail($id);
        $bookmark->delete();
        return response()->json(['message' => 'Bookmark dihapus']);
    }
}