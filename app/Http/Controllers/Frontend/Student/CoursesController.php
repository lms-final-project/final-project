<?php

namespace App\Http\Controllers\Frontend\Student;



use App\Models\User;
use App\Models\Course;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\AssignmentStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function registered_courses()
    {

        $registered_courses=auth()->user()->courses;

        return view('frontend.student.panel.courses.index',compact('registered_courses'));

    }
    public function zoom_index(Course $course){
        $ZoomLinks=$course->links()->get();
        return view('frontend.student.zoom',compact('course','ZoomLinks'));
    }

    public function upload_solution(Request $request,$assignment_id){
        if($request->hasFile('solution')){
            $filefile = $request->file('solution');
            $pathfile = $filefile->store('students/solution/assignments' , 'public');
        }
        $validated = $request->validate([
            'solution' => 'required',

        ]);
        $student = AssignmentStudent::where('student_id', Auth::user()->id)
                                    ->where('assignment_id' , $assignment_id)->first();

        $student->update([
        'solution_file'=>$pathfile,
        'status'=>'completed',
      ]);
      $students  = Assignment::find($assignment_id)->users()->pluck('student_id')->get();
      dd($students);
      return redirect()->back()->with('success', 'Solution submitted successfully',);
    }
}
