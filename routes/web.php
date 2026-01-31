<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DenahController;
use App\Http\Controllers\Admin\RumahController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{berita:slug}', [HomeController::class, 'showBerita'])->name('berita.show');

// Admin Routes (Protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Berita Management
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);
    
    // Denah Management
    Route::resource('denah', DenahController::class);
    
    // Rumah Management
    Route::resource('rumah', RumahController::class);
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
