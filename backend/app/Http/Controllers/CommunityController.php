<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CommunityController extends Controller
{
    public function index(Request $request): View
    {
        $query = Community::with(['user:id,name,avatar', 'category:id,name'])
            ->where('status', 'published');

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $communities = $query->paginate(10)->withQueryString();
        $categories = Category::pluck('name');
        return view('public.komunitas.index', compact('communities', 'categories'));
    }

    public function saya(Request $request): View
    {
        $query = Community::with(['user:id,name,avatar', 'category:id,name'])
            ->where('user_id', Auth::id());

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $communities = $query->paginate(10)->withQueryString();
        $categories = Category::pluck('name');
        return view('public.komunitas.index', compact('communities', 'categories'));
    }

    public function populer(Request $request): View
    {
        $query = Community::with(['user:id,name,avatar', 'category:id,name'])
            ->where('status', 'published')
            ->orderBy('members', 'desc');

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $communities = $query->paginate(10)->withQueryString();
        $categories = Category::pluck('name');
        return view('public.komunitas.index', compact('communities', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::pluck('name', 'id');
        return view('public.komunitas.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'description' => 'required|string|min:1',
        ]);

        $community = Community::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(),
            'status' => 'draft',
            'members' => 1, // Creator is the first member
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('community_covers', 'public');
            $community->update(['cover_image' => $path]);
        }

        return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil disimpan sebagai draft dan menunggu tinjauan.');
    }

    public function show(Community $community): View
    {
        if ($community->status !== 'published' && (!Auth::check() || Auth::id() !== $community->user_id)) {
            abort(403, 'Komunitas ini belum dipublikasikan atau Anda tidak memiliki akses.');
        }

        $community->increment('views');

        $community->load([
            'user' => function ($query) {
                $query->select('id', 'name', 'avatar');
            },
            'category:id,name',
        ]);

        return view('public.komunitas.show', compact('community'));
    }

    public function edit(Community $community): View
    {
        if ($community->user_id !== Auth::id()) {
            abort(403);
        }
        $categories = Category::pluck('name', 'id');
        return view('public.komunitas.edit', compact('community', 'categories'));
    }

    public function update(Request $request, Community $community): RedirectResponse
    {
        if ($community->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'description' => 'required|string|min:1',
            'status' => 'nullable|in:draft,published,rejected',
        ]);

        $community->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'status' => $validated['status'] ?? $community->status,
        ]);

        if ($request->hasFile('cover_image')) {
            if ($community->cover_image) {
                Storage::disk('public')->delete($community->cover_image);
            }
            $path = $request->file('cover_image')->store('community_covers', 'public');
            $community->update(['cover_image' => $path]);
        }

        return redirect()->route('komunitas.show', $community)->with('success', 'Komunitas berhasil diperbarui.');
    }

    public function destroy(Community $community): RedirectResponse
    {
        if ($community->user_id !== Auth::id()) {
            abort(403);
        }
        if ($community->cover_image) {
            Storage::disk('public')->delete($community->cover_image);
        }
        $community->delete();
        return redirect()->route('komunitas.index')->with('success', 'Komunitas berhasil dihapus.');
    }
}