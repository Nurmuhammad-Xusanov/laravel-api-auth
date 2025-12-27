<?php

use Illuminate\Support\Facades\Route;

Route::middleware('throttle:api')->group(function () {
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
        Route::apiResource('laptops', App\Http\Controllers\LaptopController::class);
    });
});
