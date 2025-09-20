<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
use Illuminate\Http\Request;
use App\Models\CommunityPost;
use App\Exports\ReportsExport;
use App\Models\ArtworkComment;
use App\Models\ProjectComment;
use App\Models\CommunityMember;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', now()->subMonth()->startOfDay());
        $endDate = $request->input('end_date', now()->endOfDay());
        $categoryId = $request->input('category_id');
        $reportType = $request->input('report_type', 'general');

        // Statistik umum
        $totalCommunities = Community::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalProjects = Project::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalArtworks = Artwork::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalEvents = Event::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalActiveUsers = User::where('status', 'active')->whereBetween('created_at', [$startDate, $endDate])->count();
        $totalLikes = ArtworkLike::whereBetween('created_at', [$startDate, $endDate])->count() +
                      BlogLike::whereBetween('created_at', [$startDate, $endDate])->count() +
                      ProjectLike::whereBetween('created_at', [$startDate, $endDate])->count();
        $totalComments = ArtworkComment::whereBetween('created_at', [$startDate, $endDate])->count() +
                         BlogComment::whereBetween('created_at', [$startDate, $endDate])->count() +
                         ProjectComment::whereBetween('created_at', [$startDate, $endDate])->count() +
                         EventComment::whereBetween('created_at', [$startDate, $endDate])->count();

        // Data grafik pengunjung
        $visitorData = [
            'daily' => ActivityLog::where('description', 'visitor')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->date => $item->count];
                })->toArray(),
        ];

        // Data distribusi kategori
        $categories = Category::withCount([
            'artworks' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            },
            'projects' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            },
            'blogs' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }
        ])->get();
        $categoryNames = $categories->pluck('name')->toArray();
        $categoryCounts = $categories->pluck('artworks_count')->toArray();

        // Data interaksi
        $interactionData = [
            'likes' => [
                'artworks' => ArtworkLike::whereBetween('created_at', [$startDate, $endDate])->count(),
                'blogs' => BlogLike::whereBetween('created_at', [$startDate, $endDate])->count(),
                'projects' => ProjectLike::whereBetween('created_at', [$startDate, $endDate])->count(),
            ],
            'comments' => [
                'artworks' => ArtworkComment::whereBetween('created_at', [$startDate, $endDate])->count(),
                'blogs' => BlogComment::whereBetween('created_at', [$startDate, $endDate])->count(),
                'projects' => ProjectComment::whereBetween('created_at', [$startDate, $endDate])->count(),
                'events' => EventComment::whereBetween('created_at', [$startDate, $endDate])->count(),
            ],
        ];

        // Data distribusi event
        $eventData = Event::selectRaw('category_id, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('category_id')
            ->with('category')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->category->name => $item->count];
            })->toArray();

        // Data pertumbuhan anggota
        $growthData = CommunityMember::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->date => $item->count];
            })->toArray();

        // Laporan aktivitas
        $activitiesQuery = ActivityLog::with(['user', 'subject'])
            ->whereBetween('created_at', [$startDate, $endDate]);
        
        if ($categoryId) {
            $activitiesQuery->where('subject_id', $categoryId);
        }

        $activities = $activitiesQuery->latest()->paginate(10);

        return view('Administrator.Admin.Reports.index', compact(
            'totalCommunities', 'totalProjects', 'totalArtworks', 'totalEvents', 'totalActiveUsers', 'totalLikes', 'totalComments',
            'visitorData', 'categoryNames', 'categoryCounts', 'interactionData', 'eventData', 'growthData', 'activities', 'categories',
            'startDate', 'endDate', 'categoryId', 'reportType'
        ));
    }

    public function export(Request $request, $format)
    {
        $startDate = $request->input('start_date', now()->subMonth()->startOfDay());
        $endDate = $request->input('end_date', now()->endOfDay());
        $categoryId = $request->input('category_id');
        $reportType = $request->input('report_type', 'general');

        // Ambil data untuk ekspor
        $data = [
            'totalCommunities' => Community::whereBetween('created_at', [$startDate, $endDate])->count(),
            'totalProjects' => Project::whereBetween('created_at', [$startDate, $endDate])->count(),
            'totalArtworks' => Artwork::whereBetween('created_at', [$startDate, $endDate])->count(),
            'totalEvents' => Event::whereBetween('created_at', [$startDate, $endDate])->count(),
            'totalActiveUsers' => User::where('status', 'active')->whereBetween('created_at', [$startDate, $endDate])->count(),
            'totalLikes' => ArtworkLike::whereBetween('created_at', [$startDate, $endDate])->count() +
                           BlogLike::whereBetween('created_at', [$startDate, $endDate])->count() +
                           ProjectLike::whereBetween('created_at', [$startDate, $endDate])->count(),
            'totalComments' => ArtworkComment::whereBetween('created_at', [$startDate, $endDate])->count() +
                              BlogComment::whereBetween('created_at', [$startDate, $endDate])->count() +
                              ProjectComment::whereBetween('created_at', [$startDate, $endDate])->count() +
                              EventComment::whereBetween('created_at', [$startDate, $endDate])->count(),
            'activities' => ActivityLog::with(['user', 'subject'])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->when($categoryId, function ($query) use ($categoryId) {
                    return $query->where('subject_id', $categoryId);
                })
                ->latest()
                ->get()
                ->map(function ($log) {
                    return [
                        'id' => $log->id,
                        'user' => $log->user ? $log->user->name : 'Sistem',
                        'description' => $log->description,
                        'subject' => $log->subject_type ? class_basename($log->subject_type) : 'N/A',
                        'date' => $log->created_at->format('d M Y H:i'),
                    ];
                }),
        ];

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('Administrator.Admin.Reports.pdf', [
                'data' => $data,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
            return $pdf->download('laporan-platform-' . now()->format('Y-m-d') . '.pdf');
        } elseif ($format === 'excel') {
            return Excel::download(new ReportsExport($data), 'laporan-platform-' . now()->format('Y-m-d') . '.xlsx');
        }

        return redirect()->route('admin.reports.index')->with('error', 'Format ekspor tidak valid.');
    }
}