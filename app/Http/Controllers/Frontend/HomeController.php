<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Icon;
use App\Models\User;
use App\Models\About;
use App\Models\Course;
use App\Models\Service;
use App\Models\Category;
use App\Models\Feedback;
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

        $courses    = Course::status()->with('type')->take(6)->get();
        $about      = About::orderBy('created_at', 'DESC')->take(4)->get();
        $services   = Service::all();
        $feedbacks=Feedback::with('user')->orderBy('created_at', 'DESC')->take(6)->get();
        $instructors=User::where('role_id','=', 2)->count();
        $studentEnrolled=User::with('courses')->where('role_id','=',3)->get();
        return view('frontend.index',compact('categories','about','courses','services','feedbacks','instructors','studentEnrolled'));
    }
}
