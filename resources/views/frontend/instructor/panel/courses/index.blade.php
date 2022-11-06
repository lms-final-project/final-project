@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@section('instructor_panel')
    <div class="container eduvibe-animated-shape">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">All Courses</span>
                    <h3 class="title">Our All Courses</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="load-more-btn mt--60 ">
                <a class="eduu-btn" href="{{ route('courses.create') }}"><i
                    class="ri-upload-line me-2"></i>Create Course</a>
            </div>
        </div>
        <div class="row g-5 mt--25">
            @forelse ($courses as $course)
                <!-- Start Single Card  -->
                <x-front.instructor.course-component :course="$course" />
            @empty
                <tr>
                    <th colspan="5" class="text-center">
                        There isn't any course yet
                    </th>
                </tr>
            @endforelse
        </div>
    </div>
@endsection
