<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectComment;
use App\Models\ProjectCommentLike;
use App\Models\ProjectMember;
use App\Models\ProjectMilestone;
use App\Models\Category;
use App\Models\Community;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['category', 'creator', 'members', 'community']);

        // Filter by category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }

        // Filter by community
        if ($request->filled('community')) {
            $query->where('community_id', $request->community);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by keyword
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('project_name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Sorting
        $sort = $request->input('sort', 'default');
        if ($sort === 'progress') {
            $query->orderBy('progress', 'desc');
        } elseif ($sort === 'members') {
            $query->withCount('members')->orderBy('members_count', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $projects = $query->paginate(9);
        $categories = Category::all();
        $communities = Community::all();

        return view('public.project.index', compact('projects', 'categories', 'communities'));
    }

    public function create()
    {
        $categories = Category::all();
        $communities = Community::all();
        return view('public.project.create', compact('categories', 'communities'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'community_id' => 'required|exists:communities,id',
            'collaboration_goals' => 'required|string',
            'cover_images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'status' => 'required|in:ongoing,pending,completed',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'progress' => 'required|integer|min:0|max:100',
            'member_ids' => 'nullable|string',
            'member_roles' => 'nullable|string',
            'milestones' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['creator_id'] = Auth::id();

        if ($request->hasFile('cover_images')) {
            $data['cover_images'] = $request->file('cover_images')->store('project_images', 'public');
        }

        $project = Project::create($data);

        // Add creator as a project member
        ProjectMember::create([
            'project_id' => $project->id,
            'user_id' => Auth::id(),
            'role' => 'Pembuat',
            'joined_at' => now(),
        ]);

        // Add additional members
        if ($request->filled('member_ids') && $request->filled('member_roles')) {
            $memberIds = array_filter(explode(',', $request->member_ids));
            $memberRoles = array_filter(explode(',', $request->member_roles));
            foreach ($memberIds as $index => $userId) {
                if (isset($memberRoles[$index])) {
                    ProjectMember::create([
                        'project_id' => $project->id,
                        'user_id' => trim($userId),
                        'role' => trim($memberRoles[$index]),
                        'joined_at' => now(),
                    ]);
                }
            }
        }

        // Add milestones
        if ($request->filled('milestones')) {
            $milestones = array_filter(explode("\n", $request->milestones));
            foreach ($milestones as $milestone) {
                [$dueDate, $title, $description, $status] = array_pad(explode(':', $milestone, 4), 4, '');
                if (!empty($dueDate) && !empty($title)) {
                    ProjectMilestone::create([
                        'project_id' => $project->id,
                        'due_date' => trim($dueDate),
                        'title' => trim($title),
                        'description' => trim($description) ?: null,
                        'status' => in_array(trim($status), ['upcoming', 'in_progress', 'done']) ? trim($status) : 'upcoming',
                    ]);
                }
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Project baru "' . $project->project_name . '" telah ditambahkan',
        ]);

        return redirect()->route('projects.show', $project->id)->with('success', 'Project berhasil dibuat.');
    }

    public function show(Project $project)
    {
        $project->load(['category', 'creator', 'members.user', 'comments.user', 'comments.replies.user', 'tasks', 'timeline', 'community', 'milestones']);

        $recommendedProjects = Project::where('category_id', $project->category_id)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Melihat project "' . $project->project_name . '"',
        ]);

        return view('public.project.show', compact('project', 'recommendedProjects'));
    }

    public function edit(Project $project)
    {
        if ($project->creator_id !== Auth::id()) {
            return redirect()->route('projects.show', $project->id)->with('error', 'Anda tidak memiliki izin untuk mengedit project ini.');
        }

        $categories = Category::all();
        $communities = Community::all();
        $users = User::select('id', 'name')->orderBy('name')->get();
        return view('public.project.edit', compact('project', 'categories', 'communities', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        if ($project->creator_id !== Auth::id()) {
            return redirect()->route('projects.show', $project->id)->with('error', 'Anda tidak memiliki izin untuk mengedit project ini.');
        }

        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'community_id' => 'required|exists:communities,id',
            'collaboration_goals' => 'required|string',
            'cover_images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'status' => 'required|in:ongoing,pending,completed',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'progress' => 'required|integer|min:0|max:100',
            'member_ids' => 'nullable|string',
            'member_roles' => 'nullable|string',
            'milestones' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        if ($request->hasFile('cover_images')) {
            if ($project->cover_images) {
                Storage::disk('public')->delete($project->cover_images);
            }
            $data['cover_images'] = $request->file('cover_images')->store('project_images', 'public');
        }

        $project->update($data);

        // Update members
        ProjectMember::where('project_id', $project->id)->delete();
        ProjectMember::create([
            'project_id' => $project->id,
            'user_id' => Auth::id(),
            'role' => 'Pembuat',
            'joined_at' => now(),
        ]);
        if ($request->filled('member_ids') && $request->filled('member_roles')) {
            $memberIds = array_filter(explode(',', $request->member_ids));
            $memberRoles = array_filter(explode(',', $request->member_roles));
            foreach ($memberIds as $index => $userId) {
                if (isset($memberRoles[$index])) {
                    ProjectMember::create([
                        'project_id' => $project->id,
                        'user_id' => trim($userId),
                        'role' => trim($memberRoles[$index]),
                        'joined_at' => now(),
                    ]);
                }
            }
        }

        // Update milestones
        ProjectMilestone::where('project_id', $project->id)->delete();
        if ($request->filled('milestones')) {
            $milestones = array_filter(explode("\n", $request->milestones));
            foreach ($milestones as $milestone) {
                [$dueDate, $title, $description, $status] = array_pad(explode(':', $milestone, 4), 4, '');
                if (!empty($dueDate) && !empty($title)) {
                    ProjectMilestone::create([
                        'project_id' => $project->id,
                        'due_date' => trim($dueDate),
                        'title' => trim($title),
                        'description' => trim($description) ?: null,
                        'status' => in_array(trim($status), ['upcoming', 'in_progress', 'done']) ? trim($status) : 'upcoming',
                    ]);
                }
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Project "' . $project->project_name . '" berhasil diperbarui',
        ]);

        return redirect()->route('projects.show', $project->id)->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->creator_id !== Auth::id()) {
            return redirect()->route('projects.show', $project->id)->with('error', 'Anda tidak memiliki izin untuk menghapus project ini.');
        }

        $projectName = $project->project_name;

        if ($project->cover_images) {
            Storage::disk('public')->delete($project->cover_images);
        }

        $project->members()->delete();
        $project->milestones()->delete();
        $project->tasks()->delete();
        $project->timeline()->delete();
        $project->comments()->delete();
        $project->likes()->delete();
        $project->bookmarks()->delete();

        $project->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Project "' . $projectName . '" berhasil dihapus',
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus.');
    }

    public function comment(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:1000',
            'parent_comment_id' => 'nullable|exists:project_comments,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ProjectComment::create([
            'project_id' => $project->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'parent_comment_id' => $request->parent_comment_id,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Komentar baru ditambahkan ke project "' . $project->project_name . '"',
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function join(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ProjectMember::create([
            'project_id' => $project->id,
            'user_id' => Auth::id(),
            'role' => $request->role,
            'joined_at' => now(),
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Bergabung dengan project "' . $project->project_name . '" sebagai "' . $request->role . '"',
        ]);

        return back()->with('success', 'Pengajuan bergabung berhasil dikirim.');
    }

    public function like(Request $request, Project $project)
    {
        $like = $project->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            $message = 'Like dihapus.';
        } else {
            $project->likes()->create(['user_id' => Auth::id()]);
            $message = 'Project disukai.';
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => $message . ' pada project "' . $project->project_name . '"',
        ]);

        return back()->with('success', $message);
    }

    public function bookmark(Request $request, Project $project)
    {
        $bookmark = $project->bookmarks()->where('user_id', Auth::id())->first();

        if ($bookmark) {
            $bookmark->delete();
            $message = 'Bookmark dihapus.';
        } else {
            $project->bookmarks()->create(['user_id' => Auth::id()]);
            $message = 'Project dibookmark.';
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => $message . ' pada project "' . $project->project_name . '"',
        ]);

        return back()->with('success', $message);
    }

    public function deleteComment(Request $request, Project $project, $commentId)
    {
        $comment = ProjectComment::findOrFail($commentId);

        if ($comment->user_id !== Auth::id() && $project->creator_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Anda tidak memiliki izin untuk menghapus komentar ini.'], 403);
        }

        $comment->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Komentar dihapus dari project "' . $project->project_name . '"',
        ]);

        return response()->json(['success' => true, 'message' => 'Komentar berhasil dihapus.']);
    }

    public function toggleCommentVisibility(Request $request, Project $project, $commentId)
    {
        $comment = ProjectComment::findOrFail($commentId);

        if ($comment->user_id !== Auth::id() && $project->creator_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Anda tidak memiliki izin untuk mengubah visibilitas komentar ini.'], 403);
        }

        $comment->update(['hidden' => !$comment->hidden]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Visibilitas komentar diubah pada project "' . $project->project_name . '"',
        ]);

        return response()->json(['success' => true, 'message' => $comment->hidden ? 'Komentar disembunyikan.' : 'Komentar ditampilkan.']);
    }

    public function likeComment(Request $request, Project $project, $commentId)
    {
        $comment = ProjectComment::findOrFail($commentId);
        $like = $comment->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            $message = 'Like dihapus dari komentar.';
        } else {
            $comment->likes()->create(['user_id' => Auth::id()]);
            $message = 'Komentar disukai.';
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => $message . ' pada project "' . $project->project_name . '"',
        ]);

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function showHiddenComments(Request $request, Project $project)
    {
        if ($project->creator_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Anda tidak memiliki izin untuk menampilkan komentar tersembunyi.'], 403);
        }

        ProjectComment::where('project_id', $project->id)->where('hidden', true)->update(['hidden' => false]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Semua komentar tersembunyi ditampilkan pada project "' . $project->project_name . '"',
        ]);

        return response()->json(['success' => true, 'message' => 'Semua komentar tersembunyi ditampilkan.']);
    }

    public function searchUsers(Request $request)
    {
        $query = $request->query('query');
        $projectId = $request->query('project_id');

        $users = User::where('name', 'like', '%' . $query . '%')
                     ->when($projectId, function ($q) use ($projectId) {
                         $q->whereNotIn('id', ProjectMember::where('project_id', $projectId)->pluck('user_id'));
                     })
                     ->take(10)
                     ->get(['id', 'name']);

        return response()->json($users);
    }
}