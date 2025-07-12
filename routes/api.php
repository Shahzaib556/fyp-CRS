<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CarController;

// Public routes
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
// Route::post('/reset-password', [AuthController::class, 'resetPassword']);

// // Protected routes (only authenticated users)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

//car routes
// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/cars', [CarController::class, 'index']);
//     Route::post('/cars', [CarController::class, 'store']);        // Add car
//     Route::get('/cars/{id}', [CarController::class, 'show']);      // Optional: view single car
//     Route::put('/cars/{id}', [CarController::class, 'update']);    // Update car
//     Route::delete('/cars/{id}', [CarController::class, 'destroy']); // Delete car
// });