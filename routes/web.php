<?php

use App\Livewire\admin\UserController;
use App\Http\Controllers\principalController;

use App\Livewire\forms\search;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('about', 'about')->name('about');
Route::controller(principalController::class)
    ->prefix('')
    ->as('')
    ->group(function () {
        Route::get('/iconos/{typeIcon?}', 'iconos')->name('iconos');
        // route::get('/testInput', 'testInput')->name('testInput');
        // route::get('/porDefinir', 'porDefinir')->name('porDefinir');
        // route::get('/todo', 'todo')->name('todo');
        route::get('/acercade', 'acercade')->name('acercade');
        route::get('/prueba', 'prueba')->name('prueba');
        // route::get('/contacto', 'contacto')->name('contacto');
        // route::post('/contacto', 'contacto')->name('contacto.enviar');

        // route::get('/direcciones', 'direcciones')->name('direcciones');

        // Route::get('/search', Search::class)->name('search');
        Route::get('/linkStorage', 'linkStorage')->name('linkStorage');
        Route::get('/readStorage', 'readStorage')->name('readStorage');
    });

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

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
