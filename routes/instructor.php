<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstructorDetailsController;
use App\Http\Controllers\Instructor\CoursesController;
use App\Http\Controllers\Instructor\DashboardController;

Route::prefix('instructor')->middleware('checkInstructor:instructor')->group(function(){
    Route::get('/panel' , [DashboardController::class , 'index'])->name('instructor.panel');
    Route::resource('/courses', CoursesController::class);
    Route::resource('/instrector_details', InstructorDetailsController::class);
    Route::get('/profile' , [ProfileController::class , 'edit'])->name('edit_profile');
    Route::patch('/updateprofile' , [ProfileController::class , 'update'])->name('update_profile');
    Route::get('/indexprofile' , [ProfileController::class , 'index'])->name('profile_index');
    Route::post('/add_curriculum/{course}', [CoursesController::class,'add_curriculum' ])->name('courses.add_curriculum');
});
