@extends('frontend.instructor.panel.layouts.index')

@push('styles')
    <style>
        .preview-img {
            width: 100px;
            height: 100px;
            border-radius: 15px;
            border: 1px solid #e9e9e9;
            box-shadow: 0px 0px 4px #e9e9e975;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            overflow: hidden;
        }
        .preview-img .icon {
            font-size: 50px;
            color: #c2b9b9;
        }
        .uploaded-image{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        input, textarea {
            outline: none !important;
            box-shadow: none !important;
        }
        textarea.form-control, select {
            font-size: 16px !important;
            border-radius: 15px;
        }
        textarea.form-control:focus{
            border-color: var(--color-primary) !important;
        }
        select , option {
            font-size: 16px !important;
        }
        select {
            height: 30px !important;
        }
    </style>
@endpush
@section('instructor_panel')
    <form action="{{ route('courses.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <h5 class="text-center">Add New Course</h5>
            <div class="col-12">
                <div class="input-group ">
                    <label for="image" class="preview-img">
                        <i class="ri-image-line"></i>
                        <p>upload image</p>
                    </label>
                    <input type="file" name="image" required class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                </div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" required id="title" name="title" placeholder="course title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required placeholder="course description"></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_free" id="is-free">
                <label class="form-check-label" for="is-free">is free</label>
            </div>
            <div class="mb-3 price-section">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" required id="price" name="price" placeholder="course price">
            </div>
            <div class="mb-3 price-section">
                <label for="price_after_discount" class="form-label">Price after discount</label>
                <input type="text" class="form-control" required id="price_after_discount" name="price_after_discount" placeholder="course price after discount">
            </div>


            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="has_certificate" id="has-certificate">
                <label class="form-check-label" for="has-certificate">has certificate</label>
            </div>

            <div class="mb-3 certification-section">
                <label for="certification" class="form-label">Certification</label>
                <textarea name="certification" id="certification" class="form-control" placeholder="course certification"></textarea>
            </div>

            <div class="mb-3">
                <select class="form-select form-select-sm" name="course_type_id"   aria-label="Default select example">
                    <option selected disabled>Open this to select course level</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center py-4">
                <div class="button-group">
                    <button class="edu-btn btn-dark btn-sm">
                        Create
                        <i class="icon-arrow-right-line-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection




@push('scripts')
    <script>
        $('#image').on('change', function(e) {
            const file = e.target.files[0];
            const url = URL.createObjectURL(file);
            const img = `<img src="${url} " class="img-fluid uploaded-image" />`;
            $('.preview-img').html( img );
        });
    </script>

    <script>
        $('#is-free').on('change' , ()=> {
            if($('#is-free').is(':checked')){
                $('.price-section').slideUp();
                $('.price-section input').prop('required',false);
            }else{
                $('.price-section').slideDown();
                $('.price-section input').prop('required',true);
            }
        })

        $('.certification-section').hide();
        $('#has-certificate').on('change' , ()=> {
            if($('#has-certificate').is(':checked')){
                $('.certification-section').slideDown();
                $('.certification-section textarea').prop('required',true);
            }else{
                $('.certification-section').slideUp();
                $('.pcertification-section textarea').prop('required',false);
            }
        })
    </script>
@endpush
