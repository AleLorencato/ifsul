<?php
use App\Models\carro;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/carros', [CarroController::class, 'index']);

Route::get('/carros/form', function () {
    return view('form');
});

Route::get('/carros/{id}', [CarroController::class, 'show']);



Route::post('/carros', [CarroController::class, 'create']);


