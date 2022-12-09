<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
class CourseController extends Controller
{
    public function index(){
        $courses=Course::all();
       // dd($courses);
        return view('dashboard.Courses.index',compact('courses'));
    }

    
}
