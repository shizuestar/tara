<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Community;
use Illuminate\View\View;
use App\Models\ArtworkTag;
use App\Models\ArtworkFile;
use App\Models\ArtworkLike;
use Illuminate\Http\Request;
use App\Models\ArtworkComment;
use Illuminate\Http\JsonResponse;
use App\Models\ArtworkCommentLike;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function index(Request $request): View
    {
        $query = Artwork::with(['creator:id,name', 'category:id,name', 'tags', 'likes', 'files'])
            ->where('status', 'published');

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $filters = ['visual_style', 'period', 'media', 'typography', 'palette'];
        foreach ($filters as $filter) {
            if ($request->has($filter) && $request->$filter) {
                $query->where($filter, $request->$filter);
            }
        }

        $galeris = $query->paginate(17)->withQueryString();

        $categories = Category::pluck('name');
        
        $visualStyles = Artwork::whereNotNull('visual_style')->distinct()->pluck('visual_style')->filter();
        $periods = Artwork::whereNotNull('period')->distinct()->pluck('period')->filter();
        $medias = Artwork::whereNotNull('media')->distinct()->pluck('media')->filter();
        $typographies = Artwork::whereNotNull('typography')->distinct()->pluck('typography')->filter();
        $palettes = Artwork::whereNotNull('palette')->distinct()->pluck('palette')->filter();

        $filterCount = count($request->except('page', 'pagination'));

        return view('public.galeri.index', compact('galeris', 'categories', 'visualStyles', 'periods', 'medias', 'typographies', 'palettes', 'filterCount'));
    }
    
   public function show(Artwork $galeri): View
    {
        $galeri->increment('views');

        $isLoggedIn = Auth::check();
        $userId = Auth::id();

        // 1. Tambahkan pengecekan Bookmark di sini
        $isBookmarked = false;
        if ($isLoggedIn) {
            $isBookmarked = Bookmark::where('user_id', $userId)
                                    ->where('bookmarkable_type', Artwork::class)
                                    ->where('bookmarkable_id', $galeri->id)
                                    ->exists();
        }

        $galeri->load([
            'creator' => function ($query) {
                $query->select('id', 'name', 'avatar');
            },
            'category:id,name',
            'community:id,name',
            'tags',
            'files',
            'likes' => function ($query) use ($isLoggedIn, $userId) {
                if ($isLoggedIn) {
                    $query->where('user_id', $userId)->select('id', 'artwork_id', 'user_id');
                } else {
                    $query->whereRaw('1 = 0');
                }
            },
            'comments' => function ($query) use ($isLoggedIn, $userId) {
                $query->whereNull('parent_id')
                    ->orderBy('created_at', 'desc')
                    ->with([
                        'user:id,name,avatar',
                        'replies.user:id,name,avatar',
                        'replies.likes' => fn ($q) => $this->filterCommentLikes($q, $isLoggedIn, $userId),
                        'likes' => fn ($q) => $this->filterCommentLikes($q, $isLoggedIn, $userId)
                    ])
                    ->withCount('likes', 'replies');
            }
        ]);

        $previous = Artwork::where('id', '<', $galeri->id)
            ->where('status', 'published')
            ->orderBy('id', 'desc')
            ->first();

        $next = Artwork::where('id', '>', $galeri->id)
            ->where('status', 'published')
            ->orderBy('id', 'asc')
            ->first();

        $recommended = Artwork::where('id', '!=', $galeri->id)
            ->when($galeri->category_id, function ($query) use ($galeri) {
                return $query->where('category_id', $galeri->category_id);
            })
            ->where('status', 'published')
            ->inRandomOrder()
            ->limit(3)
            ->select('id', 'title', 'thumbnail', 'description', 'category_id', 'created_at', 'views')
            ->with('category:id,name')
            ->get();

        // 2. Tambahkan $isBookmarked ke compact
        return view('public.galeri.show', compact('galeri', 'previous', 'next', 'recommended', 'isBookmarked'));
    }
    

    protected function filterCommentLikes($query, bool $isLoggedIn, ?int $userId)
    {
        if ($isLoggedIn) {
            return $query->where('user_id', $userId)->select('id', 'comment_id', 'user_id');
        }
        return $query->whereRaw('1 = 0');
    }

    public function comment(Request $request, Artwork $galeri): RedirectResponse
    {
        if (!Auth::check()) {
            return back()->with('error', 'Silakan login untuk mengirim komentar.');
        }

        $validated = $request->validate([
            'text' => 'required|string|max:300',
            'parent_id' => 'nullable|exists:artwork_comments,id', 
        ]);

        try {
            $galeri->comments()->create([
                'user_id' => Auth::id(),
                'text' => $validated['text'],
                'parent_id' => $validated['parent_id'] ?? null,
                'likes_count' => 0,
            ]);
            
            return back()->with('success', 'Komentar berhasil dikirim!');

        } catch (\Exception $e) {
            Log::error('Comment submission failed: ' . $e->getMessage());
            return back()->with('error', 'Gagal mengirim komentar. Silakan coba lagi.')->withInput();
        }
    }

    public function commentLike(Request $request, Artwork $galeri, ArtworkComment $comment): RedirectResponse
    {
        if (!Auth::check()) {
            return back()->with('error', 'Silakan login untuk menyukai komentar.');
        }

        $userId = Auth::id();
        
        $like = ArtworkCommentLike::where('comment_id', $comment->id)
                                 ->where('user_id', $userId)
                                 ->first();

        if ($like) {
            $like->delete();
            $comment->decrement('likes_count');
        } else {
            $comment->likes()->create(['user_id' => $userId]);
            $comment->increment('likes_count');
        }
        
        return back(); 
    }

    public function create(): View
    {
        $categories = Category::pluck('name', 'id');
        $communities = Community::pluck('name', 'id');
        return view('public.galeri.create', compact('categories', 'communities'));
    }

    public function store(Request $request): RedirectResponse
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

        $galeri = Artwork::create([
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
            $galeri->update(['thumbnail' => $path]);
        }

        if (!empty($tags)) {
            foreach ($tags as $tag) {
                if ($tag) {
                    ArtworkTag::create(['artwork_id' => $galeri->id, 'tag' => $tag]);
                }
            }
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('artwork_files', 'public');
                ArtworkFile::create([
                    'artwork_id' => $galeri->id,
                    'image_path' => $path,
                    'user_id' => Auth::id(),
                ]);
            }
        }

        return redirect()->route('galeri.index')->with('success', 'Karya berhasil disimpan sebagai draft dan menunggu tinjauan.');
    }

    public function edit(Artwork $galeri): View
    {
        if ($galeri->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::pluck('name', 'id');
        $communities = Community::pluck('name', 'id');
        return view('public.galeri.edit', compact('galeri', 'categories', 'communities'));
    }

    public function update(Request $request, Artwork $galeri): RedirectResponse
    {
        if ($galeri->user_id !== Auth::id()) {
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

        $galeri->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'palette' => $validated['palette'],
            'typography' => $validated['typography'],
            'period' => $validated['period'],
            'visual_style' => $validated['visual_style'],
            'media' => $validated['media'],
            'status' => $validated['status'] ?? $galeri->status,
            'category_id' => $validated['category_id'],
            'community_id' => $validated['community_id'],
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($galeri->thumbnail) {
                Storage::disk('public')->delete($galeri->thumbnail);
            }
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $galeri->update(['thumbnail' => $path]);
        }

        $galeri->tags()->delete();
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                if ($tag) {
                    ArtworkTag::create(['artwork_id' => $galeri->id, 'tag' => $tag]);
                }
            }
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('artwork_files', 'public');
                ArtworkFile::create([
                    'artwork_id' => $galeri->id,
                    'image_path' => $path,
                    'user_id' => Auth::id(),
                ]);
            }
        }

        return redirect()->route('galeri.show', $galeri)->with('success', 'Karya berhasil diperbarui.');
    }

    public function destroy(Artwork $galeri): RedirectResponse
    {
        if ($galeri->user_id !== Auth::id()) {
            abort(403);
        }
        if ($galeri->thumbnail) {
            Storage::disk('public')->delete($galeri->thumbnail);
        }
        foreach ($galeri->files as $file) {
            Storage::disk('public')->delete($file->image_path);
        }
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Karya berhasil dihapus.');
    }

   public function like(Artwork $galeri): RedirectResponse
    {
        if (!Auth::check()) {
            // Mengalihkan dengan pesan error jika pengguna belum login
            return back()->with('error', 'Silakan login untuk menyukai karya.');
        }
        
        if ($galeri->status !== 'published') {
            abort(403, 'Tidak dapat menyukai karya yang belum dipublikasikan atau ditolak.');
        }

        $userId = Auth::id();
        $like = ArtworkLike::where('artwork_id', $galeri->id)
            ->where('user_id', $userId)
            ->first();

        if ($like) {
            $like->delete();
            return back()->with('info', 'Anda batal menyukai karya ini.'); 
        }

        ArtworkLike::create([
            'artwork_id' => $galeri->id,
            'user_id' => $userId,
        ]);
        
        // Mengalihkan kembali setelah berhasil like
        return back()->with('success', 'Anda menyukai karya ini!');
    }
}