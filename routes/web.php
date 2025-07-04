<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubBranchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

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

// Branch
Route::get('/branch', [BranchController::class, 'index'])->middleware('auth')->name('branch.index');
Route::get('/branch/create', [BranchController::class, 'create'])->middleware('auth')->name('branch.create');
Route::get('/branch/{branch}', [BranchController::class, 'show'])->middleware('auth')->name('branch.show');
Route::get('/branch/{branch}/edit', [BranchController::class, 'edit'])->middleware('auth')->name('branch.edit');

// Sub-Branch
Route::get('/branch/{branch}/sub-branch/create', [SubBranchController::class, 'create'])->middleware('auth')->name('sub-branch.create');
Route::get('/sub-branch/{sub_branch}', [SubBranchController::class, 'show'])->middleware('auth')->name('sub-branch.show');
Route::get('/sub-branch/{sub_branch}/edit', [SubBranchController::class, 'edit'])->middleware('auth')->name('sub-branch.edit');

// Group
Route::get('/sub-branch/{sub_branch}/group/create', [GroupController::class, 'create'])->middleware('auth')->name('group.create');
Route::get('/group/{group}/edit', [GroupController::class, 'edit'])->middleware('auth')->name('group.edit');

// Department
Route::get('/department', [DepartmentController::class, 'index'])->middleware('auth')->name('department.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->middleware('auth')->name('department.create');
Route::get('/department/{department}', [DepartmentController::class, 'show'])->middleware('auth')->name('department.show');
Route::get('/department/{department}/edit', [DepartmentController::class, 'edit'])->middleware('auth')->name('department.edit');

// Office
Route::get('/department/{department}/office/create', [OfficeController::class, 'create'])->middleware('auth')->name('office.create');
Route::get('/office/{office}/edit', [OfficeController::class, 'edit'])->middleware('auth')->name('office.edit');

// Employee
Route::get('/employee', [EmployeeController::class, 'index'])->middleware('auth')->name('employee.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->middleware('auth')->name('employee.create');
Route::get('/employee/{employee_id}', [EmployeeController::class, 'show'])->middleware('auth')->name('employee.show');
Route::get('/employee/{employee_id}/edit', [EmployeeController::class, 'edit'])->middleware('auth')->name('employee.edit');
Route::get('/employee/{employee_id}/position/create', [EmployeeController::class, 'createPosition'])->middleware('auth')->name('employee.position.create');
Route::get('/employee/{employee_id}/position/{employee_position_id}/edit', [EmployeeController::class, 'editPosition'])->middleware('auth')->name('employee.position.edit');
Route::get('/employee/{employee_id}/position/swap', [EmployeeController::class, 'swapPosition'])->middleware('auth')->name('employee.position.swap');

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
Route::get('/district/{district}/commune/create', [CommuneController::class, 'create'])->middleware('auth')->name('district-commune.create');
Route::get('/commune/{commune}', [CommuneController::class, 'show'])->middleware('auth')->name('commune.show');
Route::get('/commune/{commune}/edit', [CommuneController::class, 'edit'])->middleware('auth')->name('commune.edit');

// Village
Route::get('/commune/{commune}/village/create', [VillageController::class, 'create'])->middleware('auth')->name('village.create');
Route::get('/village/{village}/edit', [VillageController::class, 'edit'])->middleware('auth')->name('village.edit');

// Auth
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
