<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'keyword' => $request->input('keyword'),
            'category' => $request->input('category'),
            'status' => $request->input('status'),
        ];

        $query = Blog::with(['category', 'author'])->orderBy('created_at', 'desc');
        $query->filter($filters);

        $blogs = $query->paginate(6);
        $categories = Category::pluck('name', 'id');
        $statuses = ['draft' => 'Draf', 'published' => 'Diterbitkan', 'archived' => 'Arsip'];
        $activities = ActivityLog::where('type', 'blog')->latest()->take(10)->get();

        return view('administrator.admin.blog.index', compact('blogs', 'categories', 'statuses', 'filters', 'activities'));
    }

    public function show(Blog $blog)
    {
        $blog->load(['category', 'author', 'comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'likes']);
        $categories = Category::pluck('name', 'id');
        $authors = \App\Models\User::where('role', 'author')->pluck('name', 'id');
        return view('administrator.admin.blog.show', compact('blog', 'categories', 'authors'));
    }

    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = Auth::id();
        $data['tags'] = $request->tags ? array_map('trim', explode(',', $request->tags)) : [];
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('uploads/blogs', 'public');
        }

        $blog = Blog::create($data);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'blog',
            'description' => 'Blog baru "' . $blog->title . '" telah ditambahkan',
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog baru ditambahkan.');
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $data['tags'] = $request->tags ? array_map('trim', explode(',', $request->tags)) : [];
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            if ($blog->cover_image) {
                Storage::disk('public')->delete($blog->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('uploads/blogs', 'public');
        }

        $blog->update($data);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'blog',
            'description' => 'Blog "' . $blog->title . '" berhasil diperbarui',
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        $blogTitle = $blog->title;

        if ($blog->cover_image) {
            Storage::disk('public')->delete($blog->cover_image);
        }

        $blog->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'blog',
            'description' => 'Blog "' . $blogTitle . '" berhasil dihapus',
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog dihapus.');
    }
}