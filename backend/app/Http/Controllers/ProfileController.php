<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artwork;
use App\Models\Project;
use App\Models\Category;
use Illuminate\View\View;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\ArtworkComment;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany; // Digunakan untuk type-hinting pada relasi yang diambil dari model User.

class ProfileController extends Controller
{
    public function show(string $username): View
    {
        $user = User::where('username', $username)
            ->select('id', 'name', 'username', 'avatar', 'bio', 'role', 'status', 'social_links')
            ->with('members') 
            ->firstOrFail();

        return $this->loadProfileData($user);
    }

    public function edit(string $username): View|RedirectResponse
    {
        $user = User::where('username', $username)->firstOrFail();

        if (Auth::id() !== $user->id) {
            return redirect()->route('profile.show', $user->username)
                ->with('error', 'Anda tidak diizinkan untuk mengedit profil pengguna lain.');
        }

        return view('public.user.edit', compact('user'));
    }

    public function update(Request $request, string $username): RedirectResponse
    {
        $user = User::where('username', $username)->firstOrFail();

        if (Auth::id() !== $user->id) {
            return redirect()->route('profile.show', $user->username)
                ->with('error', 'Akses ditolak.');
        }
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user->id)],
            'bio' => ['nullable', 'string', 'max:1000'],
            'avatar_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
            'social_links.instagram' => ['nullable', 'url'],
            'social_links.twitter' => ['nullable', 'url'],
            'social_links.website' => ['nullable', 'url'],
        ]);

        // Logika Penyimpanan Avatar (SUDAH BENAR)
        if ($request->hasFile('avatar_file')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Ini akan menyimpan path relatif, cth: 'avatars/contoh.jpg'
            $avatarPath = $request->file('avatar_file')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->bio = $validated['bio'] ?? null;
        
        $currentSocialLinks = json_decode($user->social_links, true) ?? [];
        $newSocialLinks = $validated['social_links'] ?? [];
        
        $mergedSocialLinks = array_merge($currentSocialLinks, $newSocialLinks);
        $cleanedSocialLinks = array_filter($mergedSocialLinks, fn($value) => !empty($value));
        
        $user->social_links = count($cleanedSocialLinks) > 0 ? json_encode($cleanedSocialLinks) : null;
        $user->save();

        return redirect()->route('profile.edit', $user->username)
            ->with('success', 'Profil Anda berhasil diperbarui!');
    }
    
    public function showById(int $id): View
    {
        $user = User::select('id', 'name', 'username', 'avatar', 'bio', 'role', 'status', 'social_links')
                    ->findOrFail($id);

        return $this->loadProfileData($user);
    }

    private function loadProfileData(User $user): View
    {
        $user->roles = array_filter([
            $user->role,
            $user->status === 'top_contributor' ? 'Kontributor Terbaik' : null,
        ]);

        $badges = collect([
            [
                'id' => 'senimanLottie',
                'name' => 'Kreatif Abiezz',
                'description' => 'Mendapat 10jt Like',
                'details' => 'Diberikan karena mendapatkan 10 juta like di platform.',
                'lottie_path' => 'https://lottie.host/b7976189-d455-4d6e-b829-3942a3b356a9/LuwegGEtuF.json',
                'unlocked' => true,
                'new' => true,
            ],
            [
                'id' => 'sosialitaLottie',
                'name' => 'Sosialita',
                'description' => 'Bergabung dengan komunitas',
                'details' => 'Diberikan karena aktif bergabung dalam komunitas TARA.',
                'lottie_path' => 'https://lottie.host/88cd9099-c491-488f-933d-818ef1649d6e/dCYa8hwMxy.json',
                'unlocked' => true,
                'new' => false,
            ],
            [
                'id' => 'petarungLottie',
                'name' => 'Kolaborator Terbaik',
                'description' => 'Kolaborasi dengan 10 user',
                'details' => 'Diberikan karena kolaborasi sukses dengan 10 pengguna.',
                'lottie_path' => 'https://lottie.host/a13953a2-e070-4729-afc1-8acfc4423cb4/7NRZedmtfP.json',
                'unlocked' => true,
                'new' => false,
            ],
            [
                'id' => 'secretLottie',
                'name' => 'Lencana Rahasia',
                'description' => 'Selesaikan misi khusus',
                'details' => 'Selesaikan misi khusus untuk membuka lencana ini!',
                'lottie_path' => null,
                'unlocked' => false,
                'new' => false,
            ],
        ]);

        // Menggunakan relasi yang ada di model User
        $activityStats = [
            $user->blogs()->count(), // Mengganti communityPosts() dengan blogs()
            $user->artworkComments()->count(),
            // Mempertahankan assignedTasks() meskipun tidak ada di model User, 
            // diasumsikan akan ditambahkan di model
            $user->assignedTasks()->where('status', 'completed')->count(), 
            0,
        ];

        // Menggunakan relasi artworks() di model User
        $artworks = $user->artworks()
            ->with(['category'])
            ->latest()
            ->take(3)
            ->get();

        $categories = Category::whereIn('id', $artworks->pluck('category_id')->unique())
            ->get(['id', 'name']);

        $years = $artworks->pluck('created_at')->map->year->unique()->sortDesc();

        // Menggunakan relasi projects() dan createdProjects() di model User
        $projects = $user->projects()
            ->with(['category', 'creator'])
            ->orderBy('projects.created_at', 'desc')
            ->take(3)
            ->get()
            ->merge($user->createdProjects()->with(['category'])->latest()->take(3)->get())
            ->unique('id')
            ->take(3);

        $activities = ActivityLog::where('user_id', $user->id)
            ->latest()
            ->take(3)
            ->get()
            ->map(function ($activity) {
                $activity->subject_route = match ($activity->type) {
                    'comment' => $activity->subject instanceof ArtworkComment ? route('artwork.detail', $activity->subject->artwork_id) : null,
                    'blog' => $activity->subject instanceof \App\Models\Blog ? route('blog.detail', $activity->subject->id) : null,
                    'project_application' => $activity->subject ? route('project.dashboard', $activity->subject->id) : null,
                    default => null,
                };
                $activity->subject_action = match ($activity->type) {
                    'comment' => 'Baca Komentar',
                    'blog' => 'Baca Artikel',
                    'project_application' => 'Lihat Status',
                    default => null,
                };
                return $activity;
            });

        return view('public.user.profile', compact(
            'user',
            'badges',
            'activityStats',
            'artworks',
            'categories',
            'years',
            'projects',
            'activities'
        ));
    }
}