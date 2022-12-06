@extends('frontend.instructor.panel.layouts.index',['active_btn' => 'zoom'])

@section('instructor_panel')
<div class="border border-light">

        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">ScheduleMeeting</h5>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Link</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($ZoomLinks as $link)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td> <a href="{{$link->zoom_link}}">join meeting</a></td>
                      <td>{{$course->start_time}}-{{$course->end_time}}</td>
                      <td>{{$link->date}}</td>
                      <td><div class="d-flex">
                        <form action="{{ route('editZoom', ['link' => $link->id]) }}" method="get">
                            @csrf
                                <button class="btn btn-info btn-sm rounded-3"style="font-size: 12px">Edit</button>

                        </form>


                        <form class="ms-2" action="{{ route('deleteZoom', ['link' => $link->id]) }}" method="post">
                            @method('delete')
                            @csrf

                            <button class="btn btn-sm btn-danger rounded-3 " style="font-size: 12px">Delete</button>

                        </form>
                    </div></td>
                    </tr>
                    @empty
                    <div class="text-center">
                      <h5>There isn't any meeting added yet</h5>
                  </div>
                    @endforelse
                </tbody>
              </table>
              <div class="col-lg-12">
                <div class="load-more-btn mt--60 ">
                    <a class="eduu-btn" href="{{{route('createZoom',['course'=>$course->id])}}}"><i
                        class="ri-upload-line me-2"></i>Add Meeting</a>
                </div>
            </div>

        </div>
@endsection

@push('scripts')

@endpush
