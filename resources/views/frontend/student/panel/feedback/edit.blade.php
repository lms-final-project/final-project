@extends('frontend.student.panel.layouts.index', ['active_btn' => 'feedback'])

@section('student_panel')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif
<div class="border border-light">
    <form action="{{route('feedback.update',$feedback->id)}}"  method="POST">
        @csrf
        @method('put')
        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Edit Feedback</h5>


            <div class="mb-3">
                <label for="feedback" class="form-label">Feedback</label>
                <input type="text" name="feedback" placeholder="Write feedback" value="{{$feedback->feedback}}">

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
