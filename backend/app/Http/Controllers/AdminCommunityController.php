<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Community;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\CommunityMember;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminCommunityController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $users = User::all();

        $communities = Community::query()
            ->select('communities.*')
            ->withCount('members')
            ->when($request->type, fn($q) => $q->where('type', $request->type))
            ->when($request->member_count, function ($q) use ($request) {
                if ($request->member_count === '0-50') {
                    $q->having('members_count', '<=', 50);
                } elseif ($request->member_count === '51-100') {
                    $q->having('members_count', '>=', 51)->having('members_count', '<=', 100);
                } elseif ($request->member_count === '101+') {
                    $q->having('members_count', '>', 100);
                }
            })
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->keyword, fn($q) => $q->where('name', 'like', "%{$request->keyword}%")
                ->orWhere('description', 'like', "%{$request->keyword}%"))
            ->paginate(9);

        $communityCounts = [
            Community::withCount('members')->having('members_count', '<=', 50)->count(),
            Community::withCount('members')->having('members_count', '>=', 51)->having('members_count', '<=', 100)->count(),
            Community::withCount('members')->having('members_count', '>', 100)->count(),
        ];

        $activities = ActivityLog::where('type', 'community')->latest()->take(10)->get();

        return view('Administrator.admin.komunitas.index', compact('categories', 'users', 'communities', 'communityCounts', 'activities'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'type' => 'required|in:public,private',
                'status' => 'required|in:active,inactive',
                'creator_id' => 'required|exists:users,id',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'moderator_ids' => 'nullable|string',
                'rules' => 'nullable|string',
            ]);

            if ($request->hasFile('cover_image')) {
                $validated['cover_image'] = $request->file('cover_image')->store('community_cover_images', 'public');
            }
            if ($request->hasFile('avatar')) {
                $validated['avatar'] = $request->file('avatar')->store('community_avatars', 'public');
            }

            $community = Community::create($validated);

            CommunityMember::create([
                'community_id' => $community->id,
                'user_id' => $validated['creator_id'],
                'role' => 'admin',
            ]);

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

            ActivityLog::create([
                'user_id' => Auth::id(),
                'type' => 'community',
                'description' => 'Komunitas baru "' . $community->name . '" telah ditambahkan',
            ]);

            return redirect()->route('admin.communities.index')->with('success', 'Komunitas berhasil dibuat.');
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error storing community: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan komunitas: ' . $e->getMessage()])->withInput();
        }
    }

    public function show($id)
    {
        try {
            $community = Community::with(['admins', 'members', 'posts', 'category', 'creator'])->findOrFail($id);
            $users = User::all();
            $categories = Category::all();
            return view('administrator.admin.communities.show', compact('community', 'users', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error fetching community for show: ' . $e->getMessage());
            return redirect()->route('admin.communities.index')->withErrors(['error' => 'Gagal memuat data komunitas: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $community = Community::with('category', 'creator', 'moderators')->find($id);
            
            if (!$community) {
                return response()->json(['error' => 'Komunitas dengan ID ' . $id . ' tidak ditemukan.'], 404);
            }

            return response()->json([
                'id' => $community->id,
                'name' => $community->name,
                'description' => $community->description,
                'type' => $community->type,
                'status' => $community->status,
                'category_id' => $community->category_id,
                'creator_id' => $community->creator_id,
                'cover_image' => $community->cover_image ? asset('storage/' . $community->cover_image) : null,
                'avatar' => $community->avatar ? asset('storage/' . $community->avatar) : null,
                'moderator_ids' => $community->moderators->pluck('id')->toArray(),
                'rules' => $community->rules ? explode("\n", $community->rules) : [],
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching community data: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan server saat memuat data komunitas. Silakan coba lagi nanti.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $community = Community::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'type' => 'required|in:public,private',
                'status' => 'required|in:active,inactive',
                'creator_id' => 'required|exists:users,id',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'moderator_ids' => 'nullable|string',
                'rules' => 'nullable|string',
            ]);

            if ($request->hasFile('cover_image')) {
                if ($community->cover_image) {
                    Storage::disk('public')->delete($community->cover_image);
                }
                $validated['cover_image'] = $request->file('cover_image')->store('community_cover_images', 'public');
            } else {
                $validated['cover_image'] = $community->cover_image;
            }
            if ($request->hasFile('avatar')) {
                if ($community->avatar) {
                    Storage::disk('public')->delete($community->avatar);
                }
                $validated['avatar'] = $request->file('avatar')->store('community_avatars', 'public');
            } else {
                $validated['avatar'] = $community->avatar;
            }

            $community->update($validated);

            $adminMember = $community->members()
                ->where('community_members.role', 'admin')
                ->first();

            if ($adminMember && $adminMember->pivot->user_id != $validated['creator_id']) {
                $adminMember->pivot->delete();
                CommunityMember::create([
                    'community_id' => $community->id,
                    'user_id' => $validated['creator_id'],
                    'role' => 'admin',
                    'joined_at' => now(),
                ]);
            } elseif (!$adminMember) {
                CommunityMember::create([
                    'community_id' => $community->id,
                    'user_id' => $validated['creator_id'],
                    'role' => 'admin',
                    'joined_at' => now(),
                ]);
            }

            $community->moderators()->detach();
            if (!empty($validated['moderator_ids'])) {
                $modIds = array_filter(explode(',', $validated['moderator_ids']));
                foreach ($modIds as $modId) {
                    $modId = trim($modId);
                    if (User::where('id', $modId)->exists() && $modId != $validated['creator_id']) {
                        CommunityMember::create([
                            'community_id' => $community->id,
                            'user_id' => $modId,
                            'role' => 'moderator',
                            'joined_at' => now(),
                        ]);
                    }
                }
            }

            ActivityLog::create([
                'user_id' => Auth::id(),
                'type' => 'community',
                'description' => 'Komunitas "' . $community->name . '" berhasil diperbarui',
            ]);

            return redirect()->route('admin.communities.index')->with('success', 'Komunitas berhasil diupdate.');
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating community: ' . $e->getMessage());
            $errorMessage = 'Gagal mengupdate komunitas: ';
            if (str_contains($e->getMessage(), 'SQLSTATE[23000]')) {
                $errorMessage .= 'Terjadi masalah dengan data anggota komunitas. Pastikan pembuat dan moderator valid.';
            } else {
                $errorMessage .= 'Silakan coba lagi atau hubungi administrator.';
            }
            return redirect()->back()->withErrors(['error' => $errorMessage])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $community = Community::findOrFail($id);
            $communityName = $community->name;

            if ($community->cover_image) {
                Storage::disk('public')->delete($community->cover_image);
            }
            if ($community->avatar) {
                Storage::disk('public')->delete($community->avatar);
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

            ActivityLog::create([
                'user_id' => Auth::id(),
                'type' => 'community',
                'description' => 'Komunitas "' . $communityName . '" berhasil dihapus',
            ]);

            return redirect()->route('admin.communities.index')->with('success', 'Komunitas berhasil dihapus.');
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