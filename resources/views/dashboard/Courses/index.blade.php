@extends('dashboard.layouts.app',[
    'active_button' => 'courses',
    'page_title'    => 'category page'
])

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <livewire:dashboard.courses-component>
@endsection


@push('scripts')
    @livewireScripts
@endpush
