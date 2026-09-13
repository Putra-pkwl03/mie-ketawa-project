<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;

// 1. Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('landing');

// 2. Public News Routes (Taruh di LUAR auth middleware)
Route::get('/berita-list', [BeritaController::class, 'publicIndex'])->name('berita.public');
Route::get('/berita-detail/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// 3. Guest Routes (Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// 4. Authenticated Routes (Admin Panel)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BeritaController::class, 'dashboard'])->name('dashboard');
    
    // Resource route untuk Admin (CRUD Berita)
    Route::resource('berita', BeritaController::class)->except(['show']);
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::put('/profile/update', [LoginController::class, 'updateProfile'])->name('profile.update');
});