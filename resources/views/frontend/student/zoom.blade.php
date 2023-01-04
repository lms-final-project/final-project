@extends('frontend.instructor.panel.layouts.zoom_index')

@section('zoom_panel')
<div class="border border-light">

        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Scheduled Meeting</h5>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Link</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>

                  </tr>
                </thead>
                <tbody>
                    @forelse ($ZoomLinks as $link)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td> <a href="{{$link->zoom_link}}">join meeting</a></td>
                      <td>{{$course->start_time}}-{{$course->end_time}}</td>
                      <td>{{$link->date}}</td>
                    </tr>
                    @empty
                    <div class="text-center">
                      <h5>There isn't any meeting added yet</h5>
                  </div>
                    @endforelse
                </tbody>
              </table>
              

        </div>
@endsection

@push('scripts')

@endpush
