<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('index');

    Route::post('/login', [LoginController::class, 'store'])->name('login.process');
    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/artikel/search', [ArtikelController::class, 'searchWord'])->name('artikel.search');
    Route::get('/artikel/replace', [ArtikelController::class, 'replaceWord'])->name('artikel.replace');
    Route::get('/artikel/sort', [ArtikelController::class, 'sortWords'])->name('artikel.sort');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DataPegawaiController::class, [
        'names' => [
            'index' => 'dashboard',
            'create' => 'tambahdata',
            'store' => 'tambahdata.store',
            'show' => 'show',
            'edit' => 'edit',
            'update' => 'update',
            'destroy' => 'destroy',
        ]
    ]);

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
