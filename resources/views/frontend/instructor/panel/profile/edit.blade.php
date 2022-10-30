@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'profile'])

@section('instructor_panel')

    <form action="{{route('update_profile')}}" enctype="multipart/form-data" method="POST">
        @csrf
@method('patch')
        <div class="row">
            <h5 class="text-center">My profile</h5>
            <div class="col-12">
                <div>
                    <label for="image" class="preview-img">
                        <i class="ri-image-line"></i>
                        <p>upload image</p>
                    </label>
                    <input type="file" name="image" required class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                </div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">	JobTitle</label>

                <x-form.text-input name='job_title' placeholder="job_title"/>

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Phone</label>

                <x-form.text-area-input name='phone'/>

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>

                <x-form.text-area-input name='description'/>

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Social Links</label>


                <input type="text" name="social[]" placeholder="Enter Facbook Link">
                <input type="text" name="social[]" placeholder="Enter LinkedIn Link">
                <input type="text" name="social[]" placeholder="Enter Twitter Link">

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
