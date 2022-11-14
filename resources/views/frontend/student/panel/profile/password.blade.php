@extends('frontend.student.panel.layouts.index', ['active_btn' => 'profile_password'])

@section('student_panel')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif

<div class="border border-light">
    <form action="{{route('change_password')}}"  method="POST">
        @csrf

        <div class="row">

            <h5 class="text-left  " style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Edit Password</h5>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <x-form.text-input name='password'  placeholder="password" />
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <x-form.text-input name='new_password' placeholder="new_password" />
            </div>

            <div class="text-center f-10 py-4">
                <div class="button-group">
                    <button type="submit" class="rounded " style=" border-color:#525ee171;background-color:#525ee171;font-size:10px;font-weight:bold;padding: 10px;font-size:15px">
                        Update Password
                        <i class="icon-arrow-right-line-right"></i>
                    </button>
                </div>
            </div>



        </div>
    </form>
</div>



@endsection

@push('scripts')

@endpush
