<?php

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CoursesController;
use App\Http\Controllers\Instructor\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ HomeController::class , 'index' ])->name('home');
Route::get('/courses/{category}', [CoursesController::class , 'index'])->name('front.courses');
Route::get('/course/{course}/details' , [CoursesController::class , 'show'])->name('course_details');
// instructor profile
Route::get('/profile/{id?}' , [ProfileController::class , 'index'])->name('instructor_profile');

Route::get('test' , function(){
    $data = [
        'facebook'  => 'facebook.com',
        'twitter'   => 'twitter.com',
        'linkedin'  => 'linkedin.com',
    ];
    // when store the data   => encode them
    $data = json_encode($data);
    // when restore the data => decode them
    $data = json_decode($data, true);


    dd($data['facebook']);
});




// ==== Dashboard Routes ====
require __DIR__.'/admin.php';


// ==== Frontend Routes ====
require __DIR__.'/instructor.php';
require __DIR__.'/student.php';


require __DIR__.'/auth.php';
