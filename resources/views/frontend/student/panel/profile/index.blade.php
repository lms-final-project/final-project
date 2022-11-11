@extends('frontend.layouts.app')


@push('styles')

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
                            <img src="{{ asset('storage/'.$student_details->image) }}" alt="About Images">
                        </div>
                        <div class="content">
                            <h5 class="title">{{$student_details->user->name}}</h5>

                            <div class="contact-with-info">
                                <p><span>Email:</span> <a href="#">{{$student_details->user->email}}</a></p>
                                <p><span>Phone:</span> <a href="tel:+91 458 654 528">{{$student_details->phone}}</a></p>
                            </div>

                            <ul class="social-share bg-transparent justify-content-center medium-size">
                                @if ($student_details->social_links['facebook'])
                                    <li><a href="{{$student_details->social_links['facebook']}}"><i class="icon-Fb"></i></a></li>
                                @endif
                                @if ($student_details->social_links['linkedin'])
                                    <li><a href="{{$student_details->social_links['linkedin']}}"><i class="icon-linkedin"></i></a></li>
                                @endif
                                @if ($student_details->social_links['twitter'])
                                    <li><a href="{{$student_details->social_links['twitter']}}"><i class="icon-Twitter"></i></a></li>
                                @endif
                            </ul>
                            <div class="d-flex">

                               <div style="background-color: #525FE1;margin-right:5px;padding:10px" class="rounded"> <a class="btn   " style="font-size:20px;color:white"href="{{route('profile.edit',$student_details->student_id)}}">Edit Profile</a></div>
                                <div style="background-color: #525FE1;margin-left:5px;padding:10px" class="rounded"> <a class="btn   " style="font-size:20px;color:white"href="">Contact Me</a></div>
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
                            <h3 class="title">Hello, I’m {{$student_details->user->name}}</h3>

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
