@extends('frontend.layouts.app')


@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/instrcutor/app.css') }}">
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
                <div class="col-md-3" id="dashboard-links">
                    <div>
                        <ul class="dashboard__list__items">
                            <li @class(['active' => $active_btn == 'dashboard'])>
                                <a href="{{ route('instructor.panel') }}" class="d-flex justify-center items-center">
                                    <i class="ri-dashboard-line me-2"></i>
                                    dashboard
                                </a>
                            </li>
                            <li  @class(['active' => $active_btn == 'courses'])>
                                <a href="{{ route('courses.index') }}" class="d-flex justify-center items-center">
                                    <i class="ri-slideshow-line"></i>
                                    courses
                                </a>
                            </li>
                            <li  @class(['active' => $active_btn == 'profile_password'])>
                                <a href="{{route('edit_password')}}" class="d-flex justify-center items-center">
                                    <i class="ri-profile-line"></i>
                                    Edit Password
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9 ">
                    <div class="card-body">
                        @yield('instructor_panel')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/assets/js/instructor/app.js') }}"></script>
@endpush
