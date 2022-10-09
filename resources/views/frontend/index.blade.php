@extends('frontend.layouts.app')


    @section('index')
        <!-- Start Sldier Area  -->
        <div class="slider-area banner-style-3 bg-image">
            <div class="d-flex align-items-center height-940">
                <div class="container eduvibe-animated-shape">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="inner">
                                <div class="content text-start">
                                    <span class="pre-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Better Learning Future With Us</span>
                                    <h1 class="title" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">Education Is About Academic Excellence</h1>
                                    <p class="description" data-sal-delay="350" data-sal="slide-up" data-sal-duration="800">Sed eu volutpat arcu, a tincidunt nulla quam, feugiat sit amet ipsum a, dapibus porta velit.</p>
                                    <a class="edu-btn" href="#" data-sal-delay="450" data-sal="slide-up" data-sal-duration="800">Get Started Today <i class="icon-arrow-right-line-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-image">
                                <div class="banner-main-image">
                                    <img class="img-01" data-sal-delay="150" data-sal="fade" data-sal-duration="800" src="{{ asset('frontend/assets/images/banner/banner-03/image-01.png')}}" alt="Banner Images" />
                                </div>
                                <img class="img-02" data-sal-delay="150" data-sal="fade" data-sal-duration="800" src="{{ asset('frontend/assets/images/banner/banner-03/image-02.png')}}" alt="Banner Images" />
                                <img class="img-03" data-sal-delay="150" data-sal="fade" data-sal-duration="800" src="{{ asset('frontend/assets/images/banner/banner-03/image-03.png')}}" alt="Banner Images" />
                            </div>
                        </div>
                    </div>
                    <div class="shape-wrapper">
                        <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                            <div class="shape-image shape-image-1">
                                <img src="{{ asset('frontend/assets/images/shapes/shape-11-03.png')}}" alt="Shape Thumb" />
                            </div>
                            <div class="shape-image shape-image-2">
                                <img src="{{ asset('frontend/assets/images/shapes/shape-01-02.png')}}" alt="Shape Thumb" />
                            </div>
                            <div class="shape-image shape-image-3">
                                <img src="{{ asset('frontend/assets/images/shapes/shape-13-06-07.png')}}" alt="Shape Thumb" />
                            </div>
                            <div class="shape-image shape-image-4">
                                <img src="{{ asset('frontend/assets/images/shapes/shape-26.png')}}" alt="Shape Thumb" />
                            </div>
                            <div class="shape-image shape-image-5">
                                <img src="{{ asset('frontend/assets/images/shapes/shape-05-01.png')}}" alt="Shape Thumb" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Sldier Area  -->

        {{-- Start Course Categories --}}
        <div class="sercice-area eduvibe-service-five service-wrapper-5 edu-section-gap bg-color-white">
            <div class="container eduvibe-animated-shape">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <span class="pre-title">Course Categories</span>
                            <h3 class="title">Popular Topics To Learn</h3>
                        </div>
                    </div>
                </div>

                <div class="row g-5 mt--25">

                    <!-- Start Service Grid  -->
                    @forelse ($categories as $category)
                        <div class="col-lg-4 col-md-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <div class="service-card service-card-5">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="{{$category->icon->class}}""></i>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="#">{{$category->name}}</a></h6>
                                        <p class="description">39 Course</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <p>no categories yet</p>
                        </div>
                    @endforelse
                    <!-- End Service Grid  -->

                </div>
                <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                    <div class="shape-image shape-image-1">
                        <img src="{{ asset('frontend/assets/images/shapes/shape-19-02.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-2">
                        <img src="{{ asset('frontend/assets/images/shapes/shape-21.png')}}" alt="Shape Thumb" />
                    </div>
                </div>
            </div>
        </div>

        {{-- End Course Categories --}}
    @endsection

    @section('content')
        <div class="home-three-about edu-about-area about-style-4 bg-color-white edu-section-gapBottom">
            <div class="container eduvibe-animated-shape">
                <div class="row g-lg-5 g-md-5 g-sm-5">
                    <div class="col-lg-12 col-xl-6">
                        <div class="gallery-wrapper">
                            <img class="image-1" src="{{ asset('frontend/assets/images/about/about-05/about-group-01.jpg')}}" alt="About Images">
                            <img class="image-2" src="{{ asset('frontend/assets/images/about/about-05/about-group-02.jpg')}}" alt="About Images">
                            <img class="image-3" data-parallax='{"x": 0, "y": -120}' src="{{ asset('frontend/assets/images/about/about-05/about-group-03.jpg')}}" alt="About Images">
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <div class="inner mt_mobile--40">
                            <div class="section-title text-start" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <span class="pre-title">Who We Are</span>
                                <h3 class="title">We Offer The Best Carrier</h3>
                            </div>
                            <div class="feature-style-6 mt--40">
                                <div class="edu-feature-list color-variation-1" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/icons/student.png')}}" alt="Icons Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Industry Expert Instructor</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmoded tempor incididunt dolore magna aliqua.</p>
                                    </div>
                                </div>

                                <div class="edu-feature-list color-variation-2" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/icons/book.png')}}" alt="Icons Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Up-to-Date Course Content</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmoded tempor incididunt dolore magna aliqua.</p>
                                    </div>
                                </div>

                                <div class="edu-feature-list color-variation-3" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/icons/reward.png')}}" alt="Icons Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Biggest Student Community</h6>
                                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmoded tempor incididunt dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="read-more-btn mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <a class="edu-btn" href="about-us-1.html">Know About Us <i class="icon-arrow-right-line-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                    <div class="shape-image shape-image-1"><img src="{{ asset('frontend/assets/images/shapes/shape-03-08.png')}}" alt="Shape Thumb" /></div>
                    <div class="shape-image shape-image-2"><img src="{{ asset('frontend/assets/images/shapes/shape-27.png')}}" alt="Shape Thumb" /></div>
                </div>
            </div>
        </div>


        <!-- Start Counterup Area  -->
        <div class="edu-counterup-and-course-area">
            <div class="container">
                <div class="counterup-style-2 bg-color-primary radius-small ptb--80 ">
                    <div class="row g-5">
                        <!-- Start Single Counter  -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 line-separator">
                            <div class="edu-counterup-2 text-center">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="icon-Bag"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="counter"><span class="odometer" data-count="500">00</span>
                                            <span class="after-icon">+</span>
                                        </h3>
                                        <span class="subtitle">Students Enrolled</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Counter  -->

                        <!-- Start Single Counter  -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 line-separator">
                            <div class="edu-counterup-2 text-center">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="icon-trophy"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="counter"><span class="odometer" data-count="100">00</span>
                                            <span class="after-icon">%</span>
                                        </h3>
                                        <span class="subtitle">Satisfaction Rate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Counter  -->

                        <!-- Start Single Counter  -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 line-separator">
                            <div class="edu-counterup-2 text-center">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="icon-Open-book"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="counter"><span class="odometer" data-count="300">00</span>
                                            <span class="after-icon">+</span>
                                        </h3>
                                        <span class="subtitle">Academic Programs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Counter  -->

                        <!-- Start Single Counter  -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 line-separator">
                            <div class="edu-counterup-2 text-center">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="icon-presentation"></i>
                                    </div>
                                    <div class="content">
                                        <h3 class="counter"><span class="odometer" data-count="150">00</span>
                                            <span class="after-icon">+</span>
                                        </h3>
                                        <span class="subtitle">Online Instructor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Counter  -->
                    </div>
                </div>
            </div>
            <div class="edu-course-area eduvibe-home-three-course counterup-overlay-top bg-image edu-section-gapTop edu-section-gapBottom">
                <div class="container eduvibe-animated-shape">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <span class="pre-title">Popular Courses</span>
                                <h3 class="title">Our Popular Courses</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row g-5 mt--25">
                        <!-- Start Single Card  -->
                        <div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-card card-type-1 bg-white radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="course-details.html">
                                            <img class="w-100" src="{{ asset('frontend/assets/images/course/course-01/course-01.jpg')}}" alt="Course Meta">
                                        </a>
                                        <div class="top-position status-group left-top">
                                            <span class="eduvibe-status status-01">Intermediate</span>
                                        </div>
                                        <div class="wishlist-top-right">
                                            <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="edu-meta meta-01">
                                            <li><i class="icon-file-list-4-line"></i>35 Lessons</li>
                                            <li><i class="icon-time-line"></i>18h 15m 44s</li>
                                        </ul>
                                        <h6 class="title"><a href="course-details.html">Competitive Strategy law for all students</a>
                                        </h6>
                                        <div class="edu-rating rating-default">
                                            <div class="rating">
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                            </div>
                                            <span class="rating-count">(18 Review)</span>
                                        </div>
                                        <div class="card-bottom">
                                            <div class="badge-transparent">Free</div>
                                            <ul class="edu-meta meta-01">
                                                <li><i class="icon-account-circle-line"></i>47 Students</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-card card-type-1 bg-white radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="course-details.html">
                                            <img class="w-100" src="assets/images/course/course-01/course-02.jpg" alt="Course Meta">
                                        </a>
                                        <div class="top-position status-group left-top">
                                            <span class="eduvibe-status status-01">Advanced</span>
                                        </div>
                                        <div class="wishlist-top-right">
                                            <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="edu-meta meta-01">
                                            <li><i class="icon-file-list-4-line"></i>48 Lessons</li>
                                            <li><i class="icon-time-line"></i>15h 38m 14s</li>
                                        </ul>
                                        <h6 class="title"><a href="course-details.html">Machine Learning A-Z: Hands-On Python and
                                                java</a>
                                        </h6>
                                        <div class="edu-rating rating-default">
                                            <div class="rating">
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                            </div>
                                            <span class="rating-count">(38 Review)</span>
                                        </div>
                                        <div class="card-bottom">
                                            <div class="price-list price-style-03">
                                                <div class="price current-price">$29.00</div>
                                                <div class="price old-price">$39.00</div>
                                            </div>
                                            <ul class="edu-meta meta-01">
                                                <li><i class="icon-account-circle-line"></i>65 Students</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-card card-type-1 bg-white radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="course-details.html">
                                            <img class="w-100" src="assets/images/course/course-01/course-03.jpg" alt="Course Meta">
                                        </a>
                                        <div class="top-position status-group left-top">
                                            <span class="eduvibe-status status-01">Basic</span>
                                        </div>
                                        <div class="wishlist-top-right">
                                            <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="edu-meta meta-01">
                                            <li><i class="icon-file-list-4-line"></i>80 Lessons</li>
                                            <li><i class="icon-time-line"></i>23h 13m 41s</li>
                                        </ul>
                                        <h6 class="title"><a href="course-details.html">Achieving Advanced in Insights with Big</a>
                                        </h6>
                                        <div class="edu-rating rating-default">
                                            <div class="rating">
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                            </div>
                                            <span class="rating-count">(28 Review)</span>
                                        </div>
                                        <div class="card-bottom">
                                            <div class="price-list price-style-03">
                                                <div class="price current-price">$59.00</div>
                                                <div class="price old-price">$69.00</div>
                                            </div>
                                            <ul class="edu-meta meta-01">
                                                <li><i class="icon-account-circle-line"></i>42 Students</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="300" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-card card-type-1 bg-white radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="course-details.html">
                                            <img class="w-100" src="assets/images/course/course-01/course-04.jpg" alt="Course Meta">
                                        </a>
                                        <div class="top-position status-group left-top">
                                            <span class="eduvibe-status status-01">Intermediate</span>
                                        </div>
                                        <div class="wishlist-top-right">
                                            <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="edu-meta meta-01">
                                            <li><i class="icon-file-list-4-line"></i>31 Lessons</li>
                                            <li><i class="icon-time-line"></i>14h 40m 20s</li>
                                        </ul>
                                        <h6 class="title"><a href="course-details.html">Education Makes A Person A Responsible
                                                Citizen</a>
                                        </h6>
                                        <div class="edu-rating rating-default">
                                            <div class="rating">
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                            </div>
                                            <span class="rating-count">(23 Review)</span>
                                        </div>
                                        <div class="card-bottom">
                                            <div class="price-list price-style-03">
                                                <div class="price current-price">$49.00</div>
                                                <div class="price old-price">$59.00</div>
                                            </div>
                                            <ul class="edu-meta meta-01">
                                                <li><i class="icon-account-circle-line"></i>46 Students</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="350" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-card card-type-1 bg-white radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="course-details.html">
                                            <img class="w-100" src="assets/images/course/course-01/course-05.jpg" alt="Course Meta">
                                        </a>
                                        <div class="top-position status-group left-top">
                                            <span class="eduvibe-status status-01">Advanced</span>
                                        </div>
                                        <div class="wishlist-top-right">
                                            <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="edu-meta meta-01">
                                            <li><i class="icon-file-list-4-line"></i>36 Lessons</li>
                                            <li><i class="icon-time-line"></i>20h 25m 28s</li>
                                        </ul>
                                        <h6 class="title"><a href="course-details.html">Building A Better World One Student At A
                                                Time</a>
                                        </h6>
                                        <div class="edu-rating rating-default">
                                            <div class="rating">
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                            </div>
                                            <span class="rating-count">(31 Review)</span>
                                        </div>
                                        <div class="card-bottom">
                                            <div class="badge-transparent">Free</div>
                                            <ul class="edu-meta meta-01">
                                                <li><i class="icon-account-circle-line"></i>91 Students</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="400" data-sal="slide-up" data-sal-duration="800">
                            <div class="edu-card card-type-1 bg-white radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="course-details.html">
                                            <img class="w-100" src="assets/images/course/course-01/course-06.jpg" alt="Course Meta">
                                        </a>
                                        <div class="top-position status-group left-top">
                                            <span class="eduvibe-status status-01">Basic</span>
                                        </div>
                                        <div class="wishlist-top-right">
                                            <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="edu-meta meta-01">
                                            <li><i class="icon-file-list-4-line"></i>21 Lessons</li>
                                            <li><i class="icon-time-line"></i>12h 45m 50s</li>
                                        </ul>
                                        <h6 class="title"><a href="course-details.html">Education is About Forming Faithful
                                                Disciples</a>
                                        </h6>
                                        <div class="edu-rating rating-default">
                                            <div class="rating">
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                            </div>
                                            <span class="rating-count">(35 Review)</span>
                                        </div>
                                        <div class="card-bottom">
                                            <div class="price-list price-style-03">
                                                <div class="price current-price">$79.00</div>
                                                <div class="price old-price">$89.00</div>
                                            </div>
                                            <ul class="edu-meta meta-01">
                                                <li><i class="icon-account-circle-line"></i>22 Students</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="load-more-btn mt--60 text-center">
                                <a class="edu-btn" href="course-style-3.html">View All Courses<i
                                            class="icon-arrow-right-line-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                        <div class="shape-image shape-image-1">
                            <img src="{{ asset('frontend/assets/images/shapes/shape-07.png')}}" alt="Shape Thumb" />
                        </div>
                        <div class="shape-image shape-image-2">
                            <img src="{{ asset('frontend/assets/images/shapes/shape-04.png')}}" alt="Shape Thumb" />
                        </div>
                        <div class="shape-image shape-image-3">
                            <img src="{{ asset('frontend/assets/images/shapes/shape-28.png')}}" alt="Shape Thumb" />
                        </div>
                        <div class="shape-image shape-image-4">
                            <img src="{{ asset('frontend/assets/images/shapes/shape-03-09.png')}}" alt="Shape Thumb" />
                        </div>
                        <div class="shape-image shape-image-5">
                            <img src="{{ asset('frontend/assets/images/shapes/shape-15-03.png')}}" alt="Shape Thumb" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Counterup Area  -->


        <!-- Start Accordion Area  -->
        <div class="edu-accordion-area eduvibe-home-three-accordion accordion-shape-1 edu-section-gap bg-color-white">
            <div class="container eduvibe-animated-shape">
                <div class="row g-5">
                    <div class="col-lg-6 gallery-wrapper">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="thumbnail" data-sal-delay="150" data-sal="fade" data-sal-duration="800">
                                    <img class="radius-small w-100" src="{{ asset('frontend/assets/images/about/about-02/accordion-gallery-01.jpg')}}" alt="Shape Images">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mt--35 mt_sm--15">
                                <div class="thumbnail" data-sal-delay="150" data-sal="fade" data-sal-duration="800">
                                    <img class="radius-small w-100" src="{{ asset('frontend/assets/images/about/about-02/accordion-gallery-02.jpg')}}" alt="Shape Images">
                                </div>
                                <div class="thumbnail mt--15" data-sal-delay="150" data-sal="fade" data-sal-duration="800">
                                    <img class="radius-small w-100" src="{{ asset('frontend/assets/images/about/about-02/accordion-gallery-03.jpg')}}" alt="Shape Images">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="accordion-style-1">
                            <div class="section-title text-start mb--40" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <span class="pre-title">About Us</span>
                                <h3 class="title">Get Every General Answers From Here</h3>
                            </div>

                            <div class="edu-accordion edu-accordion-01" id="accordionExample1" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <div class="edu-accordion-item">
                                    <div class="edu-accordion-header" id="headingOne">
                                        <button class="edu-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What does it take become an author?
                                        </button>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
                                        <div class="edu-accordion-body">
                                            Learning management system, combines a wide range of features to present
                                            a class setting without having the students come into a physical classroom. It all depends on the WordPress LMS plugin you go with, but
                                            in general.
                                        </div>
                                    </div>
                                </div>

                                <div class="edu-accordion-item">
                                    <div class="edu-accordion-header" id="headingTwo">
                                        <button class="edu-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            How to Change my Password easily?
                                        </button>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample1">
                                        <div class="edu-accordion-body">
                                            Learning management system, combines a wide range of features to present
                                            a class setting without having the students come into a physical
                                            classroom. It all depends on the WordPress LMS plugin you go with, but
                                            in general.
                                        </div>
                                    </div>
                                </div>

                                <div class="edu-accordion-item">
                                    <div class="edu-accordion-header" id="headingThree">
                                        <button class="edu-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How to Change my Plan using PayPal?
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample1">
                                        <div class="edu-accordion-body">
                                            Learning management system, combines a wide range of features to present
                                            a class setting without having the students come into a physical
                                            classroom. It all depends on the WordPress LMS plugin you go with, but
                                            in general.
                                        </div>
                                    </div>
                                </div>

                                <div class="edu-accordion-item">
                                    <div class="edu-accordion-header" id="headingFour">
                                        <button class="edu-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            How long it take to create a video course?
                                        </button>
                                    </div>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample1">
                                        <div class="edu-accordion-body">
                                            Learning management system, combines a wide range of features to present
                                            a class setting without having the students come into a physical
                                            classroom. It all depends on the WordPress LMS plugin you go with, but
                                            in general.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                    <div class="shape shape-1"><span class="shape-dot"></span></div>
                    <div class="shape-image shape-image-2">
                        <img src="{{ asset('frontend/assets/images/shapes/shape-11-04.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-3">
                        <img src="{{ asset('frontend/assets/images/shapes/shape-25-01.png')}}" alt="Shape Thumb" />
                    </div>
                </div>
            </div>
        </div>
        <!-- End Accordion Area  -->

        <div class="eduvibe-home-three-testimonial edu-testimonial-area testimonial-four-wrapper edu-section-gap bg-image">
            <div class="container eduvibe-animated-shape">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-8">
                        <div class="testimonial-activation pr--55 pr_lg--0 pr_md--0 pr_sm--0">

                            <!-- Start Tastimonial Card  -->
                            <div class="testimonial-card-box variation-2">
                                <div class="eduvibe-testimonial-three inner testimonial-card-activation-1 slick-arrow-style-2">
                                    <div class="single-card">
                                        <div class="rating">
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                        </div>
                                        <p class="description">“Lorem ipsum dolor sit amet, consectetur dloril adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.”</p>
                                        <div class="client-info">
                                            <div class="thumbnail">
                                                <img src="assets/images/testimonial/testimonial-04/client-04.png" alt="Client Images">
                                            </div>
                                            <div class="content">
                                                <h6 class="title">Michle A. Smith</h6>
                                                <span class="designation">Web Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-card">
                                        <div class="rating">
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                        </div>
                                        <p class="description">“Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.”</p>
                                        <div class="client-info">
                                            <div class="thumbnail">
                                                <img src="assets/images/testimonial/testimonial-04/client-01.png" alt="Client Images">
                                            </div>
                                            <div class="content">
                                                <h6 class="title">David M. Bard</h6>
                                                <span class="designation">Laravel Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-card">
                                        <div class="rating">
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                            <i class="on icon-Star"></i>
                                        </div>
                                        <p class="description">“Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum finibus bonorum.”</p>
                                        <div class="client-info">
                                            <div class="thumbnail">
                                                <img src="assets/images/testimonial/testimonial-04/client-03.png" alt="Client Images">
                                            </div>
                                            <div class="content">
                                                <h6 class="title">Lorraine D. Raines</h6>
                                                <span class="designation">WordPress Expert</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tastimonial Card  -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="testimonial-four-right-content">
                            <div class="section-title text-start" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <span class="pre-title">Testimonials</span>
                                <h3 class="title">Students Feedback</h3>
                            </div>
                            <p class="description mt--25 mb--25" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, venenatis
                                dictum et nec.</p>
                            <h6 class="subtitle" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">People Love To Learn With Us</h6>

                            <div class="row g-5">
                                <!-- Start Single Feature  -->
                                <div class="col-lg-6 col-md-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                    <div class="feature-style-3">
                                        <div class="feature-content">
                                            <h6 class="feature-title">90%</h6>
                                            <p class="feature-description">Students Complete Course Successfully </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Feature  -->

                                <!-- Start Single Feature  -->
                                <div class="col-lg-6 col-md-6" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                    <div class="feature-style-3">
                                        <div class="feature-content">
                                            <h6 class="feature-title">9/10</h6>
                                            <p class="feature-description">Users reported better learning outcomes.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Feature  -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                    <div class="shape-image shape-image-1">
                        <img src="{{ asset('frontend/assets/images/shapes/shape-04-03.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-2">
                        <img src="{{ asset('frontend/assets/images/shapes/shape-08.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-3">
                        <img src="{{ asset('frontend/assets/images/shapes/shape-19-03.png')}}" alt="Shape Thumb" />
                    </div>
                    <div class="shape-image shape-image-4">
                        <img src="{{ asset('frontend/assets/images/shapes/shape-16-01.png')}}" alt="Shape Thumb" />
                    </div>
                </div>
            </div>
        </div>
    @endsection


