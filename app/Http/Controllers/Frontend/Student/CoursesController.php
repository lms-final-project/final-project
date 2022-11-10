<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with('type')->get();
        return view('frontend.student.panel.courses.index',compact('courses'));
    }
}
