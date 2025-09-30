<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use App\Models\Community;
use App\Models\ArtworkTag;
use App\Models\ArtworkFile;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Artwork::with(['category', 'community', 'tags']);

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('community_id') && $request->community_id) {
            $query->where('community_id', $request->community_id);
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('keyword') && $request->keyword) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                  ->orWhere('description', 'like', '%' . $keyword . '%')
                  ->orWhereHas('tags', function ($q) use ($keyword) {
                      $q->where('tag', 'like', '%' . $keyword . '%');
                  });
            });
        }

        $artworks = $query->latest()->paginate(10);
        $categories = Category::all();
        $communities = Community::all();
        $activities = ActivityLog::where('type', 'artwork')->latest()->take(10)->get();

        return view('administrator.admin.galeri.index', compact('artworks', 'categories', 'communities', 'activities'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $artwork = Artwork::with(['category', 'community', 'tags', 'files'])->findOrFail($id);
        return view('administrator.admin.galeri.show', compact('artwork'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'palette' => 'nullable|string|max:100',
            'typography' => 'nullable|string|max:100',
            'period' => 'nullable|string|max:100',
            'status' => ['required', Rule::in(['draft', 'published', 'archived'])],
            'category_id' => 'nullable|exists:categories,id',
            'community_id' => 'nullable|exists:communities,id',
            'tags' => 'nullable|string',
            'carousel_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $thumbnailPath = $request->file('thumbnail') ? $request->file('thumbnail')->store('artworks/thumbnails', 'public') : null;

        $artwork = Artwork::create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnailPath,
            'palette' => $request->palette,
            'typography' => $request->typography,
            'period' => $request->period,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'community_id' => $request->community_id,
        ]);

        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            foreach ($tags as $tag) {
                if ($tag) {
                    ArtworkTag::create([
                        'artwork_id' => $artwork->id,
                        'tag' => $tag,
                    ]);
                }
            }
        }

        if ($request->hasFile('carousel_images')) {
            foreach ($request->file('carousel_images') as $image) {
                if ($image) {
                    $imagePath = $image->store('artworks/carousel', 'public');
                    ArtworkFile::create([
                        'artwork_id' => $artwork->id,
                        'image_path' => $imagePath,
                        'image_title' => $request->title,
                        'description' => $request->description,
                    ]);
                }
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'artwork',
            'description' => 'Karya baru "' . $artwork->title . '" telah ditambahkan',
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Karya berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $artwork = Artwork::with(['tags', 'files'])->findOrFail($id);
        $tags = $artwork->tags->pluck('tag')->toArray();
        $files = $artwork->files;
        return response()->json([
            'artwork' => $artwork,
            'tags' => $tags,
            'files' => $files,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $artwork = Artwork::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'palette' => 'nullable|string|max:100',
            'typography' => 'nullable|string|max:100',
            'period' => 'nullable|string|max:100',
            'status' => ['required', Rule::in(['draft', 'published', 'archived'])],
            'category_id' => 'nullable|exists:categories,id',
            'community_id' => 'nullable|exists:communities,id',
            'tags' => 'nullable|string',
            'carousel_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $thumbnailPath = $request->thumbnail_hidden;
        if ($request->hasFile('thumbnail')) {
            if ($thumbnailPath && Storage::disk('public')->exists($thumbnailPath)) {
                Storage::disk('public')->delete($thumbnailPath);
            }
            $thumbnailPath = $request->file('thumbnail')->store('artworks/thumbnails', 'public');
        }

        $artwork->update([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $thumbnailPath,
            'palette' => $request->palette,
            'typography' => $request->typography,
            'period' => $request->period,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'community_id' => $request->community_id,
        ]);

        $artwork->tags()->delete();
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            foreach ($tags as $tag) {
                if ($tag) {
                    ArtworkTag::create([
                        'artwork_id' => $artwork->id,
                        'tag' => $tag,
                    ]);
                }
            }
        }

        if ($request->hasFile('carousel_images')) {
            foreach ($request->file('carousel_images') as $image) {
                if ($image) {
                    $imagePath = $image->store('artworks/carousel', 'public');
                    ArtworkFile::create([
                        'artwork_id' => $artwork->id,
                        'image_path' => $imagePath,
                        'image_title' => $request->title,
                        'description' => $request->description,
                    ]);
                }
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'artwork',
            'description' => 'Karya "' . $artwork->title . '" berhasil diperbarui',
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Karya berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artwork = Artwork::findOrFail($id);
        $artworkName = $artwork->title;

        if ($artwork->thumbnail && Storage::disk('public')->exists($artwork->thumbnail)) {
            Storage::disk('public')->delete($artwork->thumbnail);
        }

        foreach ($artwork->files as $file) {
            if ($file->image_path && Storage::disk('public')->exists($file->image_path)) {
                Storage::disk('public')->delete($file->image_path);
            }
        }

        $artwork->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'artwork',
            'description' => 'Karya "' . $artworkName . '" berhasil dihapus',
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Karya berhasil dihapus.');
    }

    /**
     * Remove the specified file from storage.
     */
    public function destroyFile($fileId)
    {
        $file = ArtworkFile::findOrFail($fileId);
        $artwork = Artwork::findOrFail($file->artwork_id);
        $artworkName = $artwork->title;

        if ($file->image_path && Storage::disk('public')->exists($file->image_path)) {
            Storage::disk('public')->delete($file->image_path);
        }
        $file->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'artwork',
            'description' => 'Gambar carousel dari karya "' . $artworkName . '" berhasil dihapus',
        ]);

        return response()->json(['success' => true, 'message' => 'Gambar carousel berhasil dihapus.']);
    }
}