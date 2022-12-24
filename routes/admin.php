<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ZoomController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CertificateController;

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
    //Payment route
    Route::get('all_payments' , [PaymentController::class , 'index'])->name('all_payments');
    //Zoom route
    Route::get('all_zoom_meeting' , [ZoomController::class , 'index'])->name('all_zoom_meeting');
    //Certifcate route
    Route::get('all_certificate' , [CertificateController::class , 'certificate'])->name('all_certificate');
    Route::post('accept_certificate/{certificate}' , [CertificateController::class , 'accept_certificate'])->name('accept_certificate');
    Route::post('reject_certificate/{certificate}' , [CertificateController::class , 'reject_certificate'])->name('reject_certificate');

});
