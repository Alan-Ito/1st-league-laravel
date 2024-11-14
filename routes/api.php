<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/players', [PlayerController::class, 'index']);

Route::get('/team', action: [TeamController::class, 'get']);
Route::get('/teams', action: [TeamController::class, 'getAll']);

Route::get('/commentary', action: [TeamController::class, 'getRandomCommentary']);
