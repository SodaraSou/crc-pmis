<?php

use App\Http\Controllers\Api\DataController;
use Illuminate\Support\Facades\Route;

// Preset Data
Route::get('/branches', [DataController::class, 'getBranches']);
Route::get('/provinces', [DataController::class, 'getProvinces']);
Route::get('/province/{province_id}/districts', [DataController::class, 'getDistricts']);


Route::get('/user', [\App\Http\Controllers\Api\UserController::class, 'show'])->middleware('auth:sanctum');

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
