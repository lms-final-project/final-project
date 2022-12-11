@extends('frontend.student.panel.layouts.index' ,  ['active_btn' => 'dashboard'])


@section('student_panel')
    <div class="text-center">
        <h5>Student panel</h5>

    </div>
    <div style="margin-right: 20px" >
        <form action="{{route('student.ToInstructor',['student'=>Auth::user()->id])}}" method="POST">
            @csrf
            <button  class="edu-btn btn-medium left-icon header-button ms-3 fs-5 " >
                To Become Instructor
            </button>
        </form></div>
@endsection
