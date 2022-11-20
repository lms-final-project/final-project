<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Course;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index(Category $category){

        $courses = Course::with('type')->category($category->id)->status('accepted')->get();
        return view('frontend.courses' , compact('category', 'courses'));
    }

    public function show($course_id){
        $course = Course::findOrFail($course_id);

        $courseHeading = $course->courseHeadings;
        $courses = Course::with('type')->category($course->category_id )->status('accepted')->get();
        $is_registered = false;
        if(Auth::user()){
           $registered_courses = [];
           foreach (auth()->user()->courses as $single_course) {
            $registered_courses[] = $single_course->id;
        }
        // dd(auth()->user()->courses);
        if(in_array($course->id , $registered_courses)){
            $is_registered = true;
        }

           return view('frontend.course_details' , compact('course','courses','courseHeading' , 'is_registered'));}

        else{
           return view('frontend.course_details' , compact('course','courses','courseHeading','is_registered' ));
           }
    }
    public function download($file){
        return response()->download(public_path('storage/'.$file));
    }

}
