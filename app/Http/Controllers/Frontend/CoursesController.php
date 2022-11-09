<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Course;
use App\Models\Category;

use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index(Category $category){

        $courses = Course::with('type')->category($category->id)->status('accepted')->get();
        return view('frontend.courses' , compact('category', 'courses'));
    }

    public function show(Course $course){

        $courses = Course::with('type')->category($course->category_id )->status('accepted')->get();
        $courseHeading=$course->courseHeadings;

        return view('frontend.course_details' , compact('course','courses','courseHeading'));
    }

    public function download($file){
        return response()->download(public_path('storage/'.$file));
    }

}
