<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Community;
use App\Models\Event;
use App\Models\Project;
use App\Models\User;
use App\Models\VisitorLog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CuratorDashboardController extends Controller
{
    public function index()
    {
        $totalCommunities = Cache::remember('total_communities', now()->addMinutes(60), fn () => Community::active()->count());
        $totalBlogs = Cache::remember('total_blogs', now()->addMinutes(60), fn () => Blog::where('status', 'published')->count());
        $totalEvents = Cache::remember('total_events', now()->addMinutes(60), fn () => Event::where('status', 'active')->count());
        $totalCategories = Cache::remember('total_categories', now()->addMinutes(60), fn () => Category::count());
        $totalArtworks = Cache::remember('total_artworks', now()->addMinutes(60), fn () => Artwork::where('status', 'active')->count());
        $totalProjects = Cache::remember('total_projects', now()->addMinutes(60), fn () => Project::where('status', 'ongoing')->count());
        $totalActiveUsers = Cache::remember('total_active_users', now()->addMinutes(60), fn () => User::where('status', 'active')->count());

        $visitorData = [
            'week' => [],
            'month' => [],
            'year' => []
        ];

        $weekData = VisitorLog::where('visit_date', '>=', now()->subDays(7))
            ->groupBy('visit_date')
            ->selectRaw('DATE(visit_date) as date, SUM(visit_count) as total')
            ->get()
            ->pluck('total', 'date')
            ->toArray();
        
        $visitorData['week'] = array_fill(0, 7, 0);
        for ($i = 0; $i < 7; $i++) {
            $date = now()->subDays($i)->format('Y-m-d');
            $visitorData['week'][6 - $i] = $weekData[$date] ?? 0;
        }

        $monthData = VisitorLog::where('visit_date', '>=', now()->subDays(28))
            ->groupBy(DB::raw('WEEK(visit_date)'))
            ->selectRaw('WEEK(visit_date) as week, SUM(visit_count) as total')
            ->get()
            ->pluck('total', 'week')
            ->toArray();
        
        $visitorData['month'] = array_fill(0, 4, 0);
        for ($i = 0; $i < 4; $i++) {
            $week = now()->subWeeks($i)->weekOfYear;
            $visitorData['month'][3 - $i] = $monthData[$week] ?? 0;
        }

        $yearData = VisitorLog::where('visit_date', '>=', now()->subYear())
            ->groupBy(DB::raw('MONTH(visit_date)'))
            ->selectRaw('MONTH(visit_date) as month, SUM(visit_count) as total')
            ->get()
            ->pluck('total', 'month')
            ->toArray();
        
        $visitorData['year'] = array_fill(1, 12, 0);
        foreach ($yearData as $month => $total) {
            $visitorData['year'][$month] = $total;
        }

        $today = Carbon::today();
        $todayTraffic = VisitorLog::where('visit_date', $today->toDateString())->sum('visit_count');
        $yesterday = $today->copy()->subDay();
        $yesterdayTraffic = VisitorLog::where('visit_date', $yesterday->toDateString())->sum('visit_count');
        $growthPercentage = $yesterdayTraffic > 0 ? round((($todayTraffic - $yesterdayTraffic) / $yesterdayTraffic) * 100, 2) : ($todayTraffic > 0 ? 100 : 0);

        $growthData = [
            'month' => Cache::remember('growth_data_month', now()->addMinutes(60), fn () => Community::where('status', 'active')
                ->where('created_at', '>=', now()->subMonth())
                ->groupBy('category_id')
                ->select('category_id', DB::raw('count(*) as total'))
                ->with('category')
                ->get()
                ->mapWithKeys(fn ($item) => [$item->category->name => $item->total])
                ->toArray()),
            'quarter' => Cache::remember('growth_data_quarter', now()->addMinutes(60), fn () => Community::where('status', 'active')
                ->where('created_at', '>=', now()->subMonths(3))
                ->groupBy('category_id')
                ->select('category_id', DB::raw('count(*) as total'))
                ->with('category')
                ->get()
                ->mapWithKeys(fn ($item) => [$item->category->name => $item->total])
                ->toArray()),
            'year' => Cache::remember('growth_data_year', now()->addMinutes(60), fn () => Community::where('status', 'active')
                ->where('created_at', '>=', now()->subYear())
                ->groupBy('category_id')
                ->select('category_id', DB::raw('count(*) as total'))
                ->with('category')
                ->get()
                ->mapWithKeys(fn ($item) => [$item->category->name => $item->total])
                ->toArray()),
        ];

        $categoryData = Cache::remember('category_data', now()->addMinutes(60), fn () => Category::withCount(['artworks' => fn ($query) => $query->where('status', 'active')])->get());
        $categoryNames = $categoryData->pluck('name')->toArray();
        $categoryCounts = $categoryData->pluck('artworks_count')->toArray();

        $interactionData = [
            'week' => [
                'likes' => [
                    Artwork::where('status', 'active')->withCount('likes')->latest()->take(7)->get()->sum('likes_count'),
                    Blog::where('status', 'published')->withCount('likes')->latest()->take(7)->get()->sum('likes_count'),
                    Event::where('status', 'active')->withCount('registrations')->latest()->take(7)->get()->sum('registrations_count'),
                ],
                'comments' => [
                    Artwork::where('status', 'active')->withCount('comments')->latest()->take(7)->get()->sum('comments_count'),
                    Blog::where('status', 'published')->withCount('comments')->latest()->take(7)->get()->sum('comments_count'),
                    Event::where('status', 'active')->withCount('comments')->latest()->take(7)->get()->sum('comments_count'),
                ],
            ],
            'month' => [
                'likes' => [
                    Artwork::where('status', 'active')->where('created_at', '>=', now()->subMonth())->withCount('likes')->get()->sum('likes_count'),
                    Blog::where('status', 'published')->where('created_at', '>=', now()->subMonth())->withCount('likes')->get()->sum('likes_count'),
                    Event::where('status', 'active')->where('created_at', '>=', now()->subMonth())->withCount('registrations')->get()->sum('registrations_count'),
                ],
                'comments' => [
                    Artwork::where('status', 'active')->where('created_at', '>=', now()->subMonth())->withCount('comments')->get()->sum('comments_count'),
                    Blog::where('status', 'published')->where('created_at', '>=', now()->subMonth())->withCount('comments')->get()->sum('comments_count'),
                    Event::where('status', 'active')->where('created_at', '>=', now()->subMonth())->withCount('comments')->get()->sum('comments_count'),
                ],
            ],
            'year' => [
                'likes' => [
                    Artwork::where('status', 'active')->where('created_at', '>=', now()->subYear())->withCount('likes')->get()->sum('likes_count'),
                    Blog::where('status', 'published')->where('created_at', '>=', now()->subYear())->withCount('likes')->get()->sum('likes_count'),
                    Event::where('status', 'active')->where('created_at', '>=', now()->subYear())->withCount('registrations')->get()->sum('registrations_count'),
                ],
                'comments' => [
                    Artwork::where('status', 'active')->where('created_at', '>=', now()->subYear())->withCount('comments')->get()->sum('comments_count'),
                    Blog::where('status', 'published')->where('created_at', '>=', now()->subYear())->withCount('comments')->get()->sum('comments_count'),
                    Event::where('status', 'active')->where('created_at', '>=', now()->subYear())->withCount('comments')->get()->sum('comments_count'),
                ],
            ],
        ];

        $eventData = [
            'month' => Cache::remember('event_data_month', now()->addMinutes(60), fn () => Event::where('status', 'active')
                ->where('created_at', '>=', now()->subMonth())
                ->groupBy('category_id')
                ->select('category_id', DB::raw('count(*) as total'))
                ->with('category')
                ->get()
                ->mapWithKeys(fn ($item) => [$item->category->name => $item->total])
                ->toArray()),
            'quarter' => Cache::remember('event_data_quarter', now()->addMinutes(60), fn () => Event::where('status', 'active')
                ->where('created_at', '>=', now()->subMonths(3))
                ->groupBy('category_id')
                ->select('category_id', DB::raw('count(*) as total'))
                ->with('category')
                ->get()
                ->mapWithKeys(fn ($item) => [$item->category->name => $item->total])
                ->toArray()),
            'year' => Cache::remember('event_data_year', now()->addMinutes(60), fn () => Event::where('status', 'active')
                ->where('created_at', '>=', now()->subYear())
                ->groupBy('category_id')
                ->select('category_id', DB::raw('count(*) as total'))
                ->with('category')
                ->get()
                ->mapWithKeys(fn ($item) => [$item->category->name => $item->total])
                ->toArray()),
        ];

        $activities = [];
        $artworks = Artwork::where('status', 'active')->with(['creator', 'category', 'community'])->withCount(['likes', 'comments'])->latest()->take(5)->get();
        $blogs = Blog::where('status', 'published')->with(['author', 'category'])->withCount(['likes', 'comments'])->latest()->take(5)->get();
        $events = Event::where('status', 'active')->with('category')->withCount(['registrations', 'comments'])->latest()->take(5)->get();
        $communities = Community::active()->with('creator')->latest()->take(5)->get();
        $projects = Project::where('status', 'ongoing')->with(['creator', 'category'])->withCount(['likes', 'comments'])->latest()->take(5)->get();

        foreach ($artworks as $artwork) {
            $activities[] = [
                'type' => 'artwork',
                'category' => $artwork->category->name ?? 'all',
                'description' => $artwork->title,
                'author' => $artwork->creator->name ?? 'Unknown',
                'community' => $artwork->community->name ?? 'N/A',
                'date' => $artwork->created_at->timestamp,
                'likes' => $artwork->likes_count ?? 0,
                'comments' => $artwork->comments_count ?? 0,
                'title' => $artwork->title,
            ];
        }
        foreach ($blogs as $blog) {
            $activities[] = [
                'type' => 'blog',
                'category' => $blog->category->name ?? 'all',
                'description' => $blog->title,
                'author' => $blog->author->name ?? 'Unknown',
                'community' => 'N/A',
                'date' => $blog->created_at->timestamp,
                'likes' => $blog->likes_count ?? 0,
                'comments' => $blog->comments_count ?? 0,
                'title' => $blog->title,
            ];
        }
        foreach ($events as $event) {
            $activities[] = [
                'type' => 'event',
                'category' => $event->category->name ?? 'all',
                'description' => $event->title,
                'author' => 'N/A',
                'community' => 'N/A',
                'date' => $event->created_at->timestamp,
                'likes' => $event->registrations_count ?? 0,
                'comments' => $event->comments_count ?? 0,
                'title' => $event->title,
            ];
        }
        foreach ($communities as $community) {
            $activities[] = [
                'type' => 'community',
                'category' => $community->category->name ?? 'all',
                'description' => $community->name,
                'author' => $community->creator->name ?? 'Unknown',
                'community' => $community->name,
                'date' => $community->created_at->timestamp,
                'likes' => 0,
                'comments' => 0,
                'title' => $community->name,
            ];
        }
        foreach ($projects as $project) {
            $activities[] = [
                'type' => 'project',
                'category' => $project->category->name ?? 'all',
                'description' => $project->project_name,
                'author' => $project->creator->name ?? 'Unknown',
                'community' => $project->community->name ?? 'N/A',
                'date' => $project->created_at->timestamp,
                'likes' => $project->likes_count ?? 0,
                'comments' => $project->comments_count ?? 0,
                'title' => $project->project_name,
            ];
        }

        $popularArtworks = Artwork::where('status', 'active')
            ->with(['creator', 'category'])
            ->withCount(['likes', 'comments'])
            ->orderBy('likes_count', 'desc')
            ->take(5)
            ->get();

        $recentArtworks = Artwork::where('status', 'active')
            ->with(['creator', 'category'])
            ->withCount(['likes', 'comments'])
            ->latest()
            ->take(6)
            ->get();

        $newEvents = Event::where('status', 'active')
            ->with('category')
            ->withCount(['registrations', 'comments'])
            ->latest()
            ->take(3)
            ->get();

        $recentProjects = Project::where('status', 'ongoing')
            ->with(['creator', 'category', 'community'])
            ->withCount(['likes', 'comments'])
            ->latest()
            ->take(3)
            ->get();

        $categories = Cache::remember('categories', now()->addMinutes(60), fn () => Category::all());

        return view('Administrator.Kurator.dashboard.index', compact(
            'totalCommunities',
            'totalBlogs',
            'totalEvents',
            'totalCategories',
            'totalArtworks',
            'totalProjects',
            'totalActiveUsers',
            'visitorData',
            'categoryNames',
            'categoryCounts',
            'interactionData',
            'eventData',
            'growthData',
            'activities',
            'popularArtworks',
            'recentArtworks',
            'newEvents',
            'recentProjects',
            'categories',
            'todayTraffic',
            'growthPercentage'
        ));
    }
}