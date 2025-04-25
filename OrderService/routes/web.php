<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => redirect('/login'));

Auth::routes();

Route::get('/home', fn() => redirect('/form'))->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/form', [OrderController::class, 'showForm']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);
});
