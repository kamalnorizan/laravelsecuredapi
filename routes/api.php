<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::middleware(['auth:api'])->group(function () {
    Route::get('/getallusers', [UserController::class,'getallusers']);
    Route::get('/getuser/{user}', [UserController::class,'getuser']);
});

