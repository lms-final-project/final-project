<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Dashboard\CategoryController;

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
    Route::resource('dashboard/Category' , CategoryController::class);
});



// ==== Frontend Routes ====
    Route::controller(HomeController::class)->group( function(){
        Route::get('/', 'index');
    } );


require __DIR__.'/auth.php';
