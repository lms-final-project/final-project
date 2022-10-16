<?php

use Illuminate\Support\Facades\Route;

Route::prefix('student')->middleware('checkStudent:student')->group(function(){
    //
});
