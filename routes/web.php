<?php

use App\Http\Controllers\DataGovController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/datagov',[DataGovController::class,'index']);
Route::post('/datagov/ajaxLoadDataRail',[DataGovController::class,'ajaxLoadDataRail'])->name('datagov.ajaxLoadDataRail');


Route::post('/payment/create', [PaymentController::class, 'createBill'])->name('payment.create');
Route::get('/payment/status/{billCode}', [PaymentController::class, 'checkBill'])->name('payment.status');


Route::get('/test-payment', [PaymentController::class, 'testPayment']);