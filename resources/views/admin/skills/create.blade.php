@extends('layouts.admin')

@section('title', 'Nueva habilidad')

@section('content')
    <h1 class="mb-4">Nueva habilidad</h1>

    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input type="text" name="category" class="form-control"
                   value="{{ old('category') }}" placeholder="Frontend, Backend, Base de datos...">
        </div>

        <div class="mb-3">
            <label class="form-label">Nivel (1-5)</label>
            <input type="number" name="level" class="form-control"
                   value="{{ old('level', 3) }}" min="1" max="5">
        </div>

        <button class="btn btn-primary">Guardar</button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
