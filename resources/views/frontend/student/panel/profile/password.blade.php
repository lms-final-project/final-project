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
                <label for="oldPasswordInput" class="form-label">Old Password</label>
                <input name="old_password" type="password" class="form-control " id="oldPasswordInput"
                    placeholder="Old Password">

            <div class="mb-3">
                <label for="newPasswordInput" class="form-label">New Password</label>
                <input name="new_password" type="password" class="form-control" id="newPasswordInput"
                    placeholder="New Password">

            </div>
            <div class="mb-3">
                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                    placeholder="Confirm New Password">
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
