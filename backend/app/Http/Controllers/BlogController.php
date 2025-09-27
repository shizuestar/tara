<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogLike;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\BlogComment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'all');
        $query = Blog::with(['category', 'author', 'likes', 'comments', 'bookmarks'])->where('status', 'published');

        if ($category !== 'all') {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', $category);
            });
        }

        $blogs = $query->paginate(6);
        $categories = Category::all();
        $userBookmarks = Auth::check() ? Bookmark::where('user_id', Auth::id())
            ->where('bookmarkable_type', 'App\Models\Blog')
            ->pluck('bookmarkable_id')
            ->toArray() : [];
        $userLikes = Auth::check() ? BlogLike::where('user_id', Auth::id())
            ->pluck('blog_id')
            ->toArray() : [];

        return view('public.blog.index', compact('blogs', 'categories', 'category', 'userBookmarks', 'userLikes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('public.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tags' => 'nullable|array',
        ]);

        $validated['author_id'] = Auth::id();
        $validated['slug'] = Str::slug($validated['title']);
        $validated['status'] = 'draft';
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }
        $validated['tags'] = json_encode($validated['tags'] ?? []);

        Blog::create($validated);
        return redirect()->route('blogs.index')->with('success', 'Blog dibuat.');
    }

    public function show(Blog $blog)
    {
        $blog->increment('views');
        $blog->load(['author', 'category', 'comments.replies.user', 'comments.user', 'likes', 'bookmarks']);
        $likeCount = $blog->likes->count();
        $commentCount = $blog->comments->count() + $blog->comments->sum(fn($c) => $c->replies->count());
        $bookmarkCount = $blog->bookmarks->count();
        $recommended = Blog::where('category_id', $blog->category_id)
                          ->where('id', '!=', $blog->id)
                          ->latest()
                          ->take(3)
                          ->get();
        $prev = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $next = Blog::where('id', '>', $blog->id)->first();
        $readTime = ceil(str_word_count(strip_tags($blog->content)) / 200);
        $isBookmarked = Auth::check() ? Bookmark::where('user_id', Auth::id())
                                               ->where('bookmarkable_id', $blog->id)
                                               ->where('bookmarkable_type', Blog::class)
                                               ->exists() : false;
        $isLiked = Auth::check() ? BlogLike::where('user_id', Auth::id())
                                          ->where('blog_id', $blog->id)
                                          ->exists() : false;

        return view('public.blog.show', compact('blog', 'recommended', 'prev', 'next', 'likeCount', 'commentCount', 'readTime', 'isBookmarked', 'isLiked', 'bookmarkCount'));
    }

    public function edit(Blog $blog)
    {
        if (Auth::id() !== $blog->author_id) abort(403);
        $categories = Category::all();
        return view('public.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        if (Auth::id() !== $blog->author_id) abort(403);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tags' => 'nullable|array',
            'status' => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }
        $validated['tags'] = json_encode($validated['tags'] ?? []);

        $blog->update($validated);
        return redirect()->route('blogs.show', $blog)->with('success', 'Blog diubah.');
    }

    public function destroy(Blog $blog)
    {
        if (Auth::id() !== $blog->author_id) abort(403);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog dihapus.');
    }

    public function like(Blog $blog)
    {
        $userId = Auth::id();
        $like = BlogLike::where('blog_id', $blog->id)->where('user_id', $userId)->first();
        if ($like) {
            $like->delete();
            return response()->json(['likes' => $blog->likes()->count() ?? 0, 'liked' => false]);
        }
        BlogLike::create(['blog_id' => $blog->id, 'user_id' => $userId]);
        return response()->json(['likes' => $blog->likes()->count() ?? 0, 'liked' => true]);
    }

    public function comment(Request $request, Blog $blog)
    {
        $validated = $request->validate(['comment' => 'required|string|max:300']);
        BlogComment::create([
            'blog_id' => $blog->id,
            'user_id' => Auth::id(),
            'comment' => $validated['comment'],
            'parent_comment_id' => $request->parent_comment_id ?? null,
        ]);
        return response()->json(['success' => true, 'comment_count' => $blog->comments->count() + $blog->comments->sum(fn($c) => $c->replies->count())]);
    }

    public function reply(Request $request, Blog $blog, BlogComment $comment)
    {
        $validated = $request->validate(['comment' => 'required|string|max:300']);
        BlogComment::create([
            'blog_id' => $blog->id,
            'user_id' => Auth::id(),
            'comment' => $validated['comment'],
            'parent_comment_id' => $comment->id,
        ]);
        return redirect()->back()->with('success', 'Balasan ditambah.');
    }
}