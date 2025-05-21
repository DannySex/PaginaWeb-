<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeliculaController;

// Rutas login con middleware guest
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

// Rutas registro con middleware guest
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirige raíz
Route::get('/', function () {
    return auth()->check() ? redirect('/home') : redirect('/login');
});

// Rutas protegidas con auth
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('peliculas', PeliculaController::class);
});