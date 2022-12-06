@extends('frontend.student.panel.layouts.index', ['active_btn' => 'feedback'])

@section('student_panel')

<div class="border border-light">
    <form action="{{route('feedback.update',$feedback->id)}}"  method="POST">
        @csrf
        @method('put')
        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Edit Feedback</h5>


            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback</label>
                <input type="text" name="feedback"@class(['form-control' , 'is-invalid' => $errors->has( 'feedback' )]) placeholder="Write feedback" value="{{$feedback->feedback}}">
                @error('feedback')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <select name="rating"class="form-select"style="color:#696969;font-weight: 500;border-radius: 10px;border-color:#D3D3D3"aria-label="Default select example">
                    <option  >Choose the number of stars that represent your rating</option>
                    <option value="1" {{ old('rating', $feedback->rating) == 1 ? 'selected' : '' }}>One</option>
                    <option value="2"{{ old('rating', $feedback->rating) == 2 ? 'selected' : '' }}>Two</option>
                    <option value="3"{{ old('rating', $feedback->rating) == 3 ? 'selected' : '' }}>Three</option>
                    <option value="4"{{ old('rating', $feedback->rating) == 4 ? 'selected' : '' }}>Four</option>
                    <option value="5"{{ old('rating', $feedback->rating) == 5 ? 'selected' : '' }}>Five</option>
                  </select>
                </div>
        </div>
        <div class="text-center py-4">
            <div class="">
                <button type="submit" class="rounded " style=" border-color:#525ee171;background-color:#525ee171;font-size:10px;font-weight:bold;padding: 10px;font-size:15px">
                    Edit
                    <i class="icon-arrow-right-line-right"></i>
                </button>
            </div>
        </div>

    </form>
</div>

@endsection

@push('scripts')

@endpush
