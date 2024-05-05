<?php

use App\Livewire\admin\UserController;
use App\Livewire\forms\search;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('about', 'about')->name('about');

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/users', UserController::class)->name('users');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/search', Search::class)->name('search');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
