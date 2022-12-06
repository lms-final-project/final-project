@extends('frontend.layouts.app')


@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/instrcutor/app.css') }}">
@endpush

@section('breadcrump')
    @include('frontend.layouts.breadcrumb' , [
        'title' => ' Schedule Meeting',
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
<div class="col-md-9 ">
    <div class="card-body">
        @yield('zoom_panel')
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
