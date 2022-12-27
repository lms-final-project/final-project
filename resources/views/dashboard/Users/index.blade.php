@extends('dashboard.layouts.app',[
    'active_button' => 'dashboard',
    'page_title'    => 'about page'
])

@section('content')
<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="name" id="Username" placeholder="User name">
                            <x-input_error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" id="Email" name="email" placeholder="Email address">
                            <x-input_error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" id="Password" name="password_confirmation" placeholder="Password Confirmation">
                            <x-input_error :messages="$errors->get('password')" class="mt-2" />
                            <x-input_error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="form-group mb-4" >
                            <label>Select role of user</label>
                            <select name="role"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected value="2">Instructor</option>
                                <option value="3">Student</option>
                               
                              </select>
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
    Add User
</button>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered at</th>
                                    <th>Role</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        @if ($user->role->name == 'instructor')
                                        <td>
                                            <span  class="badge badge-pill badge-primary">
                                                {{ $user->role->name }}
                                            </span>
                                        </td>
                                        @else
                                        <td>
                                            <span  class="badge badge-pill badge-warning">
                                                {{ $user->role->name }}
                                            </span>
                                        </td>
                                        @endif
                                        <td>
                                            <div class="d-flex">
                                                @if($user->role_id==3 && $user->requestTo_instructor==true)
                                            <form action="{{ route('dashboard.users.edit',['user'=>$user->id]) }}" method="get">
                                                @csrf
                                                    <button class="btn btn-info btn-sm rounded-3"style="font-size: 12px;margin-right:5px">Accept student to be instructor</button>

                                            </form>
                                        @endif

                                            <form class="ms-2 delete-form" action="{{  route('dashboard.users.destroy',['user'=>$user->id]) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <input type="button" class="btn btn-sm btn-danger delete-btn" value="Delete">
                                            </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="5">No users  yet</th>
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
