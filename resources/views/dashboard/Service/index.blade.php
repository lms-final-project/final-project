@extends('dashboard.layouts.app',[

    'active_button' => 'service',
    'page_title'    => 'service page'

])

@section('content')
    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Create Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('dashboard.service.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Service</label>
                                <input type="text" name="title" @class(['form-control' , 'is-invalid' => $errors->has('title')])  id="question" value="{{ old('title') }}" placeholder="Enter Service ">
                                @error('title')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" name="description" @class(['form-control' , 'is-invalid' => $errors->has('description')])  id="description" value="{{ old('description') }}" placeholder="Enter Description ">
                                @error('description')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="images" class="form-label">Image</label>
            <input type="file" name="image" @class(['form-control','is-invalid'=>$errors->has('image')]) id="images">
            @error('image')
            <span class="invalid-feedback">{{ $message }}</span>

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
        Add Service
    </button>

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td>{{{ $loop->iteration }}}</td>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->description }}</td>
                            <td><img src="{{ $service->image }}" alt="">
                            <img class="rounded-circle" style="width:40px;height:40px"
                            src="{{ asset("storage/".$service->image) }}" alt="Course Meta">
                            </td>
                            <td>
                                <div class="d-flex">

                                    <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#exampleModalLive{{ $service->id }}">Update</button>
                                    <form action="{{ route('dashboard.service.destroy' , $service->id) }}" method="post" class="ml-2 delete-form">
                                        @csrf
                                        @method('delete')
                                        <input type="button" class="btn btn-sm btn-outline-danger delete-btn" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Edit Service Modal --}}
                        <div id="exampleModalLive{{$service->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLiveLabel">Edit Service {{$loop->iteration  }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('dashboard.service.update' , $service->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name">Service</label>
                                                    <input type="text" name="title" @class(['form-control' , 'is-invalid' => $errors->has('title')])  id="title" value="{{ old('title' , $service->title) }}" placeholder="Enter Service">
                                                    @error('title')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Description</label>
                                                    <input type="text" name="description" @class(['form-control' , 'is-invalid' => $errors->has('description')])  id="description" value="{{ old('description' , $service->description) }}" placeholder="Enter Description">
                                                    @error('description')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>



                                                <div class="col-12">
                                                    <div>
                                                        <label for="image" class="preview-img">
                                                        @if ($service->image)

                                                        <img class="rounded" style="width:60px;height:60px"
                                                        src="{{ asset("storage/".$service->image) }}" alt="Course Meta">
                                                    @else
                                                    <i class="ri-image-line"></i>
                                                    <p>upload image</p>
                                                @endif
                                                        </label>
<<<<<<< HEAD
                                                        <input type="file" name="image" class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
=======
                                                        <input type="file" name="image" required class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                                                        @error('image')
                                    <span class="invalid-feedback">{{ $message }}</span>

                                    @enderror
>>>>>>> ab7dadac78000679dee8ec6fafbf606f52633f91
                                                    </div>
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
                        {{-- End Edit Service Modal --}}

                    @empty
                        <tr>
                            <th colspan="5" class="text-center">
                                There isn't any Service yet
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
