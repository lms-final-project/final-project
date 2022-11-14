@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'profile'])

@section('instructor_panel')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif
    <form action="{{route('update_profile')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('post')
        <div class="row">
            <h5 class="text-center">My profile</h5>
            <div class="col-12">
                <div>
                    <label for="image" class="preview-img">
                        @if ($details->image)
                            <img src="{{ asset('storage/'.$details->image ) }}" alt="">
                        @else
                            <i class="ri-image-line"></i>
                            <p>upload image</p>
                        @endif
                    </label>
                    <input type="file" name="image" class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                </div>
            </div>
            <div class="mb-3">
                <label for="job_title" class="form-label">JobTitle</label>
                <x-form.text-input name='job_title' placeholder="job_title" value="{{ $details->job_title }} "/>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <x-form.text-input name='phone' placeholder="phone" value="{{ $details->phone }}"/>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <x-form.text-area-input name='description' value="{{ $details->description }}"/>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Social Links</label>
                <input type="text" name="social[facebook]" placeholder="Enter Facbook Link"value="{{ $details->social_links['facebook']}}">
                <input type="text" name="social[linkedin]" placeholder="Enter LinkedIn Link"value="{{ $details->social_links['linkedin']}}">
                <input type="text" name="social[twitter]" placeholder="Enter Twitter Link"value="{{ $details->social_links['twitter'] }}">
            </div>
            <div class="text-center py-4">
                <div class="button-group">
                    <button type="submit" class="edu-btn btn-dark btn-sm">
                        Update
                        <i class="icon-arrow-right-line-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')

@endpush
