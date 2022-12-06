<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks=Auth()->user()->feedbacks;
        return view('frontend.student.panel.feedback.index',compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('frontend.student.panel.feedback.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'feedback' => 'required',
            'rating' => 'required',
        ]);
        Feedback::create([
            'student_id' => Auth::user()->id,
            'feedback'         => $request->feedback,
            'rating'         => $request->rating,

        ]);
        return redirect()->route('feedback.index')->with('success', 'feedback created successfully');
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
    public function edit(Feedback $feedback)
    {
        return view('frontend.student.panel.feedback.edit',compact('feedback'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {       $validated = $request->validate([
             'feedback' => 'required',
            'rating' => 'required',
            ]);
        $feedback->update([

          'feedback'=>  $request->feedback,
           'rating'=>$request->rating,]);
        return redirect()->route('feedback.index')->with('success', 'feedback updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('feedback.index')->with('danger' , 'feedback deleted!');
    }
}
