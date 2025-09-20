<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Event;
use App\Models\Artwork;
use App\Models\Project;
use App\Models\BlogLike;
use App\Models\Category;
use App\Models\Community;
use App\Models\ActivityLog;
use App\Models\ArtworkLike;
use App\Models\BlogComment;
use App\Models\ProjectLike;
use App\Models\EventComment;
use App\Http\Controllers\Controller;
use App\Models\CommunityPost;
use App\Models\ArtworkComment;
use App\Models\ProjectComment;
use App\Models\CommunityMember;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCommunities = Community::count();
        $totalProjects = Project::count();
        $totalArtworks = Artwork::count();
        $totalEvents = Event::count();
        $totalActiveUsers = User::where('status', 'active')->count();

        $visitorData = [
            'week' => ActivityLog::where('description', 'visitor')
                ->where('created_at', '>=', now()->subWeek())
                ->selectRaw('DAYOFWEEK(created_at) as day, COUNT(*) as count')
                ->groupBy('day')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->day => $item->count];
                })->toArray(),
            'month' => ActivityLog::where('description', 'visitor')
                ->where('created_at', '>=', now()->subMonth())
                ->selectRaw('WEEK(created_at) as week, COUNT(*) as count')
                ->groupBy('week')
                ->get()
                ->mapWithKeys(function ($item) {
                    return ['Minggu ' . ($item->week - date('W', now()->startOfMonth()->timestamp) + 1) => $item->count];
                })->toArray(),
            'year' => ActivityLog::where('description', 'visitor')
                ->where('created_at', '>=', now()->subYear())
                ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->groupBy('month')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [date('M', mktime(0, 0, 0, $item->month, 1)) => $item->count];
                })->toArray(),
        ];

        $categories = Category::withCount(['artworks', 'projects', 'blogs'])->get();
        $categoryNames = $categories->pluck('name')->toArray();
        $categoryCounts = $categories->pluck('artworks_count')->toArray();

        $interactionData = [
            'week' => [
                'likes' => [
                    ArtworkLike::where('created_at', '>=', now()->subWeek())->count(),
                    BlogLike::where('created_at', '>=', now()->subWeek())->count(),
                    ProjectLike::where('created_at', '>=', now()->subWeek())->count(),
                ],
                'comments' => [
                    ArtworkComment::where('created_at', '>=', now()->subWeek())->count(),
                    BlogComment::where('created_at', '>=', now()->subWeek())->count(),
                    ProjectComment::where('created_at', '>=', now()->subWeek())->count(),
                ],
            ],
            'month' => [
                'likes' => [
                    ArtworkLike::where('created_at', '>=', now()->subMonth())->count(),
                    BlogLike::where('created_at', '>=', now()->subMonth())->count(),
                    ProjectLike::where('created_at', '>=', now()->subMonth())->count(),
                ],
                'comments' => [
                    ArtworkComment::where('created_at', '>=', now()->subMonth())->count(),
                    BlogComment::where('created_at', '>=', now()->subMonth())->count(),
                    ProjectComment::where('created_at', '>=', now()->subMonth())->count(),
                ],
            ],
            'year' => [
                'likes' => [
                    ArtworkLike::where('created_at', '>=', now()->subYear())->count(),
                    BlogLike::where('created_at', '>=', now()->subYear())->count(),
                    ProjectLike::where('created_at', '>=', now()->subYear())->count(),
                ],
                'comments' => [
                    ArtworkComment::where('created_at', '>=', now()->subYear())->count(),
                    BlogComment::where('created_at', '>=', now()->subYear())->count(),
                    ProjectComment::where('created_at', '>=', now()->subYear())->count(),
                ],
            ],
        ];

        $eventData = [
            'month' => Event::selectRaw('category_id, COUNT(*) as count')
                ->where('created_at', '>=', now()->subMonth())
                ->groupBy('category_id')
                ->with('category')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->category->name => $item->count];
                })->toArray(),
            'quarter' => Event::selectRaw('QUARTER(start_date) as quarter, COUNT(*) as count')
                ->where('created_at', '>=', now()->subYear())
                ->groupBy('quarter')
                ->get()
                ->mapWithKeys(function ($item) {
                    return ['Q' . $item->quarter => $item->count];
                })->toArray(),
            'year' => Event::selectRaw('YEAR(start_date) as year, COUNT(*) as count')
                ->where('created_at', '>=', now()->subYears(5))
                ->groupBy('year')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->year => $item->count];
                })->toArray(),
        ];

        $growthData = [
            'month' => CommunityMember::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->where('created_at', '>=', now()->subYear())
                ->groupBy('month')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [date('M', mktime(0, 0, 0, $item->month, 1)) => $item->count];
                })->toArray(),
            'quarter' => CommunityMember::selectRaw('QUARTER(created_at) as quarter, COUNT(*) as count')
                ->where('created_at', '>=', now()->subYear())
                ->groupBy('quarter')
                ->get()
                ->mapWithKeys(function ($item) {
                    return ['Q' . $item->quarter => $item->count];
                })->toArray(),
            'year' => CommunityMember::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
                ->where('created_at', '>=', now()->subYears(5))
                ->groupBy('year')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->year => $item->count];
                })->toArray(),
        ];

        $activities = ActivityLog::with(['user', 'subject'])
            ->latest()
            ->take(8)
            ->get()
            ->map(function ($log) {
                $subject = $log->subject;
                $category = $log->subject_type ? explode('\\', $log->subject_type)[3] : 'unknown';
                $title = 'Tidak ada judul';
                $community = 'N/A';

                if ($category == 'CommunityPost') {
                    $title = $subject->title ?? 'Post tanpa judul';
                    $community = $subject->community->name ?? 'N/A';
                } elseif ($category == 'Event') {
                    $title = $subject->title ?? 'Event tanpa judul';
                } elseif ($category == 'Project') {
                    $title = $subject->project_name ?? 'Proyek tanpa nama';
                    $community = $subject->community->name ?? 'N/A';
                } elseif ($category == 'Community') {
                    $title = $subject->name ?? 'Komunitas tanpa nama';
                    $community = $subject->name ?? 'N/A';
                } elseif ($category == 'Artwork') {
                    $title = $subject->title ?? 'Karya tanpa judul';
                    $community = $subject->community->name ?? 'N/A';
                } elseif ($category == 'Settings') {
                    $title = 'Pengaturan Platform';
                }

                return [
                    'type' => strtolower($category),
                    'title' => $title,
                    'author' => $log->user ? $log->user->name : 'Admin',
                    'category' => strtolower($category),
                    'date' => $log->created_at->timestamp,
                    'description' => $log->description ?? 'Aktivitas tanpa deskripsi',
                    'likes' => method_exists(optional($subject), 'likes')
                        ? $subject->likes()->count()
                        : 0,
                    'comments' => $subject && method_exists($subject, 'comments')
                        ? optional($subject->comments())->count()
                        : 0,
                    'community' => $community,
                ];
            });

        $recentProjects = Project::with(['community', 'creator'])
            ->latest()
            ->take(6)
            ->get();

        $popularArtworks = Artwork::with(['creator', 'category'])
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(5)
            ->get();

        $newEvents = Event::with('category')
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->take(3)
            ->get();

        $recentArtworks = Artwork::with(['creator', 'category'])
            ->latest()
            ->take(6)
            ->get();

        return view('Administrator.Admin.Dashboard.index', compact(
            'totalCommunities',
            'totalProjects',
            'totalArtworks',
            'totalEvents',
            'totalActiveUsers',
            'visitorData',
            'categoryNames',
            'categoryCounts',
            'interactionData',
            'eventData',
            'growthData',
            'activities',
            'recentProjects',
            'popularArtworks',
            'newEvents',
            'recentArtworks',
            'categories'
        ));
    }
}