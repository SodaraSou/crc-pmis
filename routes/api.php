<?php

use Illuminate\Support\Facades\Route;

Route::get('/user', [\App\Http\Controllers\Api\UserController::class, 'show'])->middleware('auth:sanctum');

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
