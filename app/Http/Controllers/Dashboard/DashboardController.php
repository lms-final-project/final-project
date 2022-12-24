<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\About;
use App\Models\Course;
use App\Models\Service;
use App\Models\Category;
use App\Models\CourseUser;
use App\Models\CourseZoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $users_count = User::count();
        $course_count=Course::with('type')->status('accepted')->count();
        $category_count=Category::count();
        $services_count=Service::count();
        $generalQuestion_count=About::count();
        $student_enrolled=CourseUser::distinct('user_id')->count();
        $instructor_count=User::where('role_id','=',2)->count();
        $zoom_meeting_count=CourseZoom::count();
        return view('dashboard.Home' , compact('users_count','instructor_count','student_enrolled','course_count','category_count','zoom_meeting_count','services_count','generalQuestion_count'));
    }

    

}
