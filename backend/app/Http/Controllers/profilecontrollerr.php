<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artwork;
use App\Models\Project;
use App\Models\Community;
use App\Models\CommunityPost;
use App\Models\CommunityPostComment;
use App\Models\ProjectComment;
use App\Models\Blog;
use App\Models\ProjectTask;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the user profile page.
     *
     * @param string $username
     * @return \Illuminate\View\View
     */
    public function show($username)
    {
        // Find the user by username
        $user = User::where('username', $username)->firstOrFail();

        // Fetch user-related data
        $artworks = $user->artworks()->latest()->take(3)->get();
        $projects = $user->projects()->withPivot('role', 'joined_at')->latest()->take(3)->get();
        $communities = $user->communities()->withPivot('role', 'joined_at')->latest()->take(3)->get();

        // Fetch activities (e.g., comments, posts, applications)
        $activities = collect();

        // Community post comments
        $postComments = $user->communityPostComments()->latest()->take(3)->get()->map(function ($comment) {
            return [
                'type' => 'comment',
                'description' => "Komentar: \"{$comment->content}\" pada postingan komunitas \"{$comment->communityPost->title}\"",
                'created_at' => $comment->created_at->diffForHumans(),
                'link' => route('community.posts.show', $comment->communityPost->id)
            ];
        });

        // Blog posts
        $blogs = $user->blogs()->latest()->take(3)->get()->map(function ($blog) {
            return [
                'type' => 'blog',
                'description' => "Menulis artikel \"{$blog->title}\"",
                'created_at' => $blog->created_at->diffForHumans(),
                'link' => route('blogs.show', $blog->id)
            ];
        });

        // Project tasks (applications or assignments)
        $tasks = $user->assignedTasks()->latest()->take(3)->get()->map(function ($task) {
            return [
                'type' => 'task',
                'description' => "Melamar sebagai {$task->status} pada tugas \"{$task->title}\" di proyek \"{$task->project->name}\"",
                'created_at' => $task->created_at->diffForHumans(),
                'link' => route('projects.show', $task->project->id)
            ];
        });

        // Merge and sort activities by created_at
        $activities = $postComments->merge($blogs)->merge($tasks)->sortByDesc('created_at')->take(3);

        // Badges (mock data for now, as no Badge model is provided)
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

        // Chart data for activity statistics
        $chartData = [
            'labels' => ['Forum Post', 'Materi Dibaca', 'Tugas Selesai', 'Hari Login'],
            'data' => [
                $user->communityPosts()->count(),
                $user->blogComments()->count(), // Proxy for "Materi Dibaca"
                $user->assignedTasks()->where('status', 'done')->count(),
                $user->sessions()->count()
            ]
        ];

        return view('profile', compact('user', 'artworks', 'projects', 'communities', 'activities', 'badges', 'chartData'));
    }

    /**
     * Toggle notification modal (for AJAX or frontend handling)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleNotifications()
    {
        // This would typically handle notification fetching or marking as read
        // For now, returning a placeholder response
        return response()->json(['status' => 'success', 'message' => 'Notifications toggled']);
    }

    /**
     * Mark all notifications as read
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAllNotificationsRead()
    {
        // Assuming a Notification model exists (not provided)
        Auth::user()->unreadNotifications()->update(['read_at' => now()]);
        return response()->json(['status' => 'success', 'message' => 'All notifications marked as read']);
    }
}