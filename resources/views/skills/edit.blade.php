@extends('layouts.admin')

@section('title', 'Editar habilidad')

@section('content')
    <h1 class="mb-4">Editar habilidad</h1>

    <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $skill->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $skill->category) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nivel (1-5)</label>
            <input type="number" name="level" class="form-control" value="{{ old('level', $skill->level) }}" min="1" max="5">
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
