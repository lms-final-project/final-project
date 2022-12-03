@extends('frontend.student.panel.layouts.index', ['active_btn' => 'feedback'])

@section('student_panel')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif
<div class="border border-light">
    <form action="{{route('feedback.store')}}"  method="POST">
        @csrf

        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Add Feedback</h5>


            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback</label>
                <input type="text" name="feedback" placeholder="Write feedback">

            </div>
            <div class="mb-3">
            <select name="rating"class="form-select" style="color:#696969;font-weight: 500;border-radius: 10px;border-color:#D3D3D3"aria-label="Default select example">
                <option selected >Choose the number of stars that represent your rating</option>
                <option  value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
                <option value="5">Five</option>
              </select>
            </div>
        </div>
        <div class="text-center py-4">
            <div class="">
                <button type="submit" class="rounded " style=" border-color:#525ee171;background-color:#525ee171;font-size:10px;font-weight:bold;padding: 10px;font-size:15px">
                    Create
                    <i class="icon-arrow-right-line-right"></i>
                </button>
            </div>
        </div>

    </form>
</div>

@endsection

@push('scripts')

@endpush
