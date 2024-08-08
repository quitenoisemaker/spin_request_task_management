<?php

use App\Http\Controllers\TaskManagerController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('authenticate', [UserAuthController::class, 'authenticateUser']);
Route::apiResource('tasks', TaskManagerController::class)->middleware('auth:api');
