<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->middleware('guest');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('items.index');
    });

    Route::resource('items', ItemController::class)->except(['show']); // Tambahkan except('show') jika tidak memerlukan halaman detail
    
    // Tambahan route untuk menangani file download jika diperlukan
    Route::get('items/{item}/download', [ItemController::class, 'download'])->name('items.download');
});
