
@extends('dashboard.layouts.app',[
    'active_button' => 'category',
    'page_title'    => 'category page'
])

@section('content')
    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('dashboard.category.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" @class(['form-control' , 'is-invalid' => $errors->has('name')])  id="name" value="{{ old('name') }}" placeholder="Enter service name">
                                @error('name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="icons">
                                    Select Icon
                                </label>
                                <select id="icons" name="icon_id" class="custom-select">
                                    <option selected disabled>Select icon</option>
                                    @foreach ($icons as $icon)
                                        <option value="{{ $icon->id }}">{{ $icon->name }}</option>
                                    @endforeach
                                </select>
                                @error('icon_id')
                                    <span class="text-danger text-sm">
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
        Add Category
    </button>

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{{ $loop->iteration }}}</td>
                            <td>{{ $category->name }}</td>
                            <td> <i class="{{ $category->icon->class }}"></i> </td>
                            <td>
                                <div class="d-flex">

                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalLive{{ $category->id }}">Update</button>
                                    @if ( $category->is_removable )
                                        <form action="{{ route('dashboard.category.destroy' , $category->id) }}" method="post" class="ml-2 delete-form">
                                            @csrf
                                            @method('delete')
                                            <input type="button" class="btn btn-sm btn-danger delete-btn" value="Delete">
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        {{-- Edit Category Modal --}}
                        <div id="exampleModalLive{{$category->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLiveLabel">Edit {{ $category->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('dashboard.category.update' , $category->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" @class(['form-control' , 'is-invalid' => $errors->has('name')])  id="name" value="{{ old('name' , $category->name) }}" placeholder="Enter service name">
                                                    @error('name')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="icons">
                                                        Select Icon
                                                    </label>
                                                    <select id="icons" name="icon_id" class="custom-select">
                                                        <option selected disabled>Select icon</option>
                                                        @foreach ($icons as $icon)
                                                            <option value="{{ $icon->id }}" @selected($icon->id == $category->icon_id) >{{ $icon->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('icon_id')
                                                        <span class="text-danger text-sm">
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
                        {{-- End Edit Category Modal --}}

                    @empty
                        <tr>
                            <th colspan="5" class="text-center">
                                There isn't any category yet
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
        $('.delete-btn').on('click' , function(){
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
                    $(this).closest('.delete-form').submit();
                }
            })
        })
    </script>
@endpush
