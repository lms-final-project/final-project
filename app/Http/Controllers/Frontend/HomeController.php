<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Icon;
use App\Models\About;
use App\Models\Course;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::withCount([
                    'courses' => function($q){
                        $q->where('status' , 'accepted');
                    }])->with('icon')->get()->where('courses_count' , '>' , 0);

        $courses    = Course::status()->with('type')->get();
        $about      = About::orderBy('created_at', 'DESC')->take(4)->get();
        $services   = Service::all();
        return view('frontend.index',compact('categories','about','courses','services'));
    }
}
