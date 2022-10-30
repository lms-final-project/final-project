<?php

namespace App\Http\Controllers;

use instructor;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Instructor_Details;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProfileRequest;

class InstructorDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $instructor_detailes=instructor_Details::get();
        $courses = Course::instructor(Auth::user()->id)->status()->with('type')->get();
        //dd($instructor_detailes);

        return view('frontend.instructor.panel.profile.index',compact('instructor_detailes','courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.instructor.panel.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//you should use StoreProfileRequest
        if($request->hasFile('image')){
            $file=$request->file('image');
            $path=$file->store('Profile','public');


        }
        instructor_Details::create([
            'instructor_id'          =>Auth::user()->id ,
            'job_title'       => $request->description,
            'image'=>$path,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'social_links'=>$request->social,
        ]);

        return redirect()->route('instrector_details.index');
        //dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor_Details  $instructor_Details
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor_Details $instructor_Details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor_Details  $instructor_Details
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor_Details $instructor_Details)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor_Details  $instructor_Details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor_Details $instructor_Details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor_Details  $instructor_Details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor_Details $instructor_Details)
    {
        //
    }
}
