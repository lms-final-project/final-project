@extends('frontend.instructor.panel.layouts.index',['active_btn' => 'courses'])

@section('instructor_panel')
<div class="border border-light">

        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Evaluate the students' solution to this assignment</h5>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">StudentName</th>
                    <th scope="col">AssignmentSolution</th>
                    <th scope="col">Assessment</th>
                    <th scope="col">Operation</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($AllStudent as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$student->user_id->name}}</td>
                        @if($student->status == "completed")
                        <td><a  href="{{route('download',$student->solution_file)}}"><i class="ri-file-download-line"></i>Solution File</a></td>
                        @else
                        <td class="text-danger">No Solution Uploaded</td>
                        @endif
                        @if ($student->status == "assigned")
                        <td>-</td>
                        @else
                        <td>{{$student->assessment}}</td> 
                        @endif
                        
                        
                       <td> <div class="d-flex">
                                                @if($student->assessment=='waiting assessment' && $student->status == "completed")
                                                    <form action="{{route('PassAssessment',$student->assignment_id)}}" method="GET" >
                                                        @csrf
                                                    @method('post')
                                                            <input  type="hidden" name="user_id" value="{{$student->user_id->id}}">
                                                        <button  class="rounded btn btn-sm btn-info "style="font-size:13px;margin-right:5px">Pass</button>
                                                    </form>
                                                    <form action="{{route('FailAssessment',$student->assignment_id)}}" method="GET">
                                                        @csrf
                                                        @method('post')
                                                        <input  type="hidden" name="user_id" value="{{$student->user_id->id}}">
                                                        <button class="rounded btn btn-sm btn-danger "style="font-size:13px" >Fail</button>
                                                    </form>@endif

                                                </div></td>
                    </tr>
                    @empty
                    <div class="text-center">
                      <h5>There isn't any student solve assignment yet</h5>
                  </div>
                    @endforelse
                </tbody>
              </table>
             

        </div>
@endsection

@push('scripts')
    <script>
        $('.delete-btn').on('click' , function(){
            let delete_btn = $(this)
            $.confirm({
                title: 'Course will be deleted !',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function(){
                            delete_btn.siblings('.delete-form').first().submit();
                        }
                    },
                    close: function () {
                    }
                }
            });
        })
    </script>
@endpush
