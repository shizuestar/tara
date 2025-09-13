<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
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

        return view('administrator.admin.blog.index', compact('blogs', 'categories', 'statuses', 'filters'));
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

        Blog::create($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog baru ditambahkan.');
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
{
    $data = $request->validated();
    $data['tags'] = $request->tags ? array_map('trim', explode(',', $request->tags)) : [];

    $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

    if ($request->hasFile('cover_image')) {
        if ($blog->cover_image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($blog->cover_image);
        }
        $data['cover_image'] = $request->file('cover_image')->store('uploads/blogs', 'public');
    }

    $blog->update($data);

    return redirect()
        ->route('admin.blog.index', $blog->id)
        ->with('success', 'Blog berhasil diperbarui dan ditampilkan.');
}

    public function destroy(Blog $blog)
    {
        if ($blog->cover_image) {
            Storage::disk('public')->delete($blog->cover_image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog dihapus.');
    }
}
