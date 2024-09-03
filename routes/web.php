<?php

use App\Http\Controllers\DataGovController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/datagov',[DataGovController::class,'index']);
Route::post('/datagov/ajaxLoadDataRail',[DataGovController::class,'ajaxLoadDataRail'])->name('datagov.ajaxLoadDataRail');
