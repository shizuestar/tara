<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Community;
use App\Models\ActivityLog;
use App\Models\ProjectMember;
use App\Models\ProjectMilestone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    /**
     * Menampilkan daftar proyek dengan opsi filter.
     */
    public function index(Request $request)
    {
        $query = Project::with(['creator', 'community', 'category']);

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('manager')) {
            $query->where('creator_id', $request->manager);
        }

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('project_name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        $projects = $query->paginate(10);
        $categories = Category::all();
        $users = User::all();
        $communities = Community::all();

        // Data untuk chart/statistik
        $categoryNames = Category::pluck('name')->toArray();
        $projectCounts = Category::withCount('projects')->pluck('projects_count')->toArray();
        $activities = ActivityLog::where('type', 'project')->latest()->take(10)->get();

        return view('administrator.admin.projects.index', compact('projects', 'categories', 'users', 'communities', 'categoryNames', 'projectCounts', 'activities'));
    }

    /**
     * Menyimpan proyek baru ke database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string|max:255',
            'creator_id' => 'required|exists:users,id',
            'community_id' => 'required|exists:communities,id',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'cover_images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|in:ongoing,pending,completed',
            'member_ids' => 'nullable|string',
            'member_roles' => 'nullable|string',
            'milestones' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        if ($request->hasFile('cover_images')) {
            $data['cover_images'] = $request->file('cover_images')->store('project_images', 'public');
        }

        $project = Project::create($data);

        // Tambahkan Anggota Proyek
        if ($request->filled('member_ids') && $request->filled('member_roles')) {
            $memberIds = array_filter(explode(',', $request->member_ids));
            $memberRoles = array_filter(explode(',', $request->member_roles));
            foreach ($memberIds as $index => $userId) {
                if (isset($memberRoles[$index])) {
                    ProjectMember::create([
                        'project_id' => $project->id,
                        'user_id' => trim($userId),
                        'role' => trim($memberRoles[$index]),
                    ]);
                }
            }
        }

        // Tambahkan Milestones
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
                        'status' => in_array(trim($status), ['pending', 'ongoing', 'completed']) ? trim($status) : 'pending',
                    ]);
                }
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Project baru "' . $project->project_name . '" telah ditambahkan',
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dibuat.');
    }

    /**
     * Menampilkan detail proyek.
     */
    public function show($id)
    {
        $project = Project::with(['creator', 'community', 'category', 'members.user', 'milestones'])->findOrFail($id);
        $users = User::select('id', 'name')->orderBy('name')->get();
        $communities = Community::select('id', 'name')->orderBy('name')->get();
        $categories = Category::select('id', 'name')->orderBy('name')->get();

        return view('administrator.admin.projects.show', compact('project', 'users', 'communities', 'categories'));
    }

    /**
     * Mengambil data proyek untuk diisi ke form edit (biasanya untuk AJAX).
     */
    public function edit($id)
    {
        $project = Project::with(['members.user', 'milestones'])->findOrFail($id);
        return response()->json($project);
    }

    /**
     * Memperbarui data proyek.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'project_name' => 'required|string|max:255',
            'creator_id' => 'required|exists:users,id',
            'community_id' => 'required|exists:communities,id',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'cover_images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|in:ongoing,pending,completed',
            'member_ids' => 'nullable|string',
            'member_roles' => 'nullable|string',
            'milestones' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // Tangani pembaruan cover_images
        if ($request->hasFile('cover_images')) {
            if ($project->cover_images) {
                Storage::disk('public')->delete($project->cover_images);
            }
            $data['cover_images'] = $request->file('cover_images')->store('project_images', 'public');
        }

        $project->update($data);

        // Perbarui Anggota Proyek (Hapus semua, lalu buat ulang)
        ProjectMember::where('project_id', $project->id)->delete();
        if ($request->filled('member_ids') && $request->filled('member_roles')) {
            $memberIds = array_filter(explode(',', $request->member_ids));
            $memberRoles = array_filter(explode(',', $request->member_roles));
            foreach ($memberIds as $index => $userId) {
                if (isset($memberRoles[$index])) {
                    ProjectMember::create([
                        'project_id' => $project->id,
                        'user_id' => trim($userId),
                        'role' => trim($memberRoles[$index]),
                    ]);
                }
            }
        }
        
        // Perbarui Milestones (Hapus semua, lalu buat ulang)
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

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    /**
     * Menghapus proyek.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $projectName = $project->project_name;

        // Hapus file cover
        if ($project->cover_images) {
            Storage::disk('public')->delete($project->cover_images);
        }

        // Hapus relasi terkait
        ProjectMember::where('project_id', $project->id)->delete();
        ProjectMilestone::where('project_id', $project->id)->delete();

        // Hapus proyek
        $project->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'type' => 'project',
            'description' => 'Project "' . $projectName . '" berhasil dihapus',
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }

    /**
     * Mencari pengguna yang belum menjadi anggota proyek.
     */
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