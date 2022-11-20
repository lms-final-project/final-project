<?php

namespace App\Http\Controllers\Frontend\Student;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function registered_courses()
    {

        $registered_courses=auth()->user()->courses;

        return view('frontend.student.panel.courses.index',compact('registered_courses'));

    }
}
