<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->prefix('admin')->group(function () {
    // User Management with Permissions
    Route::resource('/user-management', UserManagementController::class)
        ->parameters(['user-management' => 'user'])
        ->names('admin.users');

    // Role Management
    Route::resource('/roles', RoleController::class)->names('admin.roles');

    // Permission Management
    Route::resource('/permissions', PermissionController::class)->names('admin.permissions');
});
