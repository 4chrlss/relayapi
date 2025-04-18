<?php

use App\Http\Controllers\Api\RelayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RelayGroupController;

Route::apiResource('relay', RelayController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::patch('/relay/toggle/{id}', [RelayController::class, 'toggleRelay']);
Route::patch('/relay/withtoggleRelayTimer/{id}', [RelayController::class, 'withtoggleRelayTimer']);

Route::post('/relay-groups', [RelayGroupController::class, 'create']);
Route::post('/relay-groups/{id}/toggle', [RelayGroupController::class, 'toggle']);
Route::get('/relay-groups', [RelayGroupController::class, 'list']);