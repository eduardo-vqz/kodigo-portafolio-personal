@extends('layouts.admin')

@section('title', 'Habilidades')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Habilidades</h1>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">Nueva habilidad</a>
    </div>

    @if($skills->isEmpty())
        <p>No hay habilidades registradas.</p>
    @else
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Nivel</th>
                <th class="text-end">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->category }}</td>
                    <td>{{ $skill->level }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar esta habilidad?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
