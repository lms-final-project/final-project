<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::prefix('dashboard')->as('dashboard.')->middleware(['checkAdmin:admin' , 'auth'])->group( function() {
    Route::get('/',[DashboardController::class , 'index'] )->name('home');
    // Users routes
    Route::resource('/users' , UserController::class);
    // Categories routes
    Route::resource('/category' , CategoryController::class);
    // About routes
    Route::resource('/about' , AboutController::class);
    // Service routes
    Route::resource('/service' , ServiceController::class);
    // Courses routes
    Route::get('courses' , [CourseController::class , 'index'])->name('courses');
});