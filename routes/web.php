<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',  [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::prefix('posts')->group(function () {
    Route::get('/create', [dashboardController::class, 'create'])->name('posts.create'); 
    Route::post('/store', [dashboardController::class, 'store'])->name('posts.store'); 
    Route::get('/edit/{id}', [dashboardController::class, 'edit'])->name('posts.edit');
    Route::post('/update/{id}', [dashboardController::class, 'update'])->name('posts.update');
    Route::get('/{id}', [dashboardController::class, 'destroy'])->name('posts.destroy');
    Route::get('view/{id}', [dashboardController::class, 'view'])->name('posts.view');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
