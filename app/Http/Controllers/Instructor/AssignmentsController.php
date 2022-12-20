<?php

namespace App\Http\Controllers\Instructor;

use Exception;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentStudent;
use Carbon\Carbon;

class AssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $course = Course::find($request->course_id);
        $assignments = Assignment::where('course_id','=',$request->course_id)->get();
        return view('frontend.instructor.panel.assignments.index', compact('course','assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $course_id = $request->course_id;
        $instructor_id = $request->instructor_id;
        return view('frontend.instructor.panel.assignments.create' , compact('course_id' , 'instructor_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        DB::beginTransaction();
        try{
            if($request->hasFile('file')){
                $filefile = $request->file('file');
                $pathfile = $filefile->store('instructors/courses/assignments' , 'public');
            }

            $assignment = Assignment::create([
                'instructor_id' => $request->instructor_id,
                'course_id'     => $request->course_id,
                'grade'         => $request->grade,
                'description'   => $request->description,
                'title'         =>$request->title,
                'start_date'    => Carbon::parse($request->start_date) ,
                'end_date'      => Carbon::parse($request->end_date) ,
                'is_active'     => $request->boolean('is_active'),
                'file'          => $pathfile
            ]);

            $students  = Course::find($request->course_id)->users()->pluck('user_id')->toArray();
            foreach($students as $student){
                AssignmentStudent::create([
                    'user_id' => $student,
                    'assignment_id' => $assignment->id
                ]);
            }

            DB::commit();
            return redirect()->route('assignments.index',['course_id'=>$request->course_id])->with('success' , 'Assignment added succesffully');

        }catch(Exception $e){
            Log::info($e->getMessage());
            dd('something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($assignment_id)
    {

        $assignment=Assignment::findorfail($assignment_id);
        return view('frontend.instructor.panel.assignments.edit',compact('assignment') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Assignment_id)
    {
        DB::beginTransaction();
        try{
            $course=Course::find($request->course_id);
            $assignment=Assignment::findorfail($Assignment_id);
            $old_file=$assignment->file;
            if($request->hasFile('file')){
                $filefile = $request->file('file');
                $pathfile = $filefile->store('instructors/courses/assignments' , 'public');
            }

            $assignment->update([
                'grade'         => $request->grade,
                'description'   => $request->description,
                'title'         =>$request->title,
                'start_date'    => Carbon::parse($request->start_date) ,
                'end_date'      => Carbon::parse($request->end_date) ,
                'is_active'     => $request->boolean('is_active'),
                'file'          => $pathfile ?? $old_file
            ]);


            DB::commit();
            return redirect()->route('assignments.index',['course_id'=>$request->course_id])->with('success' , 'Assignment updated succesffully');
        }catch(Exception $e){
            Log::info($e->getMessage());
            dd('something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$assignment_id)
    {
        $assignment=Assignment::findorfail($assignment_id);
        $assignment->delete();
        return redirect()->back()->with('danger' , 'Assignment deleted!');
    }
}
