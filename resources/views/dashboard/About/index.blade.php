@extends('dashboard.layouts.app',[

    'active_button' => 'about',
    'page_title'    => 'about page'

])

@section('content')
    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Create About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('dashboard.about.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Question</label>
                                <input type="text" name="question" @class(['form-control' , 'is-invalid' => $errors->has('question')])  id="question" value="{{ old('question') }}" placeholder="Enter Question ">
                                @error('question')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Answer</label>
                                <input type="text" name="answer" @class(['form-control' , 'is-invalid' => $errors->has('answer')])  id="answer" value="{{ old('answer') }}" placeholder="Enter Answer ">
                                @error('answer')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn  btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalLive">
        Add Question
    </button>

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($abouts as $about)
                        <tr>
                            <td>{{{ $loop->iteration }}}</td>
                            <td>{{ $about->question }}</td>
                            <td>{{ $about->answer }}</td>
                            <td>
                                <div class="d-flex">

                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalLive{{ $about->id }}">Update</button>
                                    <form action="{{ route('dashboard.about.destroy' , $about->id) }}" method="post" class="ml-2 delete-form">
                                        @csrf
                                        @method('delete')
                                        <input type="button" class="btn btn-sm btn-outline-danger delete-btn" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Edit About Modal --}}
                        <div id="exampleModalLive{{$about->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLiveLabel">Edit Question {{$loop->iteration  }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('dashboard.about.update' , $about->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name">Question</label>
                                                    <input type="text" name="question" @class(['form-control' , 'is-invalid' => $errors->has('question')])  id="question" value="{{ old('question' , $about->question) }}" placeholder="Enter question">
                                                    @error('question')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Answer</label>
                                                    <input type="text" name="answer" @class(['form-control' , 'is-invalid' => $errors->has('answer')])  id="answer" value="{{ old('answer' , $about->answer) }}" placeholder="Enter answer">
                                                    @error('answer')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn  btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- End Edit About Modal --}}

                    @empty
                        <tr>
                            <th colspan="5" class="text-center">
                                There isn't any question yet
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
