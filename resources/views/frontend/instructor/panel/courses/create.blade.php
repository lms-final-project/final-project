@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@section('instructor_panel')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif
    <form action="{{ route('courses.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <h5 class="text-center">Add New Course</h5>
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
                <label for="title" class="form-label">Title</label>
                {{-- <input type="text" class="form-control" required id="title" name="title" placeholder="course title"> --}}
                <x-form.text-input name='title' placeholder="course title"/>

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                {{-- <textarea name="description" id="description" class="form-control" required placeholder="course description"></textarea> --}}
                <x-form.text-area-input name='description'/>

            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_free" id="is-free">
                <label class="form-check-label" for="is-free">is free</label>
            </div>
            <div class="mb-3 price-section">
                <label for="price" class="form-label">Price</label>
                <x-form.number-input name='price'/>
            </div>
            <div class="mb-3 price-section">
                <label for="price_after_discount" class="form-label">Price after discount</label>
                <x-form.number-input name='price_after_discount'/>
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
                <label for="course_type_id" class="form-label">Level</label>
                <x-form.select-option :options="$types" name="course_type_id" />
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <x-form.select-option :options="$categories" name="category_id" />
            </div>

            <div class="mb-3">
                <div class="d-flex py-2">
                    <label for="topic" class="form-label">Topics</label>
                    <button type="button" class="btn btn-sm btn-success ms-5" onclick="addTopic()">add new topic</button>
                </div>
                <div class="topics-section">
                    <div class="d-flex mb-2">
                        <input type="text" class="form-control" id="topic" name="topics[]" placeholder="course topic" >
                        <button type="button" class="btn btn-danger rounded-full ms-2 delete-btn" >X</button>
                    </div>
                </div>
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
    <script>
        // Create new topic
        function addTopic(){
            let topic = `   <div class="d-flex mb-2">
                                <input type="text" class="form-control" id="topic" name="topics[]" placeholder="course topic">
                                <button type="button" class="btn btn-danger rounded-full ms-2 delete-btn" >X</button>
                            </div>`;

            $('.topics-section').append(topic);
        }
        // Delete an topic field
        $('.topics-section').on('click' , 'button.delete-btn' , function() {
            $(this).parent().remove();
        })
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
