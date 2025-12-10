@extends('layouts.admin')

@section('title', 'Nuevo proyecto')

@section('content')
    <h1 class="mb-4">Nuevo proyecto</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tecnologías</label>
            <input type="text" name="technologies" class="form-control"
                   value="{{ old('technologies') }}" placeholder="Laravel, Bootstrap, MySQL">
        </div>

        <div class="mb-3">
            <label class="form-label">URL GitHub</label>
            <input type="url" name="github_url" class="form-control"
                   value="{{ old('github_url') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">URL Demo</label>
            <input type="url" name="demo_url" class="form-control"
                   value="{{ old('demo_url') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha del proyecto</label>
            <input type="date" name="project_date" class="form-control"
                   value="{{ old('project_date') }}">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_featured" class="form-check-input"
                   id="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
            <label for="is_featured" class="form-check-label">Marcar como destacado</label>
        </div>

        <button class="btn btn-primary">Guardar</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
