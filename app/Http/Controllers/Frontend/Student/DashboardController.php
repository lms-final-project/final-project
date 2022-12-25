<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(){

    $registered_courses=auth()->user()->courses;
     return view('frontend.student.panel.index',compact('registered_courses'));

    }

     public function update(User $student){
          $student->update([
            'requestTo_instructor' =>true,
          ]);
          return redirect()->route('student.panel')->with('success','Request to be instructor send to admin');
     }

     
}
