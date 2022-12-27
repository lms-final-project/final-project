<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Frontend\Student\CoursesController;
use App\Http\Controllers\Frontend\Student\FeedbackController;
use App\Http\Controllers\Frontend\Student\DashboardController;
use App\Http\Controllers\Frontend\Student\CertificateController;
use App\Http\Controllers\Frontend\Student\StudentProfileController;

Route::prefix('student')->middleware('checkStudent:student|instructor')->group(function(){
    Route::get('/panel' , [DashboardController::class , 'index'])->name('student.panel');
    Route::get('/panel/{student}' , [DashboardController::class , 'update'])->name('student.ToInstructor');
    Route::get('/courses' , [CoursesController::class , 'registered_courses'])->name('student.courses');
    Route::get('/certificate' , [CertificateController::class , 'certificate'])->name('student.certificate');
    Route::get('/certificate_index' , [CertificateController::class , 'index_certificate'])->name('student.certificate.index');
    Route::post('/certificate_delete/{certificate}' , [CertificateController::class , 'delete_certificate'])->name('student.certificate.delete');
    Route::post('/print_certificate/{certificate}' , [CertificateController::class , 'print_certificate'])->name('student.certificate.print');

    Route::resource('/profile', StudentProfileController::class);
    Route::get('/password',[StudentProfileController::class , 'password'])->name('password');
    Route::post('/change_password',[StudentProfileController::class , 'change_password'])->name('change_password');
    Route::resource('/feedback', FeedbackController::class);
    Route::get('index/{course}', [CoursesController::class , 'zoom_index'])->name('Zoom');
    Route::post('solution/{assignment}', [CoursesController::class , 'upload_solution'])->name('upload_solution');
});
