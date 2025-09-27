<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectComment;
use App\Models\ProjectCommentLike;
use App\Models\ProjectMember;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['category', 'creator', 'members']);

        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('project_name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

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

        return view('public.project.index', compact('projects', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('public.project.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'collaboration_goals' => 'required|string',
            'cover_images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:ongoing,pending,completed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['creator_id'] = Auth::id();
        $data['progress'] = 0;

        if ($request->hasFile('cover_images')) {
            $data['cover_images'] = $request->file('cover_images')->store('project_images', 'public');
        }

        $project = Project::create($data);

        ProjectMember::create([
            'project_id' => $project->id,
            'user_id' => Auth::id(),
            'role' => 'Pembuat',
            'joined_at' => now(),
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Project baru "' . $project->project_name . '" telah ditambahkan',
        ]);

        return redirect()->route('project.show', $project->id)->with('success', 'Project berhasil dibuat.');
    }

    public function show(Project $project)
    {
        $project->load(['category', 'creator', 'members.user', 'comments.user', 'comments.replies.user', 'tasks', 'timeline']);

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
            return redirect()->route('project.show', $project->id)->with('error', 'Anda tidak memiliki izin untuk mengedit project ini.');
        }

        $categories = Category::all();
        return view('public.project.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        if ($project->creator_id !== Auth::id()) {
            return redirect()->route('project.show', $project->id)->with('error', 'Anda tidak memiliki izin untuk mengedit project ini.');
        }

        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'collaboration_goals' => 'required|string',
            'cover_images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:ongoing,pending,completed',
            'progress' => 'required|integer|min:0|max:100',
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

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Project "' . $project->project_name . '" berhasil diperbarui',
        ]);

        return redirect()->route('project.show', $project->id)->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->creator_id !== Auth::id()) {
            return redirect()->route('project.show', $project->id)->with('error', 'Anda tidak memiliki izin untuk menghapus project ini.');
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

        return redirect()->route('project.index')->with('success', 'Project berhasil dihapus.');
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
}