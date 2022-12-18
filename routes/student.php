<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\Student\CoursesController;
use App\Http\Controllers\Frontend\Student\FeedbackController;
use App\Http\Controllers\Frontend\Student\DashboardController;
use App\Http\Controllers\Frontend\Student\StudentProfileController;

Route::prefix('student')->middleware('checkStudent:student')->group(function(){
    Route::get('/panel' , [DashboardController::class , 'index'])->name('student.panel');
    Route::post('/panel/{student}' , [DashboardController::class , 'update'])->name('student.ToInstructor');
    Route::get('/courses' , [CoursesController::class , 'registered_courses'])->name('student.courses');
    Route::resource('/profile', StudentProfileController::class);
    Route::get('/password',[StudentProfileController::class , 'password'])->name('password');
    Route::post('/change_password',[StudentProfileController::class , 'change_password'])->name('change_password');
    Route::resource('/feedback', FeedbackController::class);
    Route::get('index/{course}', [CoursesController::class , 'zoom_index'])->name('Zoom');
    Route::post('solution/{assignment}', [CoursesController::class , 'upload_solution'])->name('upload_solution');
});
