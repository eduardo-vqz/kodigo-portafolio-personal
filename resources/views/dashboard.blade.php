@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Perfil</h5>
                    <p class="display-6">{{ $stats['profiles'] }}</p>
                    <p class="card-text"><small>Registros de perfil (debería existir solo uno).</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5 class="card-title">Habilidades</h5>
                    <p class="display-6">{{ $stats['skills'] }}</p>
                    <p class="card-text"><small>Total de habilidades registradas.</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">Proyectos</h5>
                    <p class="display-6">{{ $stats['projects'] }}</p>
                    <p class="card-text"><small>Total de proyectos en el portafolio.</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
