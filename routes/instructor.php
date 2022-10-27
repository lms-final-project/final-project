<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CoursesController;
use App\Http\Controllers\Instructor\DashboardController;

Route::prefix('instructor')->middleware('checkInstructor:instructor')->group(function(){
    Route::get('/panel' , [DashboardController::class , 'index'])->name('instructor.panel');
    Route::resource('/courses', CoursesController::class);
    Route::post('/add_curriculum/{course}', [CoursesController::class,'add_curriculum' ])->name('courses.add_curriculum');
});
