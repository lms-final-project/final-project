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

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="5">No users yet</th>
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
