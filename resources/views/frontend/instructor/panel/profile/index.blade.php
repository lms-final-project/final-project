@extends('frontend.layouts.app')


@push('styles')

@endpush

@section('breadcrump')
    @include('frontend.layouts.breadcrumb' , [
        'title' => "Instructor Profile",
        'items' => [
            [
                'name' => 'Home',
                'link' => '/'
            ],
            [
                'name' => 'Instructor Profile',
                'link' => "#"
            ],

        ]
    ])
@endsection

@section('content')

<div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
    <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
        <div class="shape-image shape-image-1">
            <img src="{{asset('frontend/assets/images/shapes/shape-11-07.png')}}" alt="Shape Thumb" />
        </div>
        <div class="shape-image shape-image-2">
            <img src="{{asset('frontend/assets/images/shapes/shape-01-02.png')}}" alt="Shape Thumb" />
        </div>
        <div class="shape-image shape-image-3">
            <img src="{{asset('frontend/assets/images/shapes/shape-03.png')}}" alt="Shape Thumb" />
        </div>
        <div class="shape-image shape-image-4">
            <img src="{{asset('frontend/assets/images/shapes/shape-13-12.png')}}" alt="Shape Thumb" />
        </div>
        <div class="shape-image shape-image-5">
            <img src="{{asset('frontend/assets/images/shapes/shape-36.png')}}" alt="Shape Thumb" />
        </div>
        <div class="shape-image shape-image-6">
            <img src="{{asset('frontend/assets/images/shapes/shape-05-07.png')}}" alt="Shape Thumb" />
        </div>
    </div>
</div>
</div>
</div>

<div class="edu-instructor-profile-area edu-section-gap bg-color-white">
<div class="container">
<div class="row g-5">
    <div class="col-lg-4 pr--55">

        <div class="instructor-profile-left">
            @foreach (  $instructor_detailes as $instructor )


            <div class="inner">
                <div class="thumbnail">
                    <img src="{{ asset('storage/'.$instructor->image) }}" alt="About Images">
                </div>
                <div class="content">
                    <h5 class="title">{{$instructor->user->name}}</h5>
                    <span class="subtitle">{{$instructor->job_title}}</span>
                    <div class="contact-with-info">
                        <p><span>Email:</span> <a href="#">{{$instructor->user->email}}</a></p>
                        <p><span>Phone:</span> <a href="tel:+91 458 654 528">{{$instructor->phone}}</a></p>
                    </div>
                    <ul class="social-share bg-transparent justify-content-center medium-size">
                        <li><a href="{{$instructor->social_links[0]}}"><i class="icon-Fb"></i></a></li>
                        <li><a href="{{$instructor->social_links[1]}}"><i class="icon-linkedin"></i></a></li>

                        <li><a href="{{$instructor->social_links[2]}}"><i class="icon-Twitter"></i></a></li>
                    </ul>
                    <div class="contact-btn">
                        <a class="edu-btn" href="contact-me.html">Contact Me<i class="icon-arrow-right-line-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-8">
        <div class="instructor-profile-right">
            <div class="inner">
                <div class="section-title text-start">
                    <span class="pre-title">About Me</span>
                    <h3 class="title">Hello, I’m {{$instructor->user->name}}</h3>
                    <p class="description mt--40">{{$instructor->description}}</p>
                </div>

                <!--<div class="edu-skill-style mt--65">
                    <div class="section-title text-start mb--30">
                        <span class="pre-title">Skillset</span>
                        <h3 class="title">Courses Progress</h3>
                    </div>
                    <div class="rbt-progress-style-1 row g-5">
                        <div class="col-lg-6">
                            <div class="single-progress">
                                <h6 class="title">Website Development</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span class="progress-number">90%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-progress">
                                <h6 class="title">Product Design</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft bar-color-2" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span class="progress-number">75%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-progress">
                                <h6 class="title">Digital Marketing</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft bar-color-3" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span class="progress-number">95%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-progress">
                                <h6 class="title">Live Support</h6>
                                <div class="progress">
                                    <div class="progress-bar wow fadeInLeft bar-color-4" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span class="progress-number">45%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="course-statistic-wrapper bg-color-primary ptb--50 mt--65 radius-small">
                    <div class="row align-items-center g-5">

                        <div class="col-lg-4 colmd-6 col-12 line-separator">
                            <div class="course-statistic text-center">
                                <div class="inner">
                                    <span class="total">4</span>
                                    <p>Course Author</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 colmd-6 col-12 line-separator">
                            <div class="course-statistic text-center">
                                <div class="inner">
                                    <span class="total">20</span>
                                    <p>Total Rating</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 colmd-6 col-12 line-separator">
                            <div class="course-statistic text-center">
                                <div class="inner">
                                    <span class="total">4.5</span>
                                    <p>Ave. Rating</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>-->

                <div class="edu-course-wrapper pt--65">
                    <div class="section-title text-start mb--20">
                        <span class="pre-title">Courses</span>
                        <h3 class="title">Course By : {{$instructor->user->name}}</h3>
                    </div>
                    <div class="instructor-profile-courses course-activation course-activation-item-2 slick-gutter-15 edu-slick-button">
                        @forelse ($courses as $course)
                        <!-- Start Single Card  -->
                        <div class="col-12 col-sm-6 col-lg-4" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-card card-type-1 radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="{{route('course_details',$course->id)}}">
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
                                        <h6 class="title"><a href="{{route('course_details',$course->id)}}">{{$course->title}}</a>
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
                            <h5>There isn't any course accepted yet</h5>
                        </div>
                    @endforelse
                </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection

