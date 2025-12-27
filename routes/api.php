<?php

use Illuminate\Support\Facades\Route;


Route::get('/health', App\Http\Controllers\HelathController::class)->middleware('throttle:30,1'); //health endpoint
Route::middleware('throttle:api')->group(function () { //api limter
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
        Route::apiResource('laptops', App\Http\Controllers\LaptopController::class);
    });
});
