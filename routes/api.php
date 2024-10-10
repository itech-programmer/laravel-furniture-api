<?php

use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'furniture', 'as' => 'furniture.'], function () {
    Route::get('/', [FurnitureController::class, 'index'])->name('index');
    Route::post('/', [FurnitureController::class, 'store'])->name('store');
    Route::get('/{id}', [FurnitureController::class, 'show'])->name('show');
    Route::put('/{id}', [FurnitureController::class, 'update'])->name('update');
    Route::delete('/{id}', [FurnitureController::class, 'destroy'])->name('destroy');
});
