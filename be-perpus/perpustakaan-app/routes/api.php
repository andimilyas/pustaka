<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\RoleController; 
use App\Http\Controllers\API\BookController; 
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BorrowController;
use Illuminate\Support\Facades\Route; 
 
Route::prefix('v1')->group(function () {
    Route::apiResource('books', BookController::class); 
    Route::apiResource('categories', CategoryController::class); 
    Route::apiResource('roles', RoleController::class); 
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api'); 
        Route::get('/me', [AuthController::class, 'getUser'])->middleware('auth:api'); 
    }); 
    Route::post('profile', [ProfileController::class, 'store'])->middleware('auth:api');
    Route::post('borrow', [BorrowController::class, 'store'])->middleware('auth:api');
    Route::get('get-borrow', [BorrowController::class, 'index'])->middleware('auth:api');
    // Route::get('get-profile', [ProfileController::class, 'index'])->middleware('auth:api');
    // Route::post('update-user', [AuthController::class, 'updateUser'])->middleware('auth:api'); 
});