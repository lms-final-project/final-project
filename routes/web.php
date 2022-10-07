<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        return view('dashboard.layouts.app');
    })->name('dashboard');
});



// ==== Frontend Routes ====
    Route::controller(HomeController::class)->group( function(){
        Route::get('/', 'index');
    } );


require __DIR__.'/auth.php';
