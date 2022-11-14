<?php

use App\Http\Controllers\Instructor\CourseContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CoursesController;
use App\Http\Controllers\Instructor\CurriculumController;
use App\Http\Controllers\Instructor\ProfileController;
use App\Http\Controllers\Instructor\DashboardController;
use App\Models\CourseContent;

Route::prefix('instructor')->middleware('checkInstructor:instructor')->group(function(){
    Route::get('/panel' , [DashboardController::class , 'index'])->name('instructor.panel');
    Route::resource('/courses', CoursesController::class);
    // Profile Routes
    Route::get('/create/profile' , [ProfileController::class , 'create'])->name('create_profile');
    Route::post('/store/profile' , [ProfileController::class , 'store'])->name('store_profile');
    Route::get('/edit/profile' , [ProfileController::class , 'edit'])->name('edit_profile');
    Route::post('/updateprofile' , [ProfileController::class , 'update'])->name('update_profile');
    Route::get('/password',[ProfileController::class , 'password'])->name('password');
    Route::post('/change_password',[ProfileController::class , 'change_password'])->name('change_passwordd');

    Route::resource('curriculum' , CurriculumController::class);
    Route::resource('course/heading-content' , CourseContentController::class);
    Route::post('/courses/content/{content}/add-link' , [CourseContentController::class , 'addLink'])->name('content.add_link');
});
