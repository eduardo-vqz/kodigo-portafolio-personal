<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'technologies'=> 'nullable|string|max:255',
            'github_url'  => 'nullable|url',
            'demo_url'    => 'nullable|url',
            'project_date'=> 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->only(
            'title','description','technologies','github_url','demo_url','project_date'
        );
        $data['slug'] = Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');

        Project::create($data);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyecto creado correctamente.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'technologies'=> 'nullable|string|max:255',
            'github_url'  => 'nullable|url',
            'demo_url'    => 'nullable|url',
            'project_date'=> 'nullable|date',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->only(
            'title','description','technologies','github_url','demo_url','project_date'
        );
        $data['slug'] = Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');

        $project->update($data);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyecto actualizado.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyecto eliminado.');
    }
}
