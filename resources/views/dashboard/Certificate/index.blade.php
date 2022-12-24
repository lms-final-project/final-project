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
                                    <th>Student Name</th>
                                    <th>Course Name</th>
                                    <th>Instructor Name</th>
                                    <th>Certificate Status</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($All_Certificate as $certificate)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $certificate->student->name }}</td>
                                        <td>{{ $certificate->course->title }}</td>
                                        <td>{{ $certificate->course->instructor->name }}</td>
                                        <td> @if ($certificate->status == 'pinned')
                                            <span class="badge bg-primary p-2">{{ $certificate->status }}</span>
                                              @elseif($certificate->status == 'rejected')
                                            <span class="badge bg-danger">{{ $certificate->status }}</span>
                                             @elseif($certificate->status == 'accepted')
                                            <span class="badge bg-success">{{ $certificate->status }}</span>
                                             @endif</td>
                                             <td>
                                                <div class="d-flex">
                                                @if ($certificate->status == 'pinned')
                                                    <form action="{{route('dashboard.accept_certificate',['certificate'=>$certificate->id])  }}" method="post" class="mr-1">
                                                        @csrf

                                                        <button class="rounded btn btn-sm btn-outline-info">Accept</button>
                                                    </form>
                                                    <form action="{{route('dashboard.reject_certificate',['certificate'=>$certificate->id])  }}" method="post" >
                                                        @csrf

                                                        <button class="rounded btn btn-sm btn-outline-danger" >Reject</button>
                                                    </form>

                                                @endif</div>
                                            </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="5">No certificate requests send yet</th>
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
@push('scripts')
    <script>
        $('.delete-btn').on('click' , ()=>{
            Swal.fire({
                title: 'Are you sure to delete this service?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $('.delete-btn').closest('.delete-form').submit();
                }
            })
        })
    </script>
@endpush
