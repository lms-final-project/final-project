<?php

namespace App\Http\Controllers\Frontend\Student;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_details = Auth()->user()->profile_student;

        return view('frontend.student.panel.profile.index', compact('student_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = Auth()->user()->profile_student;
        if ($details == null) {
            return view('frontend.student.panel.profile.create');
        } else {
            return redirect()->route('profile.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('Profile', 'public');
        }

        StudentProfile::create([
            'student_id' => Auth::user()->id,
            'image'         => $path,
            'phone'         => $request->phone,
            'social_links'  => $request->social,
        ]);
        return redirect()->route('profile.index')->with('success', 'profile created successfully');
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
        $student_details = StudentProfile::owner($id)->first();

        return view('frontend.student.panel.profile.edit', compact('student_details'));
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

        $student_details = StudentProfile::owner($id)->first();


        $old_image = $student_details->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('Profile', 'public');
        }
        $student_details->update([

            'image'         => $path ?? $old_image,
            'phone'         => $request->phone,
            'social_links'  => $request->social,
        ]);
        if ($old_image && $request->hasFile('image')) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('profile.index')->with('success', 'profile updated successfully');
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

    public function change_password(Request $request)
    {


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

    public function password()
    {
        return view('frontend.student.panel.profile.password');
    }
}
