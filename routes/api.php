<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Preset Data
Route::get('/family-situations', [DataController::class, 'getFamilySituations']);
Route::get('/genders', [DataController::class, 'getGenders']);
Route::get('/employee-statuses', [DataController::class, 'getEmployeeStatuses']);
Route::get('/provinces', [DataController::class, 'getProvinces']);
Route::get('/province/{province_id}/districts', [DataController::class, 'getDistricts']);
Route::get('/district/{district_id}/communes', [DataController::class, 'getCommunes']);
Route::get('/commune/{commune_id}/villages', [DataController::class, 'getVillages']);
Route::get('/branches', [DataController::class, 'getBranches']);
Route::get('/branch/{branch_id}/sub-branches', [DataController::class, 'getSubBranches']);

Route::get('/user', [UserController::class, 'show'])->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
