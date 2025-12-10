<x-guest-layout>

    {{-- Estado de sesión (mensajes tipo: contraseña restablecida, etc.) --}}
    @if (session('status'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="text-center mb-4">
        <div class="mb-2">
            {{-- Pequeño “logo” circular, opcional --}}
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                 style="width: 56px; height: 56px; font-size: 1.6rem;">
                <span class="fw-bold">P</span>
            </div>
        </div>
        <h1 class="h4 mb-1">Iniciar sesión</h1>
        <p class="text-muted small mb-0">
            Acceso al panel de administración de tu portafolio.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
        @csrf

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   autocomplete="username">
            @error('email')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password"
                   class="form-control @error('password') is-invalid @enderror"
                   type="password"
                   name="password"
                   required
                   autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Remember me + enlace recuperar --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input id="remember_me"
                       type="checkbox"
                       class="form-check-input"
                       name="remember">
                <label class="form-check-label small" for="remember_me">
                    Recordarme
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="small" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        {{-- Botón --}}
        <button type="submit" class="btn btn-primary w-100">
            Iniciar sesión
        </button>
    </form>

    {{-- Enlace a registro --}}
    @if (Route::has('register'))
        <div class="mt-4 text-center small">
            ¿Aún no tienes cuenta?
            <a href="{{ route('register') }}">Crear una cuenta</a>
        </div>
    @endif

</x-guest-layout>
