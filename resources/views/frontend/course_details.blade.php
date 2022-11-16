@extends('frontend.layouts.app')


@push('styles')

@endpush

@section('breadcrump')
    @include('frontend.layouts.breadcrumb' , [
        'title' => "Course details",
        'items' => [
            [
                'name' => 'Home',
                'link' => '/'
            ],
            [
                'name' => 'Courses',
                'link' => "/courses/$course->category_id"
            ],
            [
                'name' => "$course->title",
                'link' => '#'
            ]
        ]
    ])
@endsection

@section('content')
    <div class="main-wrapper">
        <div class="edu-course-details-area edu-section-gap bg-color-white">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-8 col-lg-7">
                        <div class="course-details-content">
                            <div class="content-top">
                                <div class="author-meta">
                                    <div class="author-thumb">
                                        <a href="{{ route('instructor_profile' , $course->instructor->id) }}">

                                            @if ($course->instructor->instructor_details && $course->instructor->instructor_details->image)
                                                <img src="{{asset('storage/'.$course->instructor->instructor_details->image)}}" alt="Author Images">
                                            @else
                                                <img src="{{asset('assets/images/default_instructor_image.png')}}" alt="Author Images">
                                            @endif
                                            <span class="author-title">By {{ $course->instructor->name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <h3 class="title">Grow Personal Financial Security Thinking & Principles</h3>

                            <ul class="edu-course-tab nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">Overview</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab" data-bs-target="#curriculum" type="button" role="tab" aria-controls="curriculum" aria-selected="false">Curriculum</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="instructor-tab" data-bs-toggle="tab" data-bs-target="#instructor" type="button" role="tab" aria-controls="instructor" aria-selected="false">Instructor</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="course-tab-content">
                                        <h5>Course Description</h5>
                                        <p>{{ $course->description }}</p>
                                        <h5>What You’ll Learn From This Course</h5>
                                        <ul>
                                            @foreach ($course->topics as $item)
                                                <li>{{ $item->topic }}</li>
                                            @endforeach
                                        </ul>
                                        @if ($course->has_certificate)
                                            <h5>Certification</h5>
                                            <p>{{ $course->certification }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                    <div class="course-tab-content">
                                        <div class="edu-accordion-02" id="accordionExample1">

                                            @forelse ($courseHeading as $heading)
                                                <div class="edu-accordion-item">
                                                    <div class="edu-accordion-header" id="headingThree">

                                                        <button class="edu-accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-{{$heading->id}}" aria-expanded="false" aria-controls="flush-{{$heading->id}}">
                                                        {{$heading->title}}
                                                    </button>
                                                    </div>
                                                    <div id="flush-{{$heading->id}}" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample1">
                                                        <div class="edu-accordion-body">
                                                            @if (count($heading->contents)> 0)



                                                            <ul>
                                                                @foreach ($heading->contents as $content)
                                                                <li>
                                                                    <div class="text"><i class="icon-draft-line"></i> <a href="{{$content->title}}">Session{{ $loop->iteration }} </a></div>
                                                                    <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                                </li>
                                                                @endforeach

                                                            </ul>



                                                            @else
                                                            <div class="" style="font-size: 20px">
                                                                <span>No Content Yet</span></div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div style="font-size: 20px">
                                                    <span>No Curriculm Yet</span>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                    <div class="course-tab-content">
                                        <div class="course-author-wrapper">
                                            <div class="thumbnail">
                                                @if ($course->instructor->instructor_details && $course->instructor->instructor_details->image)
                                                    <img src="{{asset('storage/'.$course->instructor->instructor_details->image)}}" alt="Author Images" class="img-fluid">
                                                @else
                                                    <img src="{{asset('assets/images/default_instructor_image.png')}}" alt="Author Images">
                                                @endif
                                            </div>

                                            <div class="author-content">
                                                <h6 class="title">
                                                    <a href="{{ route('instructor_profile' , $course->instructor->id) }}">
                                                        {{ $course->instructor->name }}
                                                    </a>
                                                </h6>
                                                @if ($course->instructor->instructor_details && $course->instructor->instructor_details->job_title)
                                                    <span class="subtitle">{{$course->instructor->instructor_details->job_title}}</span>
                                                @endif
                                                @if ($course->instructor->instructor_details && $course->instructor->instructor_details->description)
                                                    <p>{{$course->instructor->instructor_details->description}}</p>
                                                @endif
                                                @if ($course->instructor->instructor_details && $course->instructor->instructor_details->social_links)
                                                    <ul class="social-share border-style">
                                                        @if ($course->instructor->instructor_details->social_links['facebook'])
                                                            <li><a href="{{$course->instructor->instructor_details->social_links['facebook']}}"><i class="icon-Fb"></i></a></li>
                                                        @endif
                                                        @if ($course->instructor->instructor_details->social_links['linkedin'])
                                                            <li><a href="{{$course->instructor->instructor_details->social_links['linkedin']}}"><i class="icon-linkedin"></i></a></li>
                                                        @endif
                                                        @if ($course->instructor->instructor_details->social_links['twitter'])
                                                            <li><a href="{{$course->instructor->instructor_details->social_links['twitter']}}"><i class="icon-Twitter"></i></a></li>
                                                        @endif
                                                    </ul>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5">
                        <div class="eduvibe-sidebar course-details-sidebar">
                            <div class="inner">
                                <div class="eduvibe-widget">
                                    <div class="video-area">
                                        <div class="thumbnail video-popup-wrapper">
                                            <img class="radius-small w-100 " src="{{ asset('storage/'.$course->image) }}" alt="Course Images" style="height: 150px">
                                        </div>
                                    </div>
                                    <div class="eduvibe-widget-details mt--35">
                                        <div class="widget-content">
                                            <ul>
                                                {{-- <li><span><i class="icon-time-line"></i> Start Date</span><span>6 Hrs 40 Min</span></li> --}}

                                                {{-- <li><span><i class="icon-user-2"></i> Enrolled</span><span>89</span></li> --}}

                                                {{-- <li><span><i class="icon-draft-line"></i> Lectures</span><span>23</span></li> --}}

                                                <li><span><i class="icon-bar-chart-2-line"></i> Skill Level</span><span>{{ $course->courseType->name }}</span></li>



                                                <li><span><i class="icon-award-line"></i> Certificate</span><span>{{ $course->has_certificate ? 'yes' : 'no' }}</span></li>


                                                {{-- <li><span><i class="icon-calendar-2-line"></i> Deadline</span><span>25 Dec, 2022</span></li> --}}

                                                <li><span><i class="icon-user-2-line_tie"></i> Instructor</span><span>{{ $course->instructor->name }}</span></li>
                                            </ul>

                                            @if (!$is_registered)
                                                <div class="read-more-btn mt--45">
                                                    <a class="edu-btn btn-bg-alt w-100 text-center" href="#">Price:
                                                        @if ($course->is_free)
                                                            Free
                                                        @else
                                                            {{'$'.$course->price}}
                                                        @endif
                                                    </a>
                                                </div>

                                                <div class="read-more-btn mt--15">
                                                    @guest
                                                        <a class="edu-btn w-100 text-center " href="{{ route('login') }}">Buy Now</a>
                                                        <a class="edu-btn w-100 text-center"style="margin-top:10px" href="#">Show Outline</a>
                                                    @endguest
                                                    @auth
                                                        @if ($course->is_free)
                                                            <a class="edu-btn w-100 text-center" href="{{ route('payments.free' , $course->id) }}">Buy Now</a>
                                                        @else
                                                            <a class="edu-btn w-100 text-center" href="#">Buy Now -</a>
                                                        @endif
                                                    @endauth
                                                    @if ($course->file)
                                                        <a class="edu-btn w-100 text-center"style="margin-top:10px" href="{{ route('download' , $course->file) }}">Show Outline</a>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="read-more-btn mt--45">
                                                    <a class="edu-btn btn-bg-alt w-100 text-center" href="#">
                                                        Owned
                                                    </a>
                                                </div>
                                            @endif


                                            {{-- <div class="read-more-btn mt--30 text-center">
                                                <div class="eduvibe-post-share">
                                                    <span>Share: </span>
                                                    <a class="linkedin" href="#"><i class="icon-linkedin"></i></a>
                                                    <a class="facebook" href="#"><i class="icon-Fb"></i></a>
                                                    <a class="twitter" href="#"><i class="icon-Twitter"></i></a>
                                                    <a class="youtube" href="#"><i class="icon-youtube"></i></a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="edu-course-wrapper pt--65">
                            <div class="section-title text-start mb--20">
                                <span class="pre-title">Related Courses</span>
                                <h3 class="title">Courses You May Like</h3>
                            </div>
                            <div class="edu-course-area edu-section-gap bg-color-white">
                                <div class="container">
                                    <div class="row g-5 mt--10">
                                        @forelse ($courses as $course)
                                            <!-- Start Single Card  -->
                                            <div class="col-12 col-sm-6 col-lg-4" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                                <div class="edu-card card-type-1 radius-small">
                                                    <div class="inner">
                                                        <div class="thumbnail">
                                                            <a href="{{ route('course_details' , $course->id) }}">
                                                                <img class="w-100" src="{{ asset('storage/'.$course->image) }}" alt="Course Meta" style="height: 250px">
                                                            </a>
                                                            <div class="top-position status-group left-top shadow">
                                                                <span class="eduvibe-status status-01">{{ $course->type->name }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <ul class="edu-meta meta-01">
                                                                <li><i class="icon-file-list-4-line"></i>29 Lessons</li>
                                                                <li><i class="icon-time-line"></i>19h 15m 26s</li>
                                                            </ul>
                                                            <h6 class="title"><a href="{{ route('course_details' , $course->id) }}">{{$course->title}}</a>
                                                            </h6>

                                                            <div class="card-bottom">
                                                                <div class="price-list price-style-03">
                                                                    @if ($course->is_free)
                                                                    <div class="price current-price">Free</div>

                                                                    @else
                                                                    <div class="price current-price">$45.00</div>

                                                                    @endif
                                                                </div>
                                                                <ul class="edu-meta meta-01">
                                                                    <li><i class="icon-account-circle-line"></i>85 Students</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Card  -->
                                        @empty
                                            <div class="text-center">
                                                <h5>There isn't any course added yet</h5>
                                            </div>
                                        @endforelse
                                    </div></div></div>
        </div>
        </div>
    </div>
@endsection
