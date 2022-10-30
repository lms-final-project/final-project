<?php

namespace App\Http\Controllers\Frontend;

use instructor;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Instructor_Details;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index(Category $category){

        $courses = Course::with('type')->category($category->id)->status('accepted')->get();
        return view('frontend.courses' , compact('category', 'courses'));
    }

    public function show(Course $course){

$id=$course->iinstructor->id;
//dd($id);
       // $instructor_detailes=instructor_Details::instructor($id)->get();
//dd($course->iinstructor->id);
$instructor_detailes=instructor_Details::where('instructor_id',$id)->get();
$courses = Course::with('type')->category($course->category_id )->status('accepted')->get();
//dd($instructor_detailes);
        return view('frontend.course_details' , compact('course','instructor_detailes','courses'));
    }

}
