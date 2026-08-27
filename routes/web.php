<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CabanaController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Página principal
Route::get('/', function () {
    return view('welcome');
});


// Dashboard
Route::get('/dashboard', function () {

    $totalReservas = \App\Models\Reserva::count();
    $totalClientes = \App\Models\Cliente::count();
    $totalCabanas = \App\Models\Cabana::count();

    return view('dashboard', compact(
        'totalReservas',
        'totalClientes',
        'totalCabanas'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');


// Rutas protegidas
Route::middleware('auth')->group(function () {

    // Reservas
    Route::resource('reservas', ReservaController::class);

    // Clientes
    Route::resource('clientes', ClienteController::class);

    // Cabañas
    Route::resource('cabanas', CabanaController::class);

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// Autenticación
require __DIR__.'/auth.php';