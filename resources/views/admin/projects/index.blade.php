@extends('layouts.admin')

@section('title', 'Proyectos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Proyectos</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Nuevo proyecto</a>
    </div>

    @if($projects->isEmpty())
        <p>No hay proyectos registrados.</p>
    @else
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th>Título</th>
                <th>Tecnologías</th>
                <th>Destacado</th>
                <th class="text-end">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->technologies }}</td>
                    <td>{{ $project->is_featured ? 'Sí' : 'No' }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar este proyecto?')">
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
