<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\TaskApiController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::get('/books', fn () => response()->json([
    'livres' => Book::latest()->get(),
]));

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthApiController::class, 'me']);
    Route::post('/logout', [AuthApiController::class, 'logout']);

    Route::name('api.')->group(function () {
        Route::apiResource('tasks', TaskApiController::class);
    });
});
