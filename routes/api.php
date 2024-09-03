<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', [AuthApiController::class,'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/getallusers', [UserController::class,'getallusers']);
    Route::get('/getuser/{user}', [UserController::class,'getuser']);
});

