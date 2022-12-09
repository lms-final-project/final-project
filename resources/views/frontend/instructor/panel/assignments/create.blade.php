@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@section('instructor_panel')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
    @endif
    <form action="{{ route('assignments.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <h5 class="text-center">Add New Assignment</h5>
            <div class="col-12">
                <div class="mb-3">
                    <label for="courseFile" class="form-label">Upload file</label>
                    <input type="file" name="file" class="form-control" id="courseFile">
                </div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <x-form.text-input name='description' placeholder='title'/>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <x-form.text-area-input name='description' />
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <x-form.number-input name='grade' />
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Active</label><br>
                <input type="checkbox" id="is_active" name="is_active" style="opacity: 1; height: 20px; width: fit-content; position: static">
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">StartDate</label>
                <input type="text" id="start_date" class="form-control dateTimePicker" name='start_date' />
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">EndDate</label>
                <input type="text" id="end_date" class="form-control dateTimePicker" name='end_date' />
            </div>
            <input type="hidden" name="course_id" value="{{ $course_id }}">
            <input type="hidden" name="instructor_id" value="{{ $instructor_id }}">
            <div class="text-center py-4">
                <div class="button-group">
                    <button type="submit" class="edu-btn btn-dark btn-sm">
                        Create
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
