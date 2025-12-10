<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Portafolio') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

<div class="min-vh-100 d-flex align-items-center justify-content-center">
    <div class="auth-card card shadow-sm border-0">
        <div class="card-body">
            <div class="text-center mb-4">
                <h1 class="h4 mb-0">Panel de administración</h1>
                <p class="text-muted small mb-0">Acceso a la gestión del portafolio</p>
            </div>

            {{ $slot }}
        </div>
    </div>
</div>

</body>
</html>
