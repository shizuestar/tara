<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Community;
use App\Models\ProjectMember;
use App\Models\ProjectMilestone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminProyekController extends Controller
{
    /**
     * Display a listing of the resource.
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

        $categoryNames = Category::pluck('name')->toArray();
        $projectCounts = Category::withCount('projects')->pluck('projects_count')->toArray();

        return view('administrator.admin.projects.index', compact('projects', 'categories', 'users', 'communities', 'categoryNames', 'projectCounts'));
    }

    /**
     * Store a newly created resource in storage.
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

        if ($request->filled('member_ids') && $request->filled('member_roles')) {
            $memberIds = explode(',', $request->member_ids);
            $memberRoles = explode(',', $request->member_roles);
            foreach ($memberIds as $index => $userId) {
                if (isset($memberRoles[$index])) {
                    ProjectMember::create([
                        'project_id' => $project->id,
                        'user_id' => $userId,
                        'role' => $memberRoles[$index],
                    ]);
                }
            }
        }

        if ($request->filled('milestones')) {
            $milestones = explode("\n", $request->milestones);
            foreach ($milestones as $milestone) {
                [$dueDate, $title] = explode(':', $milestone, 2);
                ProjectMilestone::create([
                    'project_id' => $project->id,
                    'due_date' => $dueDate,
                    'title' => $title,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
        {
            $project = Project::with(['creator', 'community', 'category', 'members.user', 'milestones'])
                ->findOrFail($id);

            $users = User::select('id', 'name')->orderBy('name')->get();
            $communities = Community::select('id', 'name')->orderBy('name')->get();
            $categories = Category::select('id', 'name')->orderBy('name')->get();

            return view('administrator.admin.projects.show', compact('project', 'users', 'communities', 'categories'));
        }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::with(['members.user', 'milestones'])->findOrFail($id);
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
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

        if ($request->hasFile('cover_images')) {
            if ($project->cover_images) {
                Storage::disk('public')->delete($project->cover_images);
            }
            $data['cover_images'] = $request->file('cover_images')->store('project_images', 'public');
        }

        $project->update($data);

        ProjectMember::where('project_id', $project->id)->delete();
        if ($request->filled('member_ids') && $request->filled('member_roles')) {
            $memberIds = explode(',', $request->member_ids);
            $memberRoles = explode(',', $request->member_roles);
            foreach ($memberIds as $index => $userId) {
                if (isset($memberRoles[$index])) {
                    ProjectMember::create([
                        'project_id' => $project->id,
                        'user_id' => $userId,
                        'role' => $memberRoles[$index],
                    ]);
                }
            }
        }

        ProjectMilestone::where('project_id', $project->id)->delete();
        if ($request->filled('milestones')) {
            $milestones = explode("\n", $request->milestones);
            foreach ($milestones as $milestone) {
                [$dueDate, $title] = explode(':', $milestone, 2);
                ProjectMilestone::create([
                    'project_id' => $project->id,
                    'due_date' => $dueDate,
                    'title' => $title,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project->cover_images) {
            Storage::disk('public')->delete($project->cover_images);
        }
        ProjectMember::where('project_id', $project->id)->delete();
        ProjectMilestone::where('project_id', $project->id)->delete();
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus.');
    }

    /**
     * Search users for member selection.
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