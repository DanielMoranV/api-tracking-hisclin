<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\ClinicHistoryController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

Route::group([
    'middleware' => ['api'],
    'prefix' => 'roles'
], function () {
    Route::get('/', [UserRoleController::class, 'getRoles']);
    Route::put('/user/role', [UserRoleController::class, 'assignRole']);
    Route::delete('/user/role', [UserRoleController::class, 'removeRole']);
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/users-with-roles', [UserController::class, 'getUsersWithRoles'])->middleware('role:archivo|dev');
    Route::get('/user/{id}/roles', [UserController::class, 'getUserRoles']);
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});


Route::group(['prefix' => 'trackings'], function () {
    Route::get('/', [TrackingController::class, 'index']);
    Route::post('/', [TrackingController::class, 'store']);
    Route::get('/{id}', [TrackingController::class, 'show']);
    Route::put('/{id}', [TrackingController::class, 'update']);
    Route::delete('/{id}', [TrackingController::class, 'destroy']);
});

Route::group(['prefix' => 'clinic-histories'], function () {
    Route::get('/', [ClinicHistoryController::class, 'index']);
    Route::post('/', [ClinicHistoryController::class, 'store']);
    Route::get('/{id}', [ClinicHistoryController::class, 'show']);
    Route::put('/{id}', [ClinicHistoryController::class, 'update']);
    Route::delete('/{id}', [ClinicHistoryController::class, 'destroy']);
});
