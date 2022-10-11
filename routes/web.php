<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Instructor\CoursesController;
use App\Http\Controllers\Instructor\DashboardController;

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

// ==== Dashboard Routes ====
Route::middleware(['checkAuth:admin' , 'auth'])->group( function() {
    Route::get('/dashboard', function () {
        return view('dashboard.Home');
    })->name('dashboard');
    Route::resource('dashboard/category' , CategoryController::class);
    Route::resource('dashboard/about' , AboutController::class);
});



// ==== Frontend Routes ====
Route::middleware('checkAdmin:instructor|student')->group(function(){
        Route::get('/', [ HomeController::class , 'index' ])->name('home');

        // Instructor Routes
        Route::get('instructor/panel' , [DashboardController::class , 'index'])->name('instructor.panel');
        Route::resource('instructor/courses'  , CoursesController::class);

});


require __DIR__.'/auth.php';
