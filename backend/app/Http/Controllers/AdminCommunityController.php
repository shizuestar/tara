<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Community;
use App\Models\CommunityMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminCommunityController extends Controller
{
    public function index(Request $request)
    {
        $query = Community::with('user')->withCount('members');

        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('keyword') && $request->keyword) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->has('member_count') && $request->member_count) {
            $range = $request->member_count;
            if ($range === '0-50') {
                $query->having('members_count', '<=', 50);
            } elseif ($range === '51-100') {
                $query->havingBetween('members_count', [51, 100]);
            } elseif ($range === '101+') {
                $query->having('members_count', '>', 100);
            }
        }

        $communities = $query->paginate(9)->appends($request->all());

        $counts = [
            Community::withCount('members')->having('members_count', '<=', 50)->count(),
            Community::withCount('members')->havingBetween('members_count', [51, 100])->count(),
            Community::withCount('members')->having('members_count', '>', 100)->count(),
        ];

        // Fetch all users for the dropdown
        $users = User::select('id', 'name')->orderBy('name')->get();

        return view('Administrator.Admin.Komunitas.index', [
            'communities' => $communities,
            'communityCounts' => $counts,
            'users' => $users, // Pass users to the view
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => 'required|string|max:255',
                'type' => 'required|in:public,private',
                'status' => 'required|in:active,inactive',
                'user_id' => 'required|exists:users,id',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'moderator_ids' => 'nullable|string',
                'rules' => 'nullable|string',
            ]);

            if ($request->hasFile('cover_image')) {
                $validated['cover_image'] = $request->file('cover_image')->store('community_covers', 'public');
            }

            $community = Community::create($validated);

            // Tambah creator sebagai admin
            CommunityMember::create([
                'community_id' => $community->id,
                'user_id' => $validated['user_id'],
                'role' => 'admin',
            ]);

            // Tambah moderators
            if (!empty($validated['moderator_ids'])) {
                $modIds = array_filter(explode(',', $validated['moderator_ids']));
                foreach ($modIds as $modId) {
                    $modId = trim($modId);
                    if (User::where('id', $modId)->exists()) {
                        CommunityMember::create([
                            'community_id' => $community->id,
                            'user_id' => $modId,
                            'role' => 'moderator',
                        ]);
                    }
                }
            }

            return redirect()->route('admin.komunitas.index')->with('success', 'Komunitas berhasil dibuat.');
        } catch (\Exception $e) {
            Log::error('Error storing community: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan komunitas: ' . $e->getMessage()])->withInput();
        }
    }

    public function show($id)
    {
        $community = Community::with(['members.user', 'posts'])->findOrFail($id);
        return view('Administrator.Admin.Komunitas.show', compact('community'));
    }

    public function edit($id)
    {
        try {
            $community = Community::with('moderators.user')->findOrFail($id);
            return response()->json([
                'id' => $community->id,
                'name' => $community->name,
                'category' => $community->category,
                'description' => $community->description,
                'type' => $community->type,
                'status' => $community->status,
                'cover_image' => $community->cover_image,
                'user_id' => $community->user_id,
                'user' => $community->user ? ['name' => $community->user->name] : null,
                'rules' => $community->rules,
                'moderators' => $community->moderators->map(function ($member) {
                    return ['id' => $member->user_id, 'name' => $member->user->name];
                })->toArray(),
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching community: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mengambil data komunitas'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $community = Community::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => 'required|string|max:255',
                'type' => 'required|in:public,private',
                'status' => 'required|in:active,inactive',
                'user_id' => 'required|exists:users,id',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'moderator_ids' => 'nullable|string',
                'rules' => 'nullable|string',
            ]);

            if ($request->hasFile('cover_image')) {
                if ($community->cover_image) {
                    Storage::disk('public')->delete($community->cover_image);
                }
                $validated['cover_image'] = $request->file('cover_image')->store('community_covers', 'public');
            } else {
                $validated['cover_image'] = $community->cover_image;
            }

            $community->update($validated);

            // Update creator jika berubah
            $adminMember = $community->members()->where('role', 'admin')->first();
            if ($adminMember && $adminMember->user_id != $validated['user_id']) {
                $adminMember->update(['user_id' => $validated['user_id']]);
            } elseif (!$adminMember) {
                CommunityMember::create([
                    'community_id' => $community->id,
                    'user_id' => $validated['user_id'],
                    'role' => 'admin',
                ]);
            }

            // Update moderators: hapus lama, tambah baru
            $community->moderators()->delete();
            if (!empty($validated['moderator_ids'])) {
                $modIds = array_filter(explode(',', $validated['moderator_ids']));
                foreach ($modIds as $modId) {
                    $modId = trim($modId);
                    if (User::where('id', $modId)->exists()) {
                        CommunityMember::create([
                            'community_id' => $community->id,
                            'user_id' => $modId,
                            'role' => 'moderator',
                        ]);
                    }
                }
            }

            return redirect()->route('admin.komunitas.index')->with('success', 'Komunitas berhasil diupdate.');
        } catch (\Exception $e) {
            Log::error('Error updating community: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal mengupdate komunitas: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $community = Community::findOrFail($id);

            if ($community->cover_image) {
                Storage::disk('public')->delete($community->cover_image);
            }

            $community->members()->delete();
            $community->posts()->each(function ($post) {
                $post->comments()->delete();
                if ($post->file_path) {
                    Storage::disk('public')->delete($post->file_path);
                }
                $post->delete();
            });

            $community->delete();

            return redirect()->route('admin.komunitas.index')->with('success', 'Komunitas berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error deleting community: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus komunitas: ' . $e->getMessage()]);
        }
    }

    public function searchUsers(Request $request)
    {
        try {
            $query = $request->query('query');
            $communityId = $request->query('community_id');

            $usersQuery = User::where('name', 'like', '%' . $query . '%');

            if ($communityId) {
                $usersQuery->whereNotIn('id', CommunityMember::where('community_id', $communityId)->pluck('user_id'));
            }

            $users = $usersQuery->select('id', 'name')->take(10)->get();

            return response()->json($users);
        } catch (\Exception $e) {
            Log::error('Error searching users: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mencari pengguna'], 500);
        }
    }
}