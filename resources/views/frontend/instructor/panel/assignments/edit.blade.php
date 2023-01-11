@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@section('instructor_panel')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
    @endif
    <form action="{{route('assignments.update',$assignment->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <h5 class="text-center">Update Assignment</h5>
            <div class="col-12">
                <div class="mb-3">
                    <label for="courseFile" class="form-label">
                        @if ($assignment->file)
                        <span>File is:{{$assignment->file}}</span>

                    @else
                        <i class=""></i>
                        <p>upload file</p>
                    @endif
                    </label>
                    <input type="file" name="file" class="form-control" value="{{$assignment->file}}" id="courseFile">
                </div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type ="text"name='title' placeholder='title'value="{{$assignment->title}}" />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name='description'value="{{$assignment->description}}" />
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <x-form.number-input name='grade' value='{{$assignment->grade}}'/>
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Active</label><br>
                <input type="checkbox" id="is_active"value="{{$assignment->is_active}}" name="is_active" style="opacity: 1; height: 20px; width: fit-content; position: static">
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">StartDate</label>
                <input type="text" id="start_date"value="{{$assignment->start_date}}" class="form-control dateTimePicker" name='start_date' />
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">EndDate</label>
                <input type="text" id="end_date" value="{{$assignment->end_date}}" class="form-control dateTimePicker" name='end_date' />
            </div>
<input type="hidden" name="course_id" value="{{$assignment->course_id}}">
            <div class="text-center py-4">
                <div class="button-group">
                    <button type="submit" class="edu-btn  btn-sm">
                        Update
                        <i class="icon-arrow-right-line-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $('.dateTimePicker').datetimepicker({
            format:'Y/m/d H:i',
            formatTime:'H:i',
            formatDate:'Y/m/d',
        });
    </script>
@endpush
