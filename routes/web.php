<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('soal1.login');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('user');
    Route::get('/table', [IndexController::class, 'getDataAjax'])->name('getDataAjax');

    Route::post('/login', [LoginController::class, 'store'])->name('login.process');
    Route::get('/login', [LoginController::class, 'index'])->name('login.login');
});

