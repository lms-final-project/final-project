@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@section('instructor_panel')
   
    <form action="{{ route('assignments.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <h5 class="text-center">Add New Assignment</h5>
            <div class="col-12">
                <div class="mb-3">
                    <label for="courseFile" class="form-label">Upload file</label>
                    <input type="file" name="file" @class(['form-control','is_invalid'=> $errors->has( 'file' ) ]) id="courseFile">
                    @error('file')
                    <span class="invalid-feedback">
                     {{ $message }}
                   </span>
    @enderror

                </div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <x-form.text-input name='title' placeholder='title'/>
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
                <input type="checkbox" id="is_active" name="is_active"@class(['is_invalid'=> $errors->has( 'is_active' ) ]) style="opacity: 1; height: 20px; width: fit-content; position: static">

                @error('is_active')
                <span class="invalid-feedback">
                 {{ $message }}
               </span>
@enderror

            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">StartDate</label>
                <input type="text" id="start_date" @class(['form-control','dateTimePicker','is_invalid'=> $errors->has( 'start_date' ) ]) name='start_date' />
                @error('start_date')
                 <span class="invalid-feedback">
                  {{ $message }}
                </span>
@enderror
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">EndDate</label>
                <input type="text" id="end_date" @class(['form-control','dateTimePicker','is_invalid'=> $errors->has( 'end_date' ) ]) name='end_date' />
                @error('end_date')
                 <span class="invalid-feedback">
                  {{ $message }}
                </span>
@enderror
            </div>
            <input type="hidden" name="course_id" value="{{ $course_id }}">
            <input type="hidden" name="instructor_id" value="{{ $instructor_id }}">
            <div class="text-center py-4">
                <div class="button-group">
                    <button type="submit" class="edu-btn  btn-sm">
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
