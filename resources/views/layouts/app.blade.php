<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portafolio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('portfolio.index') }}">Mi Portafolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPublic">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarPublic">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="#inicio" class="nav-link">Inicio</a></li>
                <li class="nav-item"><a href="#sobre-mi" class="nav-link">Sobre mí</a></li>
                <li class="nav-item"><a href="#habilidades" class="nav-link">Habilidades</a></li>
                <li class="nav-item"><a href="#proyectos" class="nav-link">Proyectos</a></li>
                <li class="nav-item"><a href="#contacto" class="nav-link">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="main-bg">
    @yield('content')
</main>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <small>&copy; {{ date('Y') }} - Portafolio personal</small>
</footer>

</body>
</html>
