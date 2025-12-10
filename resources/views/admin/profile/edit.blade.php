@extends('layouts.admin')

@section('title', 'Editar perfil')

@section('content')
    <h1 class="mb-4">Editar perfil</h1>

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $profile->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Título profesional</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $profile->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Biografía</label>
            <textarea name="bio" class="form-control" rows="4" required>{{ old('bio', $profile->bio ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $profile->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">GitHub</label>
            <input type="url" name="github" class="form-control"
                   value="{{ old('github', $profile->github ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">LinkedIn</label>
            <input type="url" name="linkedin" class="form-control"
                   value="{{ old('linkedin', $profile->linkedin ?? '') }}">
        </div>

        {{-- Aquí podrías agregar upload de foto más adelante --}}

        <button class="btn btn-primary">Guardar cambios</button>
    </form>
@endsection
