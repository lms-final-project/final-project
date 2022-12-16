@extends('frontend.student.panel.layouts.index', ['active_btn' => 'feedback'])

@section('student_panel')
<div class="border border-light">

        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Feedback For Academy</h5>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($feedbacks as $feedback)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$feedback->feedback}}</td>
                    <td>{{$feedback->rating}}</td>
                    <td><div class="d-flex">
                        <form action="{{ route('feedback.edit', ['feedback' => $feedback->id]) }}" method="get" >
                            @csrf
                                <button class="btn btn-info btn-sm rounded-3 "style="font-size: 12px">Edit</button>

                        </form>


                        <form class="ms-2 delete-form" action="{{ route('feedback.destroy', ['feedback' => $feedback->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger rounded-3 delete-btn" style="font-size: 12px">Delete</button>

                        </form>
                    </div></td>
                  </tr>
                  @empty
                  <div class="text-center">
                    <h5>There isn't any feedback added yet</h5>
                </div>
                  @endforelse
                </tbody>
              </table>
              <div class="col-lg-12">
                <div class="load-more-btn mt--60 ">
                    <a class="eduu-btn" href="{{ route('feedback.create') }}"><i
                        class="ri-upload-line me-2"></i>Add Feedback</a>
                </div>
            </div>

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
