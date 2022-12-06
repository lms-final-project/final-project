@extends('frontend.student.panel.layouts.index', ['active_btn' => 'profile'])

@section('student_panel')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif
<div class="border border-light">
    <form action="{{route('profile.update',$student_details->student_id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('put')
        <div class="row">

            <h5 class="text-left" style="font-size: 25px;color:rgba(38, 0, 255, 0.822)">Edit Profile Information</h5>
            <div class="col-12">
                <div>
                    <label for="image" class="preview-img">
                        @if ($student_details->image)
                            <img src="{{ asset('storage/'.$student_details->image ) }}" alt="">
                        @else
                            <i class="ri-image-line"></i>
                            <p>upload image</p>
                        @endif
                    </label>
                    <input type="file" name="image"@class(['custom-file-input' , 'is-invalid' => $errors->has( 'image' )]) class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                    @error('image')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
                </div>
            </div>

            <div class="mb-3">

                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone"@class([ 'is-invalid' => $errors->has( 'phone' )]) value="{{ $student_details->phone}}"
                @error('phone')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror

        </div>


            <div class="mb-3">
                <label for="description" class="form-label">Social Links</label>
                <input type="text" name="social[facebook]"@class([ 'is-invalid' => $errors->has( 'social[facebook]' )])value="{{ $student_details->social_links['facebook']}}"  placeholder="Enter Facbook Link">
                @error('social[facebook]')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
                <br>
                <input type="text" name="social[linkedin]"@class([ 'is-invalid' => $errors->has( 'social[linkedin]' )])value="{{ $student_details->social_links['linkedin']}}"  placeholder="Enter LinkedIn Link">
                @error('social[linkedin]')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
                <br>
                <input type="text" name="social[twitter]"@class([ 'is-invalid' => $errors->has( 'social[twitter]' )]) value="{{ $student_details->social_links['twitter']}}" placeholder="Enter Twitter Link">
                @error('social[twitter]')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
            </div>
        </div>

        <div class="text-center py-4">
            <div class="">
                <button type="submit" class="rounded " style=" border-color:#525ee171;background-color:#525ee171;font-size:10px;font-weight:bold;padding: 10px;font-size:15px">
                    Update
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
