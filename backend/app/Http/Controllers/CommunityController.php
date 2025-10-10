<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Community;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CommunityPost;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CommunityController extends Controller
{
    public function index(Request $request): View
    {
        $query = Community::with(['creator:id,name,avatar', 'category:id,name', 'members'])
            ->active()
            ->withCount('members');

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        $communities = $query
            ->inRandomOrder() 
            ->paginate(10)
            ->withQueryString();

        $categories = Category::pluck('name');
        
        $recommendedQuery = Community::active()
            ->with(['creator:id,name,avatar', 'category:id,name', 'members'])
            ->withCount('members');

        if (Auth::check()) {
            $followedCommunityIds = Auth::user()->members()->pluck('communities.id');
            $recommendedQuery->whereNotIn('id', $followedCommunityIds);
        }

        $recommendedCommunities = $recommendedQuery
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('public.komunitas.index', compact('communities', 'categories', 'recommendedCommunities'));
    }

    public function saya(Request $request): View
    {
        $query = Community::whereHas('members', function ($q) {
            $q->where('user_id', Auth::id());
        })
            ->with(['creator:id,name,avatar', 'category:id,name'])
            ->withCount('members')
            ->orderBy('name'); 

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $communities = $query->paginate(10)->withQueryString();
        $categories = Category::pluck('name');
        
        $recommendedCommunities = Community::active()
            ->with(['creator:id,name,avatar', 'category:id,name'])
            ->withCount('members')
            ->inRandomOrder()
            ->take(3)
            ->get();

        $isMyCommunitiesPage = true; 

        return view('public.komunitas.index', compact('communities', 'categories', 'recommendedCommunities', 'isMyCommunitiesPage'));
    }

    public function populer(Request $request): View
    {
        $query = Community::with(['creator:id,name,avatar', 'category:id,name'])
            ->active()
            ->withCount('members')
            ->orderBy('members_count', 'desc');

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $communities = $query->paginate(10)->withQueryString();
        $categories = Category::pluck('name');
        
        $recommendedCommunities = Community::active()
            ->with(['creator:id,name,avatar', 'category:id,name'])
            ->withCount('members')
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('public.komunitas.index', compact('communities', 'categories', 'recommendedCommunities'));
    }

    public function create(): View
    {
        $categories = Category::all(); 
        return view('public.komunitas.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:communities,name',
                'category_id' => 'required|exists:categories,id',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'description' => 'required|string|min:1',
                'rules' => 'nullable|string',
                'type' => 'required|in:public,private',
            ]);

            $community = Community::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'category_id' => $validated['category_id'],
                'creator_id' => Auth::id(),
                'status' => 'pending',
                'type' => $validated['type'],
                'rules' => $validated['rules'] ?? null,
            ]);

            if ($request->hasFile('cover_image')) {
                $path = $request->file('cover_image')->store('community_covers', 'public');
                $community->update(['cover_image' => $path]);
            }

            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('community_avatars', 'public');
                $community->update(['avatar' => $path]);
            }

            $community->members()->attach(Auth::id(), ['role' => 'admin', 'joined_at' => now()]);

            Session::forget('error');

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Komunitas berhasil dibuat dan sedang menunggu tinjauan admin.'], 201);
            }
            return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil dibuat dan sedang menunggu tinjauan admin.');
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Validasi gagal.', 'errors' => $e->errors()], 422);
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error storing community: ' . $e->getMessage());
            $errorMessage = 'Gagal menyimpan komunitas: ' . $e->getMessage();
            if ($request->expectsJson()) {
                return response()->json(['message' => $errorMessage], 500);
            }
            return redirect()->back()->withErrors(['error' => $errorMessage])->withInput();
        }
    }

  public function show(Community $community, Request $request): View
    {
        // Authorization: Only active communities or those owned by the creator can be viewed
        if ($community->status !== 'active' && (!Auth::check() || Auth::id() !== $community->creator_id)) {
            abort(403, 'Komunitas ini belum dipublikasikan atau Anda tidak memiliki akses.');
        }

        // Check if view should be incremented
        $shouldIncrementView = $this->shouldIncrementView($community->id, 'community', $request);

        if ($shouldIncrementView) {
            $community->increment('views');
            // Store in session to prevent incrementing again in this session
            Session::put("viewed_community_{$community->id}", true);
        }

        $roles = $this->getCommunityRoles($community, Auth::user());
        extract($roles); // Extract $isMember, $isModerator, $isAdmin

        $community->load([
            'creator' => fn ($query) => $query->select('id', 'name', 'avatar'),
            'category:id,name',
            'recentProjects',
            'recentArtworks',
            'moderators' => fn ($query) => $query->limit(5)
        ]);

        $recentActivities = $community->recentActivities()->paginate(5);
        
        $sort = $request->get('sort', 'baru');

        $postsQuery = $community->posts()->with('user:id,name', 'comments');

        switch ($sort) {
            case 'views':
                $postsQuery->orderBy('views', 'desc')->latest();
                break;
            case 'baru':
            default:
                $postsQuery->latest();
                break;
        }

        $posts = $postsQuery->paginate(10)->appends(['sort' => $sort]);

        return view('public.komunitas.show', compact(
            'community', 
            'recentActivities',
            'posts',
            'isMember', 
            'isModerator', 
            'isAdmin', 
            'sort'
        ));
    }
    private function getCommunityRoles(Community $community, ?User $user): array
    {
        $roles = [
            'isMember' => false,
            'isModerator' => false,
            'isAdmin' => false,
        ];

        if (!$user) {
            return $roles;
        }

        $authUserId = $user->id;

        // 1. Pengguna adalah pembuat (Creator/Admin Utama)
        if ($authUserId === $community->creator_id) {
            $roles['isMember'] = true;
            $roles['isModerator'] = true;
            $roles['isAdmin'] = true;
            return $roles;
        }

        // 2. Cek keanggotaan dan peran melalui pivot table
        $member = $community->members()->where('user_id', $authUserId)->first();
        if ($member) {
            $roles['isMember'] = true;
            // Akses 'role' dari pivot table dan pastikan diubah ke lowercase untuk konsistensi
            $role = strtolower($member->pivot->role); 
            
            if ($role === 'moderator' || $role === 'admin') {
                $roles['isModerator'] = true;
            }
            if ($role === 'admin') {
                $roles['isAdmin'] = true;
            }
        }

        return $roles;
    }

    public function edit(Community $community): View
    {
        if ($community->creator_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::pluck('name', 'id');
        return view('public.komunitas.edit', compact('community', 'categories'));
    }

    public function update(Request $request, Community $community)
    {
        try {
            if ($community->creator_id !== Auth::id()) {
                throw new \Exception('Anda tidak memiliki izin untuk memperbarui komunitas ini.', 403);
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:communities,name,' . $community->id,
                'category_id' => 'required|exists:categories,id',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'description' => 'required|string|min:1',
                'rules' => 'nullable|string',
                'type' => 'required|in:public,private',
                'status' => 'nullable|in:pending,active,suspended',
            ]);

            $community->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'category_id' => $validated['category_id'],
                'type' => $validated['type'],
                'rules' => $validated['rules'] ?? null,
                'status' => $validated['status'] ?? $community->status,
            ]);

            if ($request->hasFile('cover_image')) {
                if ($community->cover_image) {
                    Storage::disk('public')->delete($community->cover_image);
                }
                $path = $request->file('cover_image')->store('community_covers', 'public');
                $community->update(['cover_image' => $path]);
            }

            if ($request->hasFile('avatar')) {
                if ($community->avatar) {
                    Storage::disk('public')->delete($community->avatar);
                }
                $path = $request->file('avatar')->store('community_avatars', 'public');
                $community->update(['avatar' => $path]);
            }

            Session::forget('error');

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Komunitas berhasil diperbarui.'], 200);
            }
            return redirect()->route('komunitas.show', $community)->with('success', 'Komunitas berhasil diperbarui.');
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Validasi gagal.', 'errors' => $e->errors()], 422);
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating community: ' . $e->getMessage());
            $errorMessage = $e->getCode() === 403 ? $e->getMessage() : 'Gagal mengupdate komunitas: ' . $e->getMessage();
            if ($request->expectsJson()) {
                return response()->json(['message' => $errorMessage], $e->getCode() === 403 ? 403 : 500);
            }
            return redirect()->back()->withErrors(['error' => $errorMessage])->withInput();
        }
    }

    public function destroy(Community $community)
    {
        try {
            if ($community->creator_id !== Auth::id()) {
                throw new \Exception('Anda tidak memiliki izin untuk menghapus komunitas ini.', 403);
            }

            if ($community->cover_image) {
                Storage::disk('public')->delete($community->cover_image);
            }
            if ($community->avatar) {
                Storage::disk('public')->delete($community->avatar);
            }

            $community->members()->detach();
            $community->posts()->each(function ($post) {
                $post->comments()->delete();
                if ($post->file_path) {
                    Storage::disk('public')->delete($post->file_path);
                }
                $post->delete();
            });

            $community->delete();

            Session::forget('error');

            if (request()->expectsJson()) {
                return response()->json(['message' => 'Komunitas berhasil dihapus.'], 200);
            }
            return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error deleting community: ' . $e->getMessage());
            $errorMessage = $e->getCode() === 403 ? $e->getMessage() : 'Gagal menghapus komunitas: ' . $e->getMessage();
            if (request()->expectsJson()) {
                return response()->json(['message' => $errorMessage], $e->getCode() === 403 ? 403 : 500);
            }
            return redirect()->back()->withErrors(['error' => $errorMessage]);
        }
    }

    public function join(Request $request, Community $community)
    {
        try {
            if ($community->members()->where('user_id', Auth::id())->exists()) {
                $community->members()->detach(Auth::id());
                $message = 'Anda telah keluar dari komunitas.';
            } else {
                $community->members()->attach(Auth::id(), ['role' => 'member', 'joined_at' => now()]);
                $message = 'Anda telah bergabung dengan komunitas.';
            }

            Session::forget('error');

            if ($request->expectsJson()) {
                return response()->json(['message' => $message], 200);
            }
            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Error joining/leaving community: ' . $e->getMessage());
            $errorMessage = 'Gagal memproses permintaan bergabung/keluar: ' . $e->getMessage();
            if ($request->expectsJson()) {
                return response()->json(['message' => $errorMessage], 500);
            }
            return redirect()->back()->withErrors(['error' => $errorMessage]);
        }
    }

    public function createPostForm(Community $community)
    {
        if (!auth()->check() || !$community->isMember(auth()->user())) {
            if (request()->expectsJson()) {
                return response()->json(['message' => 'Anda harus menjadi anggota untuk membuat postingan.'], 403);
            }
            return redirect()->route('komunitas.show', $community)
                ->with('error', 'Anda harus menjadi anggota untuk membuat postingan.');
        }

        return view('public.komunitas.createPost', compact('community'));
    }

    public function storePost(Request $request, Community $community)
    {
        try {
            if (!auth()->check() || !$community->isMember(auth()->user())) {
                throw new \Exception('Anda harus menjadi anggota untuk membuat postingan.', 403);
            }

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            $post = $community->posts()->create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'user_id' => Auth::id(),
            ]);

            Session::forget('error');

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Diskusi berhasil dibuat.'], 201);
            }
            return redirect()->route('komunitas.show', $community)->with('success', 'Diskusi berhasil dibuat.');
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Validasi gagal.', 'errors' => $e->errors()], 422);
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error storing post: ' . $e->getMessage());
            $errorMessage = $e->getCode() === 403 ? $e->getMessage() : 'Gagal membuat diskusi: ' . $e->getMessage();
            if ($request->expectsJson()) {
                return response()->json(['message' => $errorMessage], $e->getCode() === 403 ? 403 : 500);
            }
            return redirect()->back()->withErrors(['error' => $errorMessage])->withInput();
        }
    }

    public function showPost(Community $community, CommunityPost $post, Request $request): View
    {
        if ($post->community_id !== $community->id) {
            abort(404);
        }

        if ($community->status !== 'active' && (!Auth::check() || Auth::id() !== $community->creator_id)) {
            abort(403, 'Anda tidak memiliki akses untuk melihat komunitas ini.');
        }

        // Check if view should be incremented
        $shouldIncrementView = $this->shouldIncrementView($post->id, 'post', $request);

        if ($shouldIncrementView) {
            $post->increment('views');
            // Store in session to prevent incrementing again in this session
            Session::put("viewed_post_{$post->id}", true);
        }

        $isMember = false;
        $isModerator = false;
        $isAdmin = false;
        $authUserId = Auth::id();

        if (Auth::check()) {
            $member = $community->members()->where('user_id', $authUserId)->first();
            if ($member) {
                $isMember = true;
                $role = strtolower($member->pivot->role);
                if ($role === 'moderator' || $role === 'admin') {
                    $isModerator = true;
                }
                if ($role === 'admin') {
                    $isAdmin = true;
                }
            }
            if ($authUserId === $community->creator_id) {
                $isMember = true;
                $isModerator = true;
                $isAdmin = true;
            }
        }

        $post->load([
            'user:id,name,avatar',
            'community:id,name',
            'comments.user:id,name,avatar'
        ]);

        $comments = $post->comments()->with('user:id,name')->latest()->paginate(10);
        $relatedPosts = CommunityPost::where('community_id', $community->id)
                                    ->where('id', '!=', $post->id)
                                    ->latest()
                                    ->take(5)
                                    ->get();

        return view('public.komunitas.showPost', compact(
            'community', 
            'post', 
            'comments', 
            'relatedPosts',
            'isMember',
            'isModerator',
            'isAdmin'
        ));
    }

    private function shouldIncrementView($id, $type, Request $request): bool
    {
        if (Session::has("viewed_{$type}_{$id}")) {
            return false;
        }

        $hasViewed = $request->input('has_viewed', false);

        return !$hasViewed;
    }

    public function editPostForm(Community $community, CommunityPost $post): View
    {
        if ($post->community_id !== $community->id) {
            abort(404);
        }

        $isModerator = $community->isModerator(Auth::user());
        $isAdmin = $community->isAdmin(Auth::user());

        if (Auth::id() !== $post->user_id && !$isModerator && !$isAdmin) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit postingan ini.');
        }

        return view('public.komunitas.editPost', compact('community', 'post'));
    }

    public function updatePost(Request $request, Community $community, CommunityPost $post)
    {
        try {
            if ($post->community_id !== $community->id) {
                throw new \Exception('Postingan tidak ditemukan dalam komunitas ini.', 404);
            }

            $isModerator = $community->isModerator(Auth::user());
            $isAdmin = $community->isAdmin(Auth::user());

            if (Auth::id() !== $post->user_id && !$isModerator && !$isAdmin) {
                throw new \Exception('Anda tidak memiliki izin untuk memperbarui postingan ini.', 403);
            }

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            $post->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
            ]);

            Session::forget('error');

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Diskusi berhasil diperbarui.'], 200);
            }
            return redirect()->route('posts.show', [$community, $post])->with('success', 'Diskusi berhasil diperbarui.');
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Validasi gagal.', 'errors' => $e->errors()], 422);
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating post: ' . $e->getMessage());
            $errorMessage = $e->getCode() === 403 || $e->getCode() === 404 ? $e->getMessage() : 'Gagal memperbarui diskusi: ' . $e->getMessage();
            if ($request->expectsJson()) {
                return response()->json(['message' => $errorMessage], $e->getCode() === 403 ? 403 : ($e->getCode() === 404 ? 404 : 500));
            }
            return redirect()->back()->withErrors(['error' => $errorMessage])->withInput();
        }
    }

    public function destroyPost(Community $community, CommunityPost $post)
    {
        try {
            if ($post->community_id !== $community->id) {
                throw new \Exception('Postingan tidak ditemukan dalam komunitas ini.', 404);
            }

            $isModerator = $community->isModerator(Auth::user());
            $isAdmin = $community->isAdmin(Auth::user());

            if (Auth::id() !== $post->user_id && !$isModerator && !$isAdmin) {
                throw new \Exception('Anda tidak memiliki izin untuk menghapus postingan ini.', 403);
            }

            $post->delete();

            Session::forget('error');

            if (request()->expectsJson()) {
                return response()->json(['message' => 'Diskusi berhasil dihapus.'], 200);
            }
            return redirect()->route('komunitas.show', $community)->with('success', 'Diskusi berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            $errorMessage = $e->getCode() === 403 || $e->getCode() === 404 ? $e->getMessage() : 'Gagal menghapus diskusi: ' . $e->getMessage();
            if (request()->expectsJson()) {
                return response()->json(['message' => $errorMessage], $e->getCode() === 403 ? 403 : ($e->getCode() === 404 ? 404 : 500));
            }
            return redirect()->back()->withErrors(['error' => $errorMessage]);
        }
    }
}