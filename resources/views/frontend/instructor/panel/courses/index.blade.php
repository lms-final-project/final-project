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
            @forelse ($courses as $course)
            <!-- Start Single Card  -->

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
                                    <span class="badge bg-danger p-2">{{ $course->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $course->status }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="content">
                            <h6 class="title">
                                <a href="course-details.html">{{ $course->title }}</a>
                            </h6>

                            <div class="card-bottom">
                                <div class="price-list price-style-03">
                                    @if ($course->is_free)
                                        <div class="price current-price">Free</div>
                                    @else
                                        <div class="price current-price">{{ $course->price }}</div>
                                        <div class="price old-price">$69.00</div>
                                    @endif
                                </div>
                                <ul class="edu-meta meta-01">
                                    <li><i class="icon-account-circle-line"></i>42 Students</li>
                                </ul>

                            </div>
                            <div class="d-flex">
                                <form action="{{ route('courses.edit', $course->id) }}" method="get">
                                    @csrf
                                    <button class="btn btn-info btn-sm rounded-3"style="font-size: 12px">Edit</button>
                                </form>

                                <form class="ms-3"  action="{{ route('courses.destroy', $course->id) }}" method="POST" >
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm rounded-3"style="font-size: 12px" >Delete</button>
                                </form>
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
