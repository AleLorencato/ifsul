<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;

Route::get('/', function () {
    return view('welcome');

    // return 'Hello, World!';
});

Route::get('/carros', [CarroController::class, 'index']);


