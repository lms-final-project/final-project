@extends('frontend.layouts.app')


@push('styles')
    <style>
        .dashboard__list__items {
            list-style: none
        }
    </style>

@endpush

@section('breadcrump')
    @include('frontend.layouts.breadcrumb' , [
        'title' => 'Instructor Dashboard',
        'items' => [
            [
                'name' => 'Home',
                'link' => '/'
            ],
            [
                'name' => 'Panel',
                'link' => '#'
            ]
        ]
    ])
@endsection

@section('content')
<div class="edu-section-gap bg-color-white">
    <div class="wrapper">
        <div class="container card">
            <div class="row card-body rounded">
                <div class="col-md-2 col-lg-3 border-end">
                    <div>
                        <ul class="dashboard__list__items">
                            <li>
                                <a href="{{ route('instructor.panel') }}" class="d-flex justify-center items-center">
                                    <i class="ri-dashboard-line me-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('courses.create') }}" class="d-flex justify-center items-center">
                                    <i class="ri-upload-line me-2"></i>
                                    Create Course
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-10 col-lg-9">
                    <div class="card-body">
                        @yield('instructor_panel')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
