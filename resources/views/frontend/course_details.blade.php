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
                                        <a href="instructor-profile.html">
                                            <img src="assets/images/instructor/instructor-small/instructor-2.jpg" alt="Author Images">
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
                                            <div class="edu-accordion-item">
                                                <div class="edu-accordion-header" id="headingOne">
                                                    <button class="edu-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        The First Steps
                                                    </button>
                                                </div>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
                                                    <div class="edu-accordion-body">
                                                        <ul>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Introduction</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Course Overview</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Local Development Environment Tools</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Course Excercise</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Embedding PHP in HTML</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Using Dynamic Data</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="edu-accordion-item">
                                                <div class="edu-accordion-header" id="headingTwo">
                                                    <button class="edu-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Data Types and More
                                                    </button>
                                                </div>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample1">
                                                    <div class="edu-accordion-body">
                                                        <ul>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Introduction</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Course Overview</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Local Development Environment Tools</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Course Excercise</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Embedding PHP in HTML</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Using Dynamic Data</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="edu-accordion-item">
                                                <div class="edu-accordion-header" id="headingThree">
                                                    <button class="edu-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Control Structure
                                                    </button>
                                                </div>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample1">
                                                    <div class="edu-accordion-body">
                                                        <ul>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Introduction</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Course Overview</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Local Development Environment Tools</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Course Excercise</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Embedding PHP in HTML</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                            <li>
                                                                <div class="text"><i class="icon-draft-line"></i> Using Dynamic Data</div>
                                                                <div class="icon"><i class="icon-lock-password-line"></i></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                    <div class="course-tab-content">
                                        <div class="course-author-wrapper">
                                            <div class="thumbnail">
                                                <img src="assets/images/instructor/course-details/instructor-2.jpg" alt="Author Images">
                                            </div>
                                            <div class="author-content">
                                                <h6 class="title">
                                                    <a href="instructor-profile.html">{{ $course->instructor->name }}</a>
                                                </h6>
                                                <span class="subtitle">Digital Marketer</span>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley...</p>
                                                <ul class="social-share border-style">
                                                    <li><a href="#"><i class="icon-Fb"></i></a></li>
                                                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                                    <li><a href="#"><i class="icon-Pinterest"></i></a></li>
                                                    <li><a href="#"><i class="icon-Twitter"></i></a></li>
                                                </ul>
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

                                            <div class="read-more-btn mt--45">
                                                <a class="edu-btn btn-bg-alt w-100 text-center" href="#">Price:
                                                    @if ($course->is_free)
                                                        Free
                                                    @else
                                                        {{$course->price}}
                                                    @endif
                                                </a>
                                            </div>

                                            <div class="read-more-btn mt--15">
                                                @guest
                                                    <a class="edu-btn w-100 text-center" href="{{ route('login') }}">Buy Now</a>
                                                @endguest
                                                @auth
                                                    <a class="edu-btn w-100 text-center" href="#">Buy Now</a>
                                                @endauth
                                            </div>

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

                            <div class="mt--40 edu-slick-button slick-activation-wrapper eduvibe-course-one-carousel eduvibe-course-details-related-course-carousel">
                                <div class="single-slick-card">
                                    <div class="edu-card card-type-3 radius-small">
                                        <div class="inner">
                                            <div class="thumbnail">
                                                <a href="course-details.html">
                                                    <img class="w-100" src="assets/images/course/course-01/course-01.jpg" alt="Course Thumb">
                                                </a>
                                                <div class="wishlist-top-right">
                                                    <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                                </div>
                                                <div class="top-position status-group left-bottom">
                                                    <span class="eduvibe-status status-03">Language Learning</span>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="card-top">
                                                    <div class="author-meta">
                                                        <div class="author-thumb">
                                                            <a href="instructor-profile.html">
                                                                <img src="assets/images/instructor/instructor-small/instructor-2.jpg" alt="Author Images">
                                                                <span class="author-title">Nancy Phipps</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="edu-meta meta-02">
                                                        <li><i class="icon-file-list-3-line"></i>29 Lessons</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Master Native English Class This Speaking Skills</a>
                                                </h6>
                                                <div class="card-bottom">
                                                    <div class="price-list price-style-02">
                                                        <div class="price current-price">$29.99</div>
                                                        <div class="price old-price">$39.99</div>
                                                    </div>
                                                    <div class="edu-rating rating-default">
                                                        <div class="rating">
                                                            <i class="icon-Star"></i>
                                                            <i class="icon-Star"></i>
                                                            <i class="icon-Star"></i>
                                                            <i class="icon-Star"></i>
                                                            <i class="icon-Star"></i>
                                                        </div>
                                                        <span class="rating-count">(18)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-hover-action">
                                            <div class="hover-content">
                                                <div class="content-top">
                                                    <div class="top-status-bar">
                                                        <span class="eduvibe-status status-03">Language Learning</span>
                                                    </div>
                                                    <div class="top-wishlist-bar">
                                                        <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                                    </div>
                                                </div>

                                                <h6 class="title"><a href="course-details.html">Master Native English Class This Speaking Skills</a></h6>

                                                <p class="description">There are many variations of passages of Lorem Ipsaums available, but the majority have suffered alteration. generators on the Internet tend to repeat.</p>

                                                <div class="price-list price-style-02">
                                                    <div class="price current-price">$29.99</div>
                                                    <div class="price old-price">$39.99</div>
                                                </div>

                                                <div class="hover-bottom-content">
                                                    <div class="author-meta">
                                                        <div class="author-thumb">
                                                            <a href="instructor-profile.html">
                                                                <img src="assets/images/instructor/instructor-small/instructor-2.jpg" alt="Author Images">
                                                                <span class="author-title">Nancy Phipps</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="edu-meta meta-02">
                                                        <li><i class="icon-file-list-3-line"></i>29 Lessons</li>
                                                    </ul>
                                                </div>
                                                <div class="read-more-btn">
                                                    <a class="edu-btn btn-medium btn-white" href="course-details.html">Enroll Now<i class="icon-arrow-right-line-right"></i></a>
                                                </div>

                                            </div>
                                        </div>
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
