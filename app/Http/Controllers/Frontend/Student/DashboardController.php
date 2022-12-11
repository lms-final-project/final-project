<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

     return view('frontend.student.panel.index');}

     public function update(User $student){
          $student->update([
            'requestTo_instructor' =>true,
          ]);
          return redirect()->route('student.panel')->with('success','Request to be instructor send to admin');
     }
}
