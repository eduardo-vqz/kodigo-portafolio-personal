@extends('layouts.admin')

@section('title', 'Editar perfil')

@section('content')
<h1 class="mb-4">Editar perfil</h1>

<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
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

    <div class="mb-4">
            <label class="form-label">Fotografía</label>
            <input type="file"
                   name="photo"
                   class="form-control @error('photo') is-invalid @enderror"
                   accept="image/*">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="form-text">
                Formatos permitidos: JPG, PNG, WEBP. Tamaño máximo: 2 MB.
            </div>
        </div>


    <button class="btn btn-primary">Guardar cambios</button>
</form>
@endsection