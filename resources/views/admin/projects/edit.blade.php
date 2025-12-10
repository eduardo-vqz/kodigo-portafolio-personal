@extends('layouts.admin')

@section('title', 'Editar proyecto')

@section('content')
<h1 class="mb-4">Editar proyecto</h1>

<form action="{{ route('admin.projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control"
            value="{{ old('title', $project->title) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" rows="4" class="form-control" required>{{ old('description', $project->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Tecnologías</label>
        <input type="text" name="technologies" class="form-control"
            value="{{ old('technologies', $project->technologies) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">URL GitHub</label>
        <input type="url" name="github_url" class="form-control"
            value="{{ old('github_url', $project->github_url) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">URL Demo</label>
        <input type="url" name="demo_url" class="form-control"
            value="{{ old('demo_url', $project->demo_url) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha del proyecto</label>
        <input type="date" name="project_date" class="form-control"
            value="{{ old('project_date', $project->project_date) }}">
    </div>

    <div class="form-check mb-3">
        <input
            type="checkbox"
            name="is_featured"
            id="is_featured"
            value="1"
            class="form-check-input"
            {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
        <label for="is_featured" class="form-check-label">
            Marcar como destacado
        </label>
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection