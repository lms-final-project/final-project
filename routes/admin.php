<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::prefix('dashboard')->middleware(['checkAdmin:admin' , 'auth'])->group( function() {
    Route::get('/',[DashboardController::class , 'index'] )->name('dashboard');
    // Categories routes
    Route::resource('/category' , CategoryController::class);
    // About routes
    Route::resource('/about' , AboutController::class);
});
