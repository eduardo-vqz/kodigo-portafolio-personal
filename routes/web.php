<?php

use Illuminate\Support\Facades\Route;

// Controladores públicos y administrativos
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

/*
|--------------------------------------------------------------------------
| Ruta "dashboard" requerida por Breeze
|--------------------------------------------------------------------------
|
| Breeze, después del login, redirige a la ruta llamada "dashboard".
| Aquí simplemente la redirigimos al panel de administración (/admin).
|
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Rutas del panel administrativo
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // CRUD Habilidades
    Route::resource('skills', SkillController::class);

    // CRUD Proyectos
    Route::resource('projects', ProjectController::class);

    // Edición del perfil
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Rutas de autenticación Breeze
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
