<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    public function index()
    {
        $types = ProjectType::all();
        return view('project-types.index', compact('types'));
    }

    public function create()
    {
        return view('project-types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:project_types',
            'description' => 'nullable|string',
        ]);

        ProjectType::create($validated);
        return redirect()->route('project-types.index')->with('success', 'Tipe proyek berhasil dibuat.');
    }

    public function edit(ProjectType $projectType)
    {
        return view('project-types.edit', compact('projectType'));
    }

    public function update(Request $request, ProjectType $projectType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:project_types,name,' . $projectType->id,
            'description' => 'nullable|string',
        ]);

        $projectType->update($validated);
        return redirect()->route('project-types.index')->with('success', 'Tipe proyek berhasil diperbarui.');
    }

    public function destroy(ProjectType $projectType)
    {
        $projectType->delete();
        return redirect()->route('project-types.index')->with('success', 'Tipe proyek berhasil dihapus.');
    }
}