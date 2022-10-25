<?php

namespace App\Http\Controllers\Instructor;

use Exception;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseType;
use App\Models\CourseTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    {$instructor_id=Auth::user()->id;
        $courses = Course::instructor($instructor_id)->with('type')->get();
       // dd($courses);
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
        return view('frontend.instructor.panel.courses.create', compact('types','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//you should use CreateCourceRequest instead Request
       // dd($request->all());
        DB::beginTransaction();
        try{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $path = $file->store('instructors/courses' , 'public');
            }

            $course = Course::create([
                'image'                 => $path,
                'title'                 => $request->title,
                'description'           => $request->description,
                'is_free'               => $request->boolean('is_free'),
                'price'                 => $request->price,
                'price_after_discount'  => $request->price_after_discount,
                'has_certificate'       => $request->boolean('has_certificate'),
                'certification'         => $request->certification,
                'course_type_id'        => $request->course_type_id,
                'category_id'           => $request->category_id,
                'instructor_id'         => auth()->user()->id
            ]);

            // todo : search about createMany
            if($request->topics){
                // $course->topics()->createMany($request->topics);

                foreach($request->topics as $topic){
                    CourseTopic::create([
                        'course_id' => $course->id,
                        'topic'     => $topic
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('courses.index');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back();
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
    public function edit(Course $course)
    {

        $types = CourseType::all();
        $categories = Category::all();

        return view('frontend.instructor.panel.courses.edit',compact('types','categories','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)

    {//you should use UpdateCourceRequest instead Request
       // dd($request->all());



//dd($course->topics()->delete());

       DB::beginTransaction();
        try{

          $old_image=$course->image;
          if($request->hasFile('image')){
            $file=$request->file('image');
            $path = $file->store('instructors/courses' , 'public');
          }
          if($old_image && $request->hasFile('image')){
            Storage::disk('public')->delete($old_image);
          }

          $course ->update([

            'title'                 => $request->title,
            'description'           => $request->description,
            'is_free'               => $request->boolean('is_free'),
            'price'                 => $request->price,
            'price_after_discount'  => $request->price_after_discount,
            'has_certificate'       => $request->boolean('has_certificate'),
            'certification'         => $request->certification,
            'course_type_id'        => $request->course_type_id,
            'category_id'           => $request->category_id,

        ]);




    if($request->topics){
        // $course->topics()->createMany($request->topics);
$course->topics()->delete();
        foreach($request->topics as $topic){
            $course::create([
                'course_id' => $course->id,
                'topic'     => $topic
            ]);
        }
    }

    DB::commit();

    return redirect()->route('courses.index');
}catch(Exception $e){
    Log::info($e->getMessage());
    return redirect()->back();
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
        return redirect()->back();

    }
}
