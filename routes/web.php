<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLevelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware("auth")->name('home');

// User
Route::get('/user', [UserController::class, 'index'])->middleware('auth')->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->middleware('auth')->name('user.create');
Route::get('/user/{user}', [UserController::class, 'show'])->middleware('auth')->name('user.show');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');

// Role
Route::get('/role', [RoleController::class, 'index'])->middleware('auth')->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->middleware('auth')->name('role.create');
Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->middleware('auth')->name('role.edit');

// Permission
Route::get('/permission', [PermissionController::class, 'index'])->middleware('auth')->name('permission.index');
Route::get('/permission/create', [PermissionController::class, 'create'])->middleware('auth')->name('permission.create');
Route::get('/permission/{permission}/edit', [PermissionController::class, 'edit'])->middleware('auth')->name('permission.edit');

// User Level
Route::get('/user-level', [UserLevelController::class, 'index'])->middleware('auth')->name('user-level.index');

// Branch
Route::get('/branch', [BranchController::class, 'index'])->middleware('auth')->name('branch.index');

// Department
Route::get('/department', [DepartmentController::class, 'index'])->middleware('auth')->name('department.index');

// Province
Route::get('/province', [ProvinceController::class, 'index'])->middleware('auth')->name('province.index');
Route::get('/province/create', [ProvinceController::class, 'create'])->middleware('auth')->name('province.create');
Route::get('/province/{province}', [ProvinceController::class, 'show'])->middleware('auth')->name('province.show');
Route::get('/province/{province}/edit', [ProvinceController::class, 'edit'])->middleware('auth')->name('province.edit');

// District
Route::get('/province/{province}/district/create', [DistrictController::class, 'create'])->middleware('auth')->name('province-district.create');
Route::get('/district/{district}', [DistrictController::class, 'show'])->middleware('auth')->name('district.show');
Route::get('/district/{district}/edit', [DistrictController::class, 'edit'])->middleware('auth')->name('district.edit');

// Commune
Route::get('/commune/{commune}', [CommuneController::class, 'show'])->middleware('auth')->name('commune.show');

// Auth
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
