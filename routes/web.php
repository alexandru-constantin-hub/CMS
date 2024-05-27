<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContentController;
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

Route::controller(ContentController::class)->group(function () {
    Route::get('/content', 'index')->name('content.index');
    Route::get('/content/{content}', 'show')->name('content.show');
    Route::post('/content', 'store')->name('content.store');
    Route::get('/content/{content}/edit', 'edit')->name('content.edit');
    Route::patch('/content/{content}', 'update')->name('content.update');
    Route::delete('/content/{content}', 'destroy')->name('content.destroy');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/content', [ContentController::class, 'index'])->name('content.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
