<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $allcourses=Course::all();
        return view('frontend.instructor.panel.index',compact('allcourses'));
    }
}
