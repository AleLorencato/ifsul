<?php
use App\Models\carro;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MotoController;

Route::get('/', function () {
    return view('welcome');
});

// Carros Routes
Route::get('/carros', [CarroController::class, 'index']);
Route::get('/carros/form', function () {
    return view('form');
});
Route::get('/carros/{id}', [CarroController::class, 'show']);
Route::post('/carros', [CarroController::class, 'create']);
Route::get('/carros/{id}/edit', [CarroController::class, 'edit'])->name('edit');
Route::post('/carros/{id}/update', [CarroController::class, 'update'])->name('update');
Route::get('/carros/{id}/destroy', [CarroController::class, 'destroy'])->name('destroy');

// Users Routes
Route::get('/users', [UsuarioController::class, 'index']);
Route::get('/users/form', function () {
    return view('form');
});
Route::get('/users/{id}', [UsuarioController::class, 'show']);
Route::post('/users', [UsuarioController::class, 'create']);
Route::get('/users/{id}/edit', [UsuarioController::class, 'edit'])->name('edit');
Route::post('/users/{id}/update', [UsuarioController::class, 'update'])->name('update');
Route::get('/users/{id}/destroy', [UsuarioController::class, 'destroy'])->name('destroy');

// Motos Routes
Route::get('/motos', [MotoController::class, 'index']);
Route::get('/motos/form', function () {
    return view('form');
});
Route::get('/motos/{id}', [MotoController::class, 'show']);
Route::post('/motos', [MotoController::class, 'create']);
Route::get('/motos/{id}/edit', [MotoController::class, 'edit'])->name('edit');
Route::post('/motos/{id}/update', [MotoController::class, 'update'])->name('update');
Route::get('/motos/{id}/destroy', [MotoController::class, 'destroy'])->name('destroy');