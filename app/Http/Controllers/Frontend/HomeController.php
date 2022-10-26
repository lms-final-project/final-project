<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Icon;
use App\Models\About;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::withCount('courses')->with('icon')->get();
        $courses=Course::withcount('topics')->status()->with('type')->get();
       // dd($courses);
        $about = About::orderBy('created_at', 'DESC')->take(4)->get();
        return view('frontend.index',compact('categories','about','courses'));
    }
}
