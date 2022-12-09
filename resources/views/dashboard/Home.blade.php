@extends('dashboard.layouts.app',[
    'active_button' => 'dashboard',
    'page_title'    => 'category page'
])

@push('styles')
    <style>
        .row-table .card-body{
            transition: all .3s
        }
        .row-table .card-body:hover {
            background-color: #1abc9cb9;
            color: white
        }
        .row-table .card-body:hover i ,
        .row-table .card-body:hover span ,
        .row-table .card-body:hover h5 {
            color: white
        }
    </style>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-3 card-body br">
                    <a href="{{ route('dashboard.users.index') }}">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="ri-user-line text-c-green mb-1 d-block"></i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>{{ $users_count ?? 0 }}</h5>
                                <span>Users</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="ri-user-line text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$instructor_count ?? 0}}</h5>
                            <span>Instructors</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="ri-user-line text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$student_enrolled ?? 0}}</h5>
                            <span>Student Enrolled</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 card-body br">
                    <a href="{{ route('dashboard.category.index') }}">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="ri-article-line text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$category_count ?? 0}}</h5>
                            <span>Categories</span>
                        </div>
                    </div></a>

                </div>
            </div>

            <div class="row-table">
                <div class="col-sm-3 card-body br">
                    <a href="{{ route('dashboard.courses') }}">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="ri-html5-line text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$course_count ?? 0}}</h5>
                            <span>Accepted Courses</span>
                        </div>
                    </div></a>
                </div>
                <div class="col-sm-3 card-body br">
                    <a href="{{ route('dashboard.all_zoom_meeting') }}">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="ri-link text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$zoom_meeting_count ?? 0}}</h5>
                            <span>All Zoom Meeting</span>
                        </div>
                    </div></a>
                </div>
                <div class="col-sm-3 card-body br">
                    <a href="{{ route('dashboard.service.index') }}">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="ri-service-line text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$services_count ?? 0}}</h5>
                            <span>Available services</span>
                        </div>
                    </div></a>
                </div>
                <div class="col-sm-3 card-body br">
                    <a href="{{ route('dashboard.about.index') }}">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="ri-question-line text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{$generalQuestion_count ?? 0}}</h5>
                            <span>Common Questions</span>
                        </div>
                    </div></a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
