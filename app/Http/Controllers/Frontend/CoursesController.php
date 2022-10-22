<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index(Category $category){

        $courses = Course::category($category->id)->status('accepted')->with('type')->get();
        return view('frontend.courses' , compact('category', 'courses'));
    }

}
