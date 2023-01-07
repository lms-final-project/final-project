@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'zoom'])

@section('instructor_panel')

    <form action="{{route('storeZoom',['course'=>$course->id])}}"  method="POST">
        @csrf

        <div class="row">
            <h5 class="text-center">Meeting</h5>

            <div class="mb-3">
                <label for="zoom_link" class="form-label">Link</label>
                <x-form.text-input name='zoom_link' placeholder="zoom_link" />
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date"@class(['form-control' , 'is-invalid' => $errors->has( 'date' )]) name='date' />
                
                @error('date')
    <span class="invalid-feedback">
        {{ $message }}
    </span>
@enderror
                </div>


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

@endpush
