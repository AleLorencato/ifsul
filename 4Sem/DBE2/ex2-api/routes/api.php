<?php

use App\Http\Controllers\Api\CarroController;
use App\Http\Controllers\Api\MotoController;
use App\Http\Controllers\Api\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('carros', CarroController::class);

Route::apiResource('motos', MotoController::class);

Route::apiResource('users', UserController::class);
