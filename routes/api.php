<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/cars', [CarController::class, "index"]);
Route::get('/cars/{id}', [CarController::class, "show"]);
Route::post('/cars', [CarController::class, "store"]);
Route::delete('/cars/{id}', [CarController::class, "destroy"]);
Route::put('/cars/{id}', [CarController::class, "update"]);
