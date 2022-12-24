@extends('frontend.student.panel.layouts.index', ['active_btn' => 'certificate'])

@section('student_panel')
<div class="border border-light">

        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">All Certificate Requests</h5>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($All_Certificate_Request as $certificate)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                         <td>{{$certificate->course->title}}</td>

                         <td>
                               @if ($certificate->status=="accepted")
                                     <div class="d-flex">
                                        <span style="margin-right: 5px">accepted</span>
                                        <form class="ms-2 delete-form" action="{{route('student.certificate.print',['certificate'=>$certificate->id])}}" method="POST">
                                            @csrf
                                        <button type="submit" class="btn btn-success "style="font-size:10px"><i class="ri-printer-line"></i>  Print</button></form>
                                     </div>
                                     @else
                                     <span>{{$certificate->status}}</span>
                               @endif
                            </td>
                        <td><div class="d-flex">



                            <form class="ms-2 delete-form" action="{{route('student.certificate.delete',['certificate'=>$certificate->id])}}" method="POST">
                                @csrf

                                <button class="btn btn-sm btn-danger rounded-3 delete-btn" style="font-size: 12px">Delete</button>

                            </form>
                        </div></td>
                      </tr>
                  @empty
                  <div class="text-center">
                    <h5>There isn't any certification request  yet</h5>
                </div>
                  @endforelse
                </tbody>
              </table>



@endsection


@push('scripts')
    <script>
        $('.delete-btn').on('click' , function(){
            let delete_btn = $(this)
            $.confirm({
                title: 'Certificate will be deleted !',
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
