@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Perfil</h5>
                    <p class="display-6 mb-0">{{ $stats['profiles'] }}</p>
                    <p class="card-text"><small>Registros de perfil (debería haber solo uno).</small></p>
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-light btn-sm mt-2">
                        Editar perfil
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Habilidades</h5>
                    <p class="display-6 mb-0">{{ $stats['skills'] }}</p>
                    <p class="card-text"><small>Total de habilidades registradas.</small></p>
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-light btn-sm mt-2">
                        Ver habilidades
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-secondary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Proyectos</h5>
                    <p class="display-6 mb-0">{{ $stats['projects'] }}</p>
                    <p class="card-text"><small>Total de proyectos en el portafolio.</small></p>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-light btn-sm mt-2">
                        Ver proyectos
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
