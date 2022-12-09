@extends('frontend.layouts.app')


@push('styles')

@endpush

@section('breadcrump')
    @include('frontend.layouts.breadcrumb' , [
        'title' => "All Courses",
        'items' => [
            [
                'name' => 'Home',
                'link' => '/'
            ],
            [
                'name' => 'Courses',
                'link' => '#'
            ]
        ]
    ])
@endsection

@section('content')
<div class="edu-course-area edu-section-gap bg-color-white">
    <div class="container">
        <div class="row g-5 mt--10">
            @forelse ($AllCourses as $course)
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
                                    <li><i class="icon-file-list-4-line"></i>{{$course->courseContents->count()}}</li>
                                    <li><i class="icon-time-line"></i>{{$course->start_time}}-{{$course->end_time}}</li>
                                </ul>
                                <h6 class="title"><a href="{{ route('course_details' , $course->id) }}">{{$course->title}}</a>
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
                                        <li><i class="icon-account-circle-line"></i>{{$course->users->count()}}</li>
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
        </div>

        {{-- <div class="row">
            <div class="col-lg-12 mt--60">
                <nav>
                    <ul class="edu-pagination">
                        <li><a href="#"><i class="ri-arrow-drop-left-line"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#"><i class="ri-arrow-drop-right-line"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div> --}}
    </div>
</div>
@endsection
