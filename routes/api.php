<?php

use App\Http\Controllers\V1\Role\RoleController;
use App\Http\Controllers\V1\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('user', UserController::class);
Route::delete('/user/{id}/image',[UserController::class,'deletedImage']);
// Route::get('/user/{uuid}',[UserController::class,'indexByUUID']);
Route::put('/user/{uuid}/edit',[UserController::class,'updateByUUID']);
Route::delete('/user/{uuid}/delete',[UserController::class,'deleteByUUID']);
Route::get('/users', [UserController::class, 'index']);
