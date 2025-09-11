<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Artwork;
use App\Models\Category;
use App\Models\ArtworkTag;
use App\Models\ArtworkFile;
use Illuminate\Http\Request;

class AdminGaleriController extends Controller
{
    public function index()
    {
        $artworks = Artwork::with(['images', 'category'])->paginate(10);
        $categories = Category::all();
        return view('administrator.admin.galeri.index', compact('artworks', 'categories'));
    }

    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('administrator.admin.galeri.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required',
            'thumbnail' => 'required|image|max:5048',
            'palette' => 'required|string|max:100',
            'typography' => 'required|string|max:100',
            'period' => 'required|string|max:100',
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'required|exists:categories,id',
            'image_paths.*' => 'image|max:5048',
            'tags' => 'array',
        ]);

        $artwork = Artwork::create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $request->file('thumbnail')->store('thumbnails', 'public'),
            'palette' => $request->palette,
            'typography' => $request->typography,
            'period' => $request->period,
            'status' => $request->status,
            'community_id' => $request->community_id,
            'category_id' => $request->category_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('image_paths')) {
            foreach ($request->file('image_paths') as $image) {
                ArtworkFile::create([
                    'gallery_id' => null,
                    'artwork_id' => $artwork->id,
                    'image_path' => $image->store('images', 'public'),
                    'description' => $request->image_descriptions[array_search($image, $request->file('image_paths'))] ?? '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        if ($request->tags) {
            foreach ($request->tags as $tag) {
                ArtworkTag::create([
                    'artwork_id' => $artwork->id,
                    'tag' => $tag,
                ]);
            }
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Karya ditambahkan dengan mulia.');
    }

    public function show(Request $request, $id)
    {
        $artwork = Artwork::with(['images', 'category', 'tags'])->findOrFail($id);
        return view('administrator.admin.galeri.show', compact('artwork'));
    }

    public function edit($id)
    {
        $artwork = Artwork::with(['images', 'category'])->findOrFail($id);
        $categories = Category::all(); // Ambil semua kategori
        return view('administrator.admin.galeri.index', compact('artwork', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required',
            'thumbnail' => 'sometimes|image|max:5048',
            'palette' => 'required|string|max:100',
            'typography' => 'required|string|max:100',
            'period' => 'required|string|max:100',
            'status' => 'required|in:draft,published,archived',
            'category_id' => 'required|exists:categories,id',
            'image_paths.*' => 'image|max:5048',
            'tags' => 'array',
        ]);

        $artwork = Artwork::findOrFail($id);
        $artwork->update([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $request->hasFile('thumbnail') ? $request->file('thumbnail')->store('thumbnails', 'public') : $artwork->thumbnail,
            'palette' => $request->palette,
            'typography' => $request->typography,
            'period' => $request->period,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'updated_at' => now(),
        ]);

        if ($request->hasFile('image_paths')) {
            ArtworkFile::where('artwork_id', $id)->delete();
            foreach ($request->file('image_paths') as $image) {
                ArtworkFile::create([
                    'gallery_id' => null,
                    'artwork_id' => $artwork->id,
                    'image_path' => $image->store('images', 'public'),
                    'description' => $request->image_descriptions[array_search($image, $request->file('image_paths'))] ?? '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        ArtworkTag::where('artwork_id', $id)->delete();
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                ArtworkTag::create([
                    'artwork_id' => $artwork->id,
                    'tag' => $tag,
                ]);
            }
        }

        return redirect()->route('admin.galeri.show', $id)->with('success', 'Karya diperbarui dengan anggun.');
    }

    public function destroy(string $id)
    {
        $artwork = Artwork::findOrFail($id);
        $artwork->images()->delete();
        $artwork->tags()->delete();
        $artwork->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Karya dihapus dengan mulia.');
    }
}