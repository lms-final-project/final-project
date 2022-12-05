<?php

namespace App\Http\Controllers\Instructor;

use Exception;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseDays;
use App\Models\CourseType;
use App\Models\CourseUser;
use App\Models\CourseTopic;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Courses\CreateCourseRequest;
use App\Http\Requests\Courses\UpdateCourseRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::owner(Auth::user()->id)->with('type')->get();
        return view('frontend.instructor.panel.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = CourseType::all();
        $categories = Category::all();
        $daysOfCourse=CourseDays::all();
        return view('frontend.instructor.panel.courses.create', compact('types','categories','daysOfCourse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        DB::beginTransaction();
        try{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $path = $file->store('instructors/courses' , 'public');
            }
            if($request->hasFile('file')){
                $filefile = $request->file('file');
                $pathfile = $filefile->store('instructors/courses/files' , 'public');
            }

            $course = Course::create([
                'image'                 => $path,
                'file'                  => $pathfile ?? null,
                'title'                 => $request->title,
                'description'           => $request->description,
                'is_free'               => $request->boolean('is_free'),
                'price'                 => $request->price,
                'price_after_discount'  => $request->price_after_discount,
                'has_certificate'       => $request->boolean('has_certificate'),
                'certification'         => $request->certification,
                'course_type_id'        => $request->course_type_id,
                'category_id'           => $request->category_id,
                'days_id'               =>$request->days_id,
                'start_date'            =>$request->start_date,
                'end_date'              =>$request->end_date,
                'start_time'            =>$request->start_time,
                'end_time'            =>$request->end_time,
                'instructor_id'         => auth()->user()->id
            ]);

            // To Register The Instructor Directly
            CourseUser::create([
                'user_id'   => auth()->user()->id,
                'course_id' => $course->id,
            ]);

            // For Topics
            if($request->topics){
                foreach($request->topics as $topic){
                    CourseTopic::create([
                        'course_id' => $course->id,
                        'topic'     => $topic
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('courses.index')->with('success' , 'Course added succesffully');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->with('error' , 'Something went wrong!');
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
    public function edit($id)
    {
        $course = Course::with('topics')->find($id);
        $types = CourseType::all();
        $categories = Category::all();
        $daysOfCourse=CourseDays::all();
        return view('frontend.instructor.panel.courses.edit',compact('types','categories','course','daysOfCourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)

    {

        DB::beginTransaction();
        try{
           // $decrypted = Crypt::decryptString($course->courseFile);
           // dd($decrypted);
            $old_image = $course->image;
            $old_file=$course->courseFile;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $path = $file->store('instructors/courses' , 'public');
            }
            if($request->hasFile('courseFile')){
                $filefile = $request->file('courseFile');
                $pathfile = $filefile->store('instructors/courses' , 'public');
            }

            $course->update([
                'image'                 => $path ?? $old_image,
                'file'                 => $pathfile ?? $old_file,
                'title'                 => $request->title,
                'description'           => $request->description,
                'is_free'               => $request->boolean('is_free'),
                'price'                 => $request->price,
                'price_after_discount'  => $request->price_after_discount,
                'has_certificate'       => $request->boolean('has_certificate'),
                'certification'         => $request->certification,
                'course_type_id'        => $request->course_type_id,
                'category_id'           => $request->category_id,
                'days_id'               =>$request->days_id,
                'start_date'            =>$request->start_date,
                'end_date'              =>$request->end_date,
                'start_time'                  =>$request->start_time,
                'end_time'                  =>$request->end_time,
            ]);

            if($old_image && $request->hasFile('image')){
                Storage::disk('public')->delete($old_image);
            }


            if($request->topics){
                $course->topics()->delete();

                foreach($request->topics as $topic){
                    CourseTopic::create([
                        'course_id' => $course->id,
                        'topic'     => $topic
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('courses.index')->with('success' , 'Course updated successfully.');

            }catch(Exception $e){
                Log::info($e->getMessage());
                return redirect()->back()->with('error' , 'Something went wrong!');
            }


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {

        $course->delete();
        return redirect()->back()->with('danger' , 'Course deleted!');

    }
}
