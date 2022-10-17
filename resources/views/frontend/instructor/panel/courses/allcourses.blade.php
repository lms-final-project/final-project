@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@section('instructor_panel')
<div class=" ">
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
            @forelse ($allcourses as $course)
            <!-- Start Single Card  -->

            <div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <div class="edu-card card-type-1 bg-white radius-small">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="course-details.html">
                                <img class="w-100" src="{{ asset("storage/") }}" alt="Course Meta">
                            </a>
                            <div class="top-position status-group left-top">
                                <span class="eduvibe-status status-01">{{$course->title}}</span>
                            </div>
                            <div class="top-position status-group left-top">
                                <span class="eduvibe-status status-01">{{}}</span>
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
            @empty
            <tr>
                <th colspan="5" class="text-center">
                    There isn't any course yet
                </th>
            </tr>
        @endforelse






@endsection

@push('scripts')
    <script>

    </script>
@endpush
