@extends('frontend.student.panel.layouts.index', ['active_btn' => 'profile'])

@section('student_panel')
<div class="border border-light">
    <form action="{{route('profile.store')}}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">My Profile Information</h5>
            <div class="col-12">
                <div>
                    <label for="image" class="preview-img">
                        <i class="ri-image-line"></i>
                        <p>upload image</p>
                    </label>
                    <input type="file" name="image" class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                </div>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <x-form.text-input name='phone' placeholder="phone" />
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Social Links</label>
                <input type="text" name="social[facebook]" placeholder="Enter Facbook Link">
                <br>
                <input type="text" name="social[linkedin]" placeholder="Enter LinkedIn Link">
                <br>
                <input type="text" name="social[twitter]" placeholder="Enter Twitter Link">
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
