@extends('layouts.app')

@section('title', 'Portafolio')

@section('content')

    {{-- HERO / INICIO --}}
    <section id="inicio" class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <h1 class="hero-title mb-3">
                        Hola, soy <span class="text-primary">
                            {{ $profile->name ?? 'Tu Nombre' }}
                        </span>
                    </h1>
                    <p class="hero-subtitle mb-4">
                        {{ $profile->title ?? 'Desarrollador Web' }}
                    </p>
                    <p class="hero-text mb-4">
                        {{ $profile->bio ?? 'Aún no has configurado tu biografía. Desde el panel de administración puedes editar tu perfil, habilidades y proyectos.' }}
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#proyectos" class="btn btn-primary btn-lg">
                            Ver proyectos
                        </a>
                        <a href="#contacto" class="btn btn-outline-light btn-lg">
                            Contacto
                        </a>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1 text-center">
                    @if($profile && $profile->photo)
                        <img src="{{ asset($profile->photo) }}"
                             alt="Foto de perfil"
                             class="img-fluid rounded-circle hero-photo shadow">
                    @else
                        <div class="hero-avatar d-inline-flex align-items-center justify-content-center rounded-circle shadow">
                            <span class="hero-avatar-text">
                                {{ $profile->name[0] ?? 'T' }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- SOBRE MÍ --}}
    <section id="sobre-mi" class="section-padding">
        <div class="container">
            <h2 class="section-title">Sobre mí</h2>
            <p class="section-subtitle">
                Un poco más sobre quién soy y qué hago.
            </p>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Biografía</h5>
                            <p class="card-text">
                                {{ $profile->bio ?? 'Aún no has configurado tu biografía. Desde el panel de administración puedes agregar una descripción sobre ti.' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Información de contacto</h5>
                            <ul class="list-unstyled mb-0">
                                @if($profile)
                                    <li class="mb-2">
                                        <strong>Correo:</strong>
                                        <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                                    </li>
                                @endif
                                @if($profile && $profile->github)
                                    <li class="mb-2">
                                        <strong>GitHub:</strong>
                                        <a href="{{ $profile->github }}" target="_blank">{{ $profile->github }}</a>
                                    </li>
                                @endif
                                @if($profile && $profile->linkedin)
                                    <li class="mb-2">
                                        <strong>LinkedIn:</strong>
                                        <a href="{{ $profile->linkedin }}" target="_blank">{{ $profile->linkedin }}</a>
                                    </li>
                                @endif
                                @if(!$profile)
                                    <li>No hay datos de contacto configurados aún.</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- HABILIDADES --}}
    <section id="habilidades" class="section-padding section-alt">
        <div class="container">
            <h2 class="section-title">Habilidades y tecnologías</h2>
            <p class="section-subtitle">
                Tecnologías con las que trabajo con mayor frecuencia.
            </p>

            @if($skills->isEmpty())
                <p>No hay habilidades registradas aún.</p>
            @else
                <div class="row g-3">
                    @foreach($skills as $skill)
                        <div class="col-6 col-md-3">
                            <div class="card shadow-sm border-0 text-center h-100 skill-card">
                                <div class="card-body">
                                    <h6 class="card-title mb-1">{{ $skill->name }}</h6>
                                    @if($skill->category)
                                        <span class="badge rounded-pill bg-secondary mb-2">
                                            {{ $skill->category }}
                                        </span>
                                    @endif

                                    @if($skill->level)
                                        <div class="skill-stars">
                                            @for($i = 0; $i < $skill->level; $i++)
                                                ★
                                            @endfor
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- PROYECTOS --}}
    <section id="proyectos" class="section-padding">
        <div class="container">
            <h2 class="section-title">Proyectos destacados</h2>
            <p class="section-subtitle">
                Algunos de los proyectos en los que he trabajado recientemente.
            </p>

            @if($projects->isEmpty())
                <p>No hay proyectos registrados aún.</p>
            @else
                <div class="row g-4">
                    @foreach($projects as $project)
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 h-100 project-card">
                                @if($project->image)
                                    <img src="{{ asset($project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text flex-grow-1">{{ Str::limit($project->description, 120) }}</p>
                                    @if($project->technologies)
                                        <p class="card-text">
                                            <small class="text-muted">
                                                Tecnologías: {{ $project->technologies }}
                                            </small>
                                        </p>
                                    @endif
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between">
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" class="btn btn-outline-dark btn-sm" target="_blank">
                                            GitHub
                                        </a>
                                    @endif
                                    @if($project->demo_url)
                                        <a href="{{ $project->demo_url }}" class="btn btn-primary btn-sm" target="_blank">
                                            Ver demo
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- CONTACTO --}}
    <section id="contacto" class="section-padding section-alt">
        <div class="container">
            <h2 class="section-title">Contacto</h2>
            <p class="section-subtitle">
                ¿Te interesa colaborar o tienes alguna consulta? Escríbeme.
            </p>

            <div class="row g-4">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" class="form-control" placeholder="Tu nombre">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" id="correo" class="form-control" placeholder="tunombre@ejemplo.com">
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea id="mensaje" rows="3" class="form-control" placeholder="Escribe tu mensaje"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary">
                            Enviar (demo)
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    @if($profile)
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <h5 class="card-title mb-3">O contáctame en</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <strong>Correo:</strong>
                                        <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                                    </li>
                                    @if($profile->github)
                                        <li class="mb-2">
                                            <strong>GitHub:</strong>
                                            <a href="{{ $profile->github }}" target="_blank">{{ $profile->github }}</a>
                                        </li>
                                    @endif
                                    @if($profile->linkedin)
                                        <li class="mb-2">
                                            <strong>LinkedIn:</strong>
                                            <a href="{{ $profile->linkedin }}" target="_blank">{{ $profile->linkedin }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @else
                        <p>Configura tu perfil desde el panel de administración para mostrar datos de contacto.</p>
                    @endif
                </div>
            </div>

        </div>
    </section>

@endsection
