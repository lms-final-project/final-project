@extends('frontend.layouts.app')


@push('styles')
<style>
    .social-share i{
         margin-bottom: -70px !important;
        display: block;
        
    }
</style>
@endpush

@section('breadcrump')
    @include('frontend.layouts.breadcrumb' , [
        'title' => "Student Profile",
        'items' => [
            [
                'name' => 'Home',
                'link' => '/'
            ],
            [
                'name' => 'Student Profile',
                'link' => "#"
            ],

        ]
    ])
@endsection

@section('content')



<div class="edu-instructor-profile-area edu-section-gap bg-color-white">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 pr--55">

                <div class="instructor-profile-left">
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ asset('storage/'.$student_details->image) }}"style="width:100px;height:100px" alt="About Images">
                        </div>
                        <div class="content">
                            <h5 class="title">{{$student_details->user->name}}</h5>

                            <div class="contact-with-info">
                                <p><span>Email:</span> <a href="#">{{$student_details->user->email}}</a></p>
                                <p><span>Phone:</span> <a href="tel:+91 458 654 528">{{$student_details->phone}}</a></p>
                            </div>

                            <ul class="social-share bg-transparent justify-content-center    ">
                                @if ($student_details->social_links['facebook'])
                                    <li ><a href="{{$student_details->social_links['facebook']}}"><i class="icon-Fb " ></i></a></li>
                                @endif
                                @if ($student_details->social_links['linkedin'])
                                    <li><a href="{{$student_details->social_links['linkedin']}}"><i class="icon-linkedin"></i></a></li>
                                @endif
                                @if ($student_details->social_links['twitter'])
                                    <li><a href="{{$student_details->social_links['twitter']}}"><i class="icon-Twitter"></i></a></li>
                                @endif
                            </ul>
                            <div class="d-flex">

                               <div style="background-color: #525FE1;margin:auto;padding:10px" class="rounded"> <a class="btn   " style="font-size:20px;color:white"href="{{route('profile.edit',$student_details->student_id)}}">Edit Profile</a></div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="instructor-profile-right">
                    <div class="inner">
                        <div class="section-title text-start">
                            <span class="pre-title">About Me</span>
                            <h3 class="title" style="font-size: 30px">Hello, I’m {{$student_details->user->name}}</h3>

                        </div>
                        <div class="edu-course-wrapper pt--65">
                            <div class="section-title text-start mb--20">

                                <h3 class="pre-title"style="">Courses Enrolled By : {{$student_details->user->name}}</h3>
                            </div><br>
                            <div class="instructor-profile-courses course-activation course-activation-item-2 slick-gutter-15 edu-slick-button">
                                @forelse ($registered_courses as $course)
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
                                                    <li><i class="icon-file-list-4-line"></i>{{$course->courseContents->count()}}</li>
                                                    <li><i class="icon-time-line"></i>{{$course->start_time}}-{{$course->end_time}}</li>
                                                </ul>
                                                <h6 class="title"><a href="{{route('course_details',$course->id)}}">{{$course->title}}</a>
                                                </h6>

                                                <div class="card-bottom">
                                                    <div class="price-list price-style-03">
                                                        @if ($course->is_free)
                                                        <div class="price current-price">Free</div>

                                                        @else
                                                        <div class="price current-price">{{'$'.$course->price}}</div>

                                                        @endif
                                                    </div>
                                                    <ul class="edu-meta meta-01">
                                                        <li><i class="icon-account-circle-line"></i>{{$course->users->count()-1}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Card  -->
                            @empty
                                <div class="text-center">
                                    <h5>There isn't any course enrolled yet</h5>
                                </div>
                            @endforelse
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


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
