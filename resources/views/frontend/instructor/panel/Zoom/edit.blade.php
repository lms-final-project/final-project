@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'zoom'])

@section('instructor_panel')

    <form action="{{route('update ',['link'=>$link->id])}}"  method="POST">
        @csrf
        <div class="row">
            <h5 class="text-center">UpdateMeeting</h5>

            <div class="mb-3">
                <label for="zoom_link" class="form-label">Link</label>
                <input type="text" value="{{$link->zoom_link}}" name='zoom_link' placeholder="zoom_link"@class(['form-control' , 'is-invalid' => $errors->has( 'zoom_link' )]) required />
                @error('zoom_link')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" value="{{$link->date}}" required id="date"@class(['form-control' , 'is-invalid' => $errors->has( 'date' )]) name='date' />
                @error('date')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
                </div>


            <div class="text-center py-4">
                <div class="button-group">
                    <button type="submit" class="edu-btn btn-dark btn-sm">
                        Edit
                        <i class="icon-arrow-right-line-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')

@endpush
