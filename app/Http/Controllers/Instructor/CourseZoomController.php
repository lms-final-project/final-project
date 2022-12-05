<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Course;
use App\Models\CourseZoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateZoomRequest;

class CourseZoomController extends Controller
{
    public function index(Course $course){
        $ZoomLinks=$course->links()->get();
        return view('frontend.instructor.panel.Zoom.index',compact('course','ZoomLinks'));
    }

    public function create(Course $course){
           return view('frontend.instructor.panel.Zoom.create',compact('course'));
           }
    public function store(Request $request,Course $course){

            $validated = $request->validate([

                'date'             => ['required' , 'date','date_format:Y-m-d'],
                'zoom_link'        => ['required' ],
            ]);
            CourseZoom::create([
                'course_id'    => $course->id,
                'date'         => $request->date,
                'zoom_link'    => $request->zoom_link,

            ]);
            $ZoomLinks=$course->links()->get();
            return redirect()->route('indexZoom',['course'=>$course->id])->with('success', 'Meeting created successfully','course','ZoomLinks');
            }

    public function edit(CourseZoom $link){

                $course=$link->course->get();
                return view('frontend.instructor.panel.zoom.edit',compact('link','course'));
           }

    public function update(Request $request,CourseZoom $link){

        $link->update([

            'date'      =>  $request->date,
            'zoom_link' =>$request->zoom_link,]);

          $course=$link->course->get();
          return redirect()->route('indexZoom',['course'=>$link->course_id])->with('success', 'Meeting updated successfully','course','Link');
        }
    public function deleteZoom(CourseZoom $link)
    {
        $link->delete();
        return redirect()->route('indexZoom',['course'=>$link->course_id])->with('danger' , 'Meeting deleted!');
    }

}
