<?php

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CoursesController;

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




// ==== Dashboard Routes ====
require __DIR__.'/admin.php';


// ==== Frontend Routes ====
require __DIR__.'/instructor.php';
require __DIR__.'/student.php';


require __DIR__.'/auth.php';
