<?php

use App\Http\Controllers\AuthAPI;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Retrieves the authenticated user's information
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// CRUD operations for tasks, accessible only to authenticated users
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});

// Registers a new user
Route::post('/register', [AuthAPI::class, 'create']);

// Logs in an existing user
Route::post('/login', [AuthAPI::class, 'login']);

// Logs out the authenticated user
Route::post('/logout', [AuthAPI::class, 'destroy'])->middleware('auth:sanctum');
