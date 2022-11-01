<?php

namespace App\Http\Controllers\Frontend;

use instructor;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\InstructorDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index(Category $category){

        $courses = Course::with('type')->category($category->id)->status('accepted')->get();
        return view('frontend.courses' , compact('category', 'courses'));
    }

    public function show(Course $course){
        $id=$course->instructor->id;

        $courses = Course::with('type')->category($course->category_id )->status('accepted')->get();
       //dd($course->instructor->instructor_details);
        return view('frontend.course_details' , compact('course','courses'));
    }

}
