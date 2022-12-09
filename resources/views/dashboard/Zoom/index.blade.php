@extends('dashboard.layouts.app',[
    'active_button' => 'dashboard',
    'page_title'    => 'about page'
])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Zoom_Meeting</th>
                                    <th>Date</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($All_Zoom_Meeting as $meeting)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$meeting->course->title }}</td>
                                     <td ><a href="{{$meeting->zoom_link}}"> Join Meeting </a> </td>
                                        <td>{{$meeting->date}}</td>
                                        <td>{{$meeting->created_at}}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="5">No Meeting has been registered for any course yet</th>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
