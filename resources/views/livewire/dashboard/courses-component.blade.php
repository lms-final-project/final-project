<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">1</div>
                    <div class="col-3">2</div>
                    <div class="col-3">3</div>
                    <div class="col-3">4</div>
                </div>
            </div>
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
                            @forelse ($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->is_free ? 'Free' : 'Not free' }}</td>
                                    <td>{{ $course->price ? $course->price : '-' }}</td>
                                    <td>{{ $course->category->name  }}</td>
                                    <td>{{ $course->type->name  }}</td>

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
