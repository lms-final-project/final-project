<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

     return view('frontend.student.panel.index');}
}
