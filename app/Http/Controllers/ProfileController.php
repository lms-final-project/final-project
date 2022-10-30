<?php

namespace App\Http\Controllers;
use instructor;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Instructor_Details;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{

    public function index(){
        $instructor_detailes=instructor_Details::get();
       /// dd($instructor_detailes);
       // $courses = Course::instructor(Auth::user()->id)->status()->with('type')->get();
        $courses = Course::with('type')->instructor(Auth::user()->id)->status('accepted')->get();
        //dd($instructor_detailes);

        return view('frontend.instructor.panel.profile.index',compact('instructor_detailes','courses'));
    }
    public function edit(){
        $user=Auth::user();
        //dd($user);
        return view('frontend.instructor.panel.profile.edit',compact('user'));
    }
    public function update(Request $request){
$user=$request->user();
//dd($user);
$instructor_detailes=$user->instructor_details;
//dd($instructor_detailes);
if($instructor_detailes->instructor_id){
    $old_image = $profile->image;
    if($request->hasFile('image')){
        $file = $request->file('image');
        $path = $file->store('Profile' , 'public');
    }
    $profile->update([
'instructor_detailes'=>$user->id,
        'job_title'       => $request->job_title,
        'image'=>$path,
        'phone'=>$request->phone,
        'description'=>$request->description,
        'social_links'=>$request->social,


    ]);
    if($old_image && $request->hasFile('image')){
        Storage::disk('public')->delete($old_image);
    }
}
else{
    if($request->hasFile('image')){
        $file=$request->file('image');
        $path=$file->store('Profile','public');


    }
    $request->merge(['instructor_id'=>$user->id]);
    instructor_Details::create([
        'instructor_id'          =>$user->id ,
        'job_title'       => $request->description,
        'image'=>$path,
        'phone'=>$request->phone,
        'description'=>$request->description,
        'social_links'=>$request->social,
    ]);

    return redirect()->route('profile_index');
}


    }
}
