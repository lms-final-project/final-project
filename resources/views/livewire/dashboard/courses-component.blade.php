<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <input type="text" class="form-control" wire:model='title'>
                    </div>
                    <div class="col-3">
                        <select wire:model='category_id'>
                            <option value="" selected >Select One</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->description }}</td>
                                    @if ($course->status == 'pinned')
                                        <td>
                                            <span  class="badge badge-pill badge-danger">
                                                {{ $course->status }}
                                            </span>
                                        </td>
                                    @elseif($course->status == 'accepted')
                                        <td>
                                            <span  class="badge badge-pill badge-warning">
                                                {{ $course->status  }}
                                            </span>
                                        </td>
                                    @else
                                        <td>
                                            <span  class="badge badge-pill badge-primary">
                                                {{ $course->status  }}
                                            </span>
                                        </td>
                                    @endif
                                    <td>{{ $course->category->name ?? 'test' }}</td>
                                    <td>{{ $course->type->name  }}</td>
                                    <td>
                                        @if ($course->status == 'pinned')
                                            <button class="btn btn-sm btn-outline-info rounded" wire:click='acceptCourse({{$course->id}})'>Accept</button>
                                            <button class="btn btn-sm btn-outline-danger rounded" wire:click='rejectCourse'>Reject</button>
                                        @endif
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
