<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artwork;
use App\Models\Project;
use App\Models\Community;
use App\Models\CommunityPost;
use App\Models\CommunityPostComment;
use App\Models\Blog;
use App\Models\ProjectTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the authenticated user's profile page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return view('all.profile.index', [
                'user' => null,
                'artworks' => [],
                'projects' => [],
                'communities' => [],
                'activities' => collect(),
                'badges' => [],
                'chartData' => [
                    'labels' => ['Forum Post', 'Materi Dibaca', 'Tugas Selesai', 'Hari Login'],
                    'data' => [0, 0, 0, 0]
                ]
            ]);
        }

        // Fetch user-related data
        $artworks = $user->artworks()->latest()->take(3)->get();
        $projects = $user->projects()->withPivot('role', 'joined_at')->latest()->take(3)->get();
        $communities = $user->communities()->withPivot('role', 'joined_at')->latest()->take(3)->get();

        // Build activity feed
        $activities = collect();
        $postComments = $user->communityPostComments()->latest()->take(3)->get()->map(function ($comment) {
            return [
                'type' => 'comment',
                'description' => "Komentar: \"{$comment->content}\" pada postingan komunitas \"{$comment->communityPost->title}\"",
                'created_at' => $comment->created_at->diffForHumans(),
                'link' => route('community.posts.show', $comment->communityPost->id)
            ];
        });

        $blogs = $user->blogs()->latest()->take(3)->get()->map(function ($blog) {
            return [
                'type' => 'blog',
                'description' => "Menulis artikel \"{$blog->title}\"",
                'created_at' => $blog->created_at->diffForHumans(),
                'link' => route('blogs.show', $blog->id)
            ];
        });

        $tasks = $user->assignedTasks()->latest()->take(3)->get()->map(function ($task) {
            return [
                'type' => 'task',
                'description' => "Melamar sebagai {$task->status} pada tugas \"{$task->title}\" di proyek \"{$task->project->name}\"",
                'created_at' => $task->created_at->diffForHumans(),
                'link' => route('projects.show', $task->project->id)
            ];
        });

        $activities = $postComments->merge($blogs)->merge($tasks)->sortByDesc('created_at')->take(3);

        // Static badges (could be dynamic from a model in the future)
        $badges = [
            [
                'name' => 'Kreatif Abiezz',
                'description' => 'Diberikan karena mendapatkan 10 juta like di platform.',
                'lottie' => 'https://lottie.host/b7976189-d455-4d6e-b829-3942a3b356a9/LuwegGEtuF.json',
                'is_new' => true,
                'locked' => false
            ],
            [
                'name' => 'Sosialita',
                'description' => 'Diberikan karena aktif bergabung dalam komunitas TARA.',
                'lottie' => 'https://lottie.host/88cd9099-c491-488f-933d-818ef1649d6e/dCYa8hwMxy.json',
                'is_new' => false,
                'locked' => false
            ],
            [
                'name' => 'Kolaborator Terbaik',
                'description' => 'Diberikan karena kolaborasi sukses dengan 10 pengguna.',
                'lottie' => 'https://lottie.host/a13953a2-e070-4729-afc1-8acfc4423cb4/7NRZedmtfP.json',
                'is_new' => false,
                'locked' => false
            ],
            [
                'name' => 'Lencana Rahasia',
                'description' => 'Selesaikan misi khusus untuk membuka lencana ini!',
                'lottie' => null,
                'is_new' => false,
                'locked' => true
            ]
        ];

        // Chart data for user activity
        $chartData = [
            'labels' => ['Forum Post', 'Materi Dibaca', 'Tugas Selesai', 'Hari Login'],
            'data' => [
                $user->communityPosts()->count(),
                $user->blogComments()->count(),
                $user->assignedTasks()->where('status', 'done')->count(),
                $user->sessions()->count()
            ]
        ];

        return view('all.profile.index', compact('user', 'artworks', 'projects', 'communities', 'activities', 'badges', 'chartData'));
    }

    /**
     * Show the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        if (!$user) {
            return view('all.profile.edit', ['user' => null]);
        }
        return view('all.profile.edit', compact('user'));
    }

    /**
     * Update the authenticated user's profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Harus login untuk mengedit profil.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'bio' => 'nullable|string|max:1000',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'username', 'bio']);

        if ($request->hasFile('profilePicture')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Store new avatar
            $path = $request->file('profilePicture')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        // Format bio for LinkedIn/Twitter links
        $bio = $request->input('bio');
        if ($bio) {
            $parts = explode('|', trim($bio));
            $formattedBio = trim(array_shift($parts));
            foreach ($parts as $part) {
                $part = trim($part);
                if (strpos($part, 'LinkedIn:') === 0) {
                    $formattedBio .= ' | LinkedIn: ' . trim(str_replace('LinkedIn:', '', $part));
                } elseif (strpos($part, 'Twitter:') === 0) {
                    $formattedBio .= ' | Twitter: ' . trim(str_replace('Twitter:', '', $part));
                }
            }
            $data['bio'] = $formattedBio ?: $bio;
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Toggle notification modal (AJAX response).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleNotifications()
    {
        return response()->json(['status' => 'success', 'message' => 'Notifications toggled']);
    }
}