<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Models\AssignmentStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignmentAssessmentController extends Controller
{
    public function index($id){
        $AllStudent=AssignmentStudent::where('user_id','!=',Auth::user()->id)->where('assignment_id','=',$id)->get();
        return view('frontend.instructor.panel.AssignmentAssessment.index',compact('AllStudent'));
    }

    public function pass( Request $request,$assignment){
      $Assignment=AssignmentStudent::where('user_id','=',$request->user_id)->where('assignment_id','=',$assignment)->first();
      
       $Assignment->update([
        'assessment'=>'pass',
       ]);
       return redirect()->route('Assessment',$assignment);
    }

    public function fail( Request $request,$assignment){
        $Assignment=AssignmentStudent::where('user_id','=',$request->user_id)->where('assignment_id','=',$assignment)->first();
        
         $Assignment->update([
          'assessment'=>'fail',
         ]);
         return redirect()->route('Assessment',$assignment);
      }
   
}
