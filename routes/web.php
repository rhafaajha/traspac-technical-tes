<?php

use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('/login', [LoginController::class, 'store'])->name('login.process');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DataPegawaiController::class, 'index'])->name('dashboard');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
