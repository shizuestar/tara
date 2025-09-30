<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\ArtworkComment;
use App\Models\ArtworkCommentLike;
use App\Models\Category;
use App\Models\Community;
use App\Models\ArtworkTag;
use App\Models\ArtworkFile;
use App\Models\ArtworkLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function index(Request $request)
    {
        $query = Artwork::with(['creator', 'category', 'tags', 'likes', 'files'])
            ->where('status', 'published');
        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }
        if ($request->has('visual_style') && $request->visual_style) {
            $query->where('visual_style', $request->visual_style);
        }
        if ($request->has('period') && $request->period) {
            $query->where('period', $request->period);
        }
        if ($request->has('media') && $request->media) {
            $query->where('media', $request->media);
        }
        if ($request->has('typography') && $request->typography) {
            $query->where('typography', $request->typography);
        }
        if ($request->has('palette') && $request->palette) {
            $query->where('palette', $request->palette);
        }
        $artworks = $query->paginate(17)->withQueryString();
        $categories = Category::pluck('name');
        $visualStyles = Artwork::whereNotNull('visual_style')->distinct()->pluck('visual_style')->filter();
        $periods = Artwork::whereNotNull('period')->distinct()->pluck('period')->filter();
        $medias = Artwork::whereNotNull('media')->distinct()->pluck('media')->filter();
        $typographies = Artwork::whereNotNull('typography')->distinct()->pluck('typography')->filter();
        $palettes = Artwork::whereNotNull('palette')->distinct()->pluck('palette')->filter();
        $filterCount = count($request->except('page'));
        return view('public.galeri.index', compact('artworks', 'categories', 'visualStyles', 'periods', 'medias', 'typographies', 'palettes', 'filterCount'));
    }
    
    public function show(Artwork $artwork)
        {
            // Peningkatan views
            $artwork->increment('views');

            // Ambil status otentikasi dan ID pengguna SEKALI
            $isLoggedIn = Auth::check();
            $userId = Auth::id();

            $artwork->load([
                'creator' => function ($query) {
                    $query->select('id', 'name', 'avatar');
                },
                'category' => function ($query) {
                    $query->select('id', 'name');
                },
                'community' => function ($query) {
                    $query->select('id', 'name');
                },
                'tags',
                'files',
                
                // PERBAIKAN 1: Pemuatan likes yang aman (menggunakan variabel yang sudah dicek)
                'likes' => function ($query) use ($isLoggedIn, $userId) {
                    if ($isLoggedIn) {
                        // Jika login, filter berdasarkan ID pengguna
                        $query->where('user_id', $userId);
                    } else {
                        // Jika tamu, gunakan klausa yang mustahil (WHERE 1=0) untuk mengembalikan 0 hasil
                        $query->whereRaw('1 = 0');
                    }
                },

                // PERBAIKAN 2: Pemuatan comments.likes yang aman (menggunakan variabel yang sudah dicek)
                'comments' => function ($query) use ($isLoggedIn, $userId) {
                    $query->whereNull('parent_id')->with([
                        'user' => function ($q) {
                            $q->select('id', 'name', 'avatar');
                        },
                        'replies.user' => function ($q) {
                            $q->select('id', 'name', 'avatar');
                        },
                        'likes' => function ($q) use ($isLoggedIn, $userId) {
                            if ($isLoggedIn) {
                                $q->where('user_id', $userId);
                            } else {
                                // Sama seperti di atas, pastikan 0 hasil jika tamu
                                $q->whereRaw('1 = 0');
                            }
                        }
                    ]);
                }
            ]);

            // Navigasi Previous
            $previous = null;

            // Navigasi Next
            $next = null;
            // Rekomendasi
            $recommended = Artwork::where('id', '!=', $artwork->id)
                // Penggunaan when() untuk category_id yang nullable sudah benar dan idiomatik
                ->when($artwork->category_id, function ($query) use ($artwork) {
                    return $query->where('category_id', $artwork->category_id);
                })
                ->where('status', 'published')
                ->inRandomOrder()
                ->limit(3)
                ->select('id', 'title', 'thumbnail', 'description', 'category_id', 'created_at', 'views')
                ->with(['category' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->get();

            return view('public.galeri.show', compact('artwork', 'previous', 'next', 'recommended'));
        }


    public function comment(Request $request, Artwork $artwork)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Silakan login untuk mengirim komentar.'], 401);
        }

        $validated = $request->validate([
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|exists:artwork_comments,id',
        ]);

        try {
            $comment = ArtworkComment::create([
                'artwork_id' => $artwork->id,
                'user_id' => Auth::id(),
                'text' => $validated['text'],
                'parent_id' => $validated['parent_id'] ?? null,
            ]);

            $comment->load(['user' => function ($query) {
                $query->select('id', 'name', 'avatar');
            }]);

            return response()->json([
                'success' => true,
                'comment' => [
                    'id' => $comment->id,
                    'text' => $comment->text,
                    'created_at' => $comment->created_at->toIso8601String(),
                    'user' => [
                        'name' => $comment->user->name,
                        'avatar' => $comment->user->avatar ?? 'https://i.pravatar.cc/60',
                    ],
                    'likes' => 0,
                    'liked' => false,
                    'replies' => [],
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Comment submission failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal mengirim komentar. Silakan coba lagi.'], 500);
        }
    }

    public function commentLike(Request $request, Artwork $artwork, ArtworkComment $comment)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Silakan login untuk menyukai komentar.'], 401);
        }

        $like = $comment->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            $comment->decrement('likes');
            return response()->json(['success' => true, 'likes' => $comment->likes()->count(), 'liked' => false]);
        }

        $comment->likes()->create(['user_id' => Auth::id()]);
        $comment->increment('likes');

        return response()->json(['success' => true, 'likes' => $comment->likes()->count(), 'liked' => true]);
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $communities = Community::pluck('name', 'id');
        return view('public.galeri.create', compact('categories', 'communities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'palette' => 'nullable|string',
            'typography' => 'nullable|string',
            'period' => 'nullable|string',
            'visual_style' => 'nullable|string',
            'media' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'community_id' => 'nullable|exists:communities,id',
            'tags' => 'nullable|string',
            'files' => 'nullable|array|max:5',
            'files.*' => 'file|mimes:jpeg,png,jpg,gif,pdf|max:5120',
            'agreement' => 'required|accepted',
        ]);

        $tags = $validated['tags'] ? array_map('trim', explode(',', $validated['tags'])) : [];

        $artwork = Artwork::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'palette' => $validated['palette'],
            'typography' => $validated['typography'],
            'period' => $validated['period'],
            'visual_style' => $validated['visual_style'],
            'media' => $validated['media'],
            'status' => 'draft',
            'category_id' => $validated['category_id'],
            'community_id' => $validated['community_id'],
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $artwork->update(['thumbnail' => $path]);
        }

        if (!empty($tags)) {
            foreach ($tags as $tag) {
                if ($tag) {
                    ArtworkTag::create(['artwork_id' => $artwork->id, 'tag' => $tag]);
                }
            }
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('artwork_files', 'public');
                ArtworkFile::create([
                    'artwork_id' => $artwork->id,
                    'image_path' => $path,
                    'user_id' => Auth::id(),
                ]);
            }
        }

        return redirect()->route('galeri.index')->with('success', 'Karya berhasil disimpan sebagai draft dan menunggu tinjauan.');
    }

    public function edit(Artwork $artwork)
    {
        if ($artwork->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::pluck('name', 'id');
        $communities = Community::pluck('name', 'id');
        return view('public.galeri.edit', compact('artwork', 'categories', 'communities'));
    }

    public function update(Request $request, Artwork $artwork)
    {
        if ($artwork->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'palette' => 'nullable|string',
            'typography' => 'nullable|string',
            'period' => 'nullable|string',
            'visual_style' => 'nullable|string',
            'media' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'community_id' => 'nullable|exists:communities,id',
            'tags' => 'nullable|string',
            'files' => 'nullable|array|max:5',
            'files.*' => 'file|mimes:jpeg,png,jpg,gif,pdf|max:5120',
            'status' => 'nullable|in:draft,published,rejected',
        ]);

        $tags = $validated['tags'] ? array_map('trim', explode(',', $validated['tags'])) : [];

        $artwork->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'palette' => $validated['palette'],
            'typography' => $validated['typography'],
            'period' => $validated['period'],
            'visual_style' => $validated['visual_style'],
            'media' => $validated['media'],
            'status' => $validated['status'] ?? $artwork->status,
            'category_id' => $validated['category_id'],
            'community_id' => $validated['community_id'],
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($artwork->thumbnail) {
                Storage::disk('public')->delete($artwork->thumbnail);
            }
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $artwork->update(['thumbnail' => $path]);
        }

        $artwork->tags()->delete();
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                if ($tag) {
                    ArtworkTag::create(['artwork_id' => $artwork->id, 'tag' => $tag]);
                }
            }
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('artwork_files', 'public');
                ArtworkFile::create([
                    'artwork_id' => $artwork->id,
                    'image_path' => $path,
                    'user_id' => Auth::id(),
                ]);
            }
        }

        return redirect()->route('galeri.show', $artwork)->with('success', 'Karya berhasil diperbarui.');
    }

    public function destroy(Artwork $artwork)
    {
        if ($artwork->user_id !== Auth::id()) {
            abort(403);
        }
        if ($artwork->thumbnail) {
            Storage::disk('public')->delete($artwork->thumbnail);
        }
        foreach ($artwork->files as $file) {
            Storage::disk('public')->delete($file->image_path);
        }
        $artwork->delete();
        return redirect()->route('galeri.index')->with('success', 'Karya berhasil dihapus.');
    }

    public function like(Artwork $artwork)
    {
        if ($artwork->status !== 'published') {
            abort(403, 'Tidak dapat menyukai karya yang belum dipublikasikan atau ditolak.');
        }
        $like = ArtworkLike::where('artwork_id', $artwork->id)
            ->where('user_id', Auth::id())
            ->first();
        if ($like) {
            $like->delete();
            return response()->json(['likes' => $artwork->likes()->count(), 'liked' => false]);
        }
        ArtworkLike::create([
            'artwork_id' => $artwork->id,
            'user_id' => Auth::id(),
        ]);
        return response()->json(['likes' => $artwork->likes()->count(), 'liked' => true]);
    }
}