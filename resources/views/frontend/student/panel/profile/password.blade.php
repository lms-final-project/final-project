@extends('frontend.student.panel.layouts.index', ['active_btn' => 'profile_password'])

@section('student_panel')


<div class="border border-light">
    <form action="{{route('change_password')}}"  method="POST">
        @csrf

        <div class="row">

            <h5 class="text-left  " style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Edit Password</h5>

            <div class="mb-3">
                <label for="oldPasswordInput" class="form-label">Old Password</label>
                <input name="old_password" type="password" @class(['form-control' , 'is-invalid' => $errors->has( 'old_password' )]) id="oldPasswordInput"
                    placeholder="Old Password">
                    @error('old_password')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="newPasswordInput" class="form-label">New Password</label>
                <input name="new_password" type="password" @class(['form-control' , 'is-invalid' => $errors->has( 'new_password' )]) id="newPasswordInput"
                    placeholder="New Password">
                    @error('new_password')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                <input name="new_password_confirmation" type="password" @class(['form-control' , 'is-invalid' => $errors->has( 'new_password_confirmation' )]) id="confirmNewPasswordInput"
                    placeholder="Confirm New Password">
                    @error('new_password_confirmation')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
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
