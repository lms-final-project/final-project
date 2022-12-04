<?php

namespace App\Http\Controllers\Instructor;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\InstructorDetails;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProfileRequest;

class ProfileController extends Controller
{

    public function index($id = null) {
        if($id){
            $instructor_details = InstructorDetails::where('instructor_id' , $id)->first();
            $courses = Course::with('type')->owner($id)->status('accepted')->get();
        }else {
            $instructor_details = Auth()->user()->instructor_details;
            $courses = Course::with('type')->owner(Auth::user()->id)->status('accepted')->get();
        }

        return view('frontend.instructor.panel.profile.index',compact('instructor_details','courses'));
    }

    public function create(){
        $details = Auth()->user()->instructor_details;
        if($details == null){
        return view('frontend.instructor.panel.profile.create');
        }
        else{
            return redirect()->route('instructor_profile');
        }


    }
    public function edit(){
        $details = Auth()->user()->instructor_details;
        return view('frontend.instructor.panel.profile.edit',compact('details'));
    }




    public function update(StoreProfileRequest  $request){
        $instructor_details =  Auth()->user()->instructor_details;

        $old_image = $instructor_details->image;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('Profile' , 'public');
        }
        $instructor_details->update([
            'job_title'     => $request->job_title,
            'image'         => $path ?? $old_image,
            'phone'         => $request->phone,
            'description'   => $request->description,
            'social_links'  => $request->social,
        ]);
        if($old_image && $request->hasFile('image')){
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('instructor_profile')->with('success' , 'profile updated successfully');
    }


    public function store(StoreProfileRequest $request){
return "ljknhjgg";
        /*if($request->hasFile('image')){
            $file=$request->file('image');
            $path=$file->store('Profile','public');
        }

        InstructorDetails::create([
            'instructor_id' => Auth::user()->id,
            'job_title'     => $request->job_title,
            'image'         => $path ,
            'phone'         => $request->phone,
            'description'   => $request->description,
            'social_links'  => $request->social,
        ]);
        return redirect()->route('instructor_profile')->with('success' , 'profile created successfully');*/
    }

    public function change_password(Request $request){


        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);



        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("danger", "Old Password Doesn't match!");
        }



        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");

    }

    public function password(){
        return view('frontend.instructor.panel.profile.password');
    }
}
