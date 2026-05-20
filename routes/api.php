<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;
use Illuminate\Support\Facades\Auth;

Route::post('/token', function (Request $request) {
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    $token = $request->user()->createToken('api-token')->plainTextToken;
    return response()->json(['token' => $token]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::name('api.')->group(function () {
        Route::apiResource('tasks', TaskApiController::class);
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
