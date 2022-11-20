@extends('frontend.student.panel.layouts.index', ['active_btn' => 'courses'])

@section('student_panel')
    <div class="container eduvibe-animated-shape">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">All My Enrolled Courses </span>
                    <h3 class="title">Our All Courses</h3>
                </div>
            </div>
        </div>

        <div class="row g-5 mt--25">
            @forelse ($registered_courses as $course)
            <div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <div class="edu-card card-type-1 bg-white radius-small border">
                    <div class="inner">
                        <div class="thumbnail pt-5 ">
                            {{-- <a href="course-details.html" style="height: 200px">
                                <img class="w-100" src="{{ asset("storage/".$course->image) }}" alt="Course Meta">
                            </a> --}}
                            <div class="top-position status-group left-top shadow-sm">
                                <span class="eduvibe-status status-01">{{ $course->type->name }}</span>
                            </div>
                            <div class="top-position status-group right-top shadow-sm">
                                @if ($course->status == 'pinned')
                                    <span class="badge bg-primary p-2">{{ $course->status }}</span>
                                @elseif($course->status == 'rejected')
                                    <span class="badge bg-danger">{{ $course->status }}</span>
                                @elseif($course->status == 'accepted')
                                    <span class="badge bg-success">{{ $course->status }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title">
                                <a href="{{ route('course_details', $course->id) }}">{{ $course->title }}</a>
                            </h6>

                            <div class="card-bottom">

                                <ul class="edu-meta meta-01">
                                    <li><i class="icon-account-circle-line"></i>
{{$course->users->count()-1}}

                                </li>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @empty
                <tr>
                    <th colspan="5" class="text-center">
                        There isn't any course enroll yet
                    </th>
                </tr>
            @endforelse
        </div>
    </div>
@endsection
