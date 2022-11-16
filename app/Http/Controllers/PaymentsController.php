<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function freePayment($course_id){
        CourseUser::create([
            'user_id'   =>  auth()->user()->id,
            'course_id' =>  $course_id
        ]);
        return redirect()->back()->withSuccess('Course purchased successfully');
    }
}
