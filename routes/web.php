<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::resource('items', ItemController::class);
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');

