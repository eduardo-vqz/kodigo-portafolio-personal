<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'technologies' => 'nullable|string|max:255',
            'github_url'   => 'nullable|url|max:255',
            'demo_url'     => 'nullable|url|max:255',
            'project_date' => 'nullable|date',
            'image'        => 'nullable|string|max:255', // si no estás subiendo imagen aún
            'is_featured'  => 'nullable|boolean',
        ]);

        // Los checkbox solo llegan si están marcados:
        $validated['is_featured'] = $request->boolean('is_featured');

        Project::create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Proyecto creado correctamente.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'technologies' => 'nullable|string|max:255',
            'github_url'   => 'nullable|url|max:255',
            'demo_url'     => 'nullable|url|max:255',
            'project_date' => 'nullable|date',
            'image'        => 'nullable|string|max:255',
            'is_featured'  => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');

        $project->update($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Proyecto eliminado correctamente.');
    }
}
