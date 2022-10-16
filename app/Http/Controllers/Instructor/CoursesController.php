<?php

namespace App\Http\Controllers\Instructor;

use Exception;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseType;
use App\Models\CourseTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = CourseType::all();
        $categories=Category::all();
        return view('frontend.instructor.panel.courses.create', compact('types','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $path = $file->store('instructors/courses' , 'public');
            }

            $course = Course::create([
                'image'                 => $path ?? null,
                'title'                 => $request->title,
                'description'           => $request->description,
                'is_free'               => $request->boolean('is_free'),
                'price'                 => $request->price,
                'price_after_discount'  => $request->price_after_discount,
                'has_certificate'       => $request->boolean('has_certificate'),
                'certification'         => $request->certification,
                'course_type_id'        => $request->course_type_id,
                'instructor_id'         => auth()->user()->id
            ]);

            // todo : search about createMany
            if($request->topics){
                $topics = [];
                foreach ($request->topics as $key => $value) {
                    $topics[] = $value;
                }
                $course->topics()->createMany($topics);

                // foreach($request->topics as $topic){
                //     CourseTopic::create([
                //         'course_id' => $course->id,
                //         'topic'     => $topic
                //     ]);
                // }
            }

            DB::commit();
            return redirect()->back();
        }catch(Exception $e){
            dd($e->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
