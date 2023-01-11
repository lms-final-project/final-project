@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@section('instructor_panel')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
@endif
    <form action="{{route('courses.update', $course->id)  }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <h5 class="text-center"> Update Course</h5>
            <div class="col-12">
                <div>
                    <label for="image" class="preview-img">
                        @if ($course->image)
                            <img src="{{ asset('storage/'.$course->image) }}" alt="">
                        @else
                            <i class="ri-image-line"></i>
                            <p>upload image</p>
                        @endif
                    </label>
                    <input type="file" name="image" class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                </div>
            </div>
            <div class="col-12">

                <div class="mb-3">
                    <label for="courseFile" class="form-label">
                        @if ($course->file)
                        <span>File is:{{$course->file}}</span>

                    @else
                        <i class=""></i>
                        <p>upload file</p>
                    @endif
                    </label>
                    <input type="file" name="courseFile" class="form-control" id="courseFile">

                </div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label" >Title</label>
                <x-form.text-input name='title' placeholder="course title" value='{{ $course->title }}' />

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <x-form.text-area-input name='description' value='{{ $course->description }}' />
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" @checked($course->is_free) name="is_free" id="is-free">
                <label class="form-check-label" for="is-free">is free</label>
            </div>

            <div class="mb-3 price-section">
                <label for="price" class="form-label">Price</label>
                <x-form.number-input name='price' value='{{ $course->price }}'/>
            </div>
            <div class="mb-3 price-section">
                <label for="price_after_discount" class="form-label">Price after discount</label>
                <x-form.number-input name='price_after_discount' value='{{ $course->price_after_discount }}'/>
            </div>


            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="has_certificate" @checked($course->has_certificate) id="has-certificate">
                <label class="form-check-label" for="has-certificate">has certificate</label>
            </div>

            <div class="mb-3 certification-section">
                <label for="certification" class="form-label">Certification</label>
                <x-form.text-area-input name='certification' value='{{ $course->certification }}' />
            </div>

            <div class="mb-3">
                <label for="course_type_id" class="form-label">Level</label>
                <x-form.select-option :options="$types" name="course_type_id" value='{{ $course->course_type_id }}' />
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <x-form.select-option :options="$categories" name="category_id" value='{{ $course->category_id }}' />
            </div>
            <div class="mb-3">
                <label for="days_id" class="form-label">Days</label>
                <select name="days_id"class="form-select" aria-label="Default select example" required>
                    <option selected disabled>Open to pick one</option>
                    @foreach ($daysOfCourse as $days )
                    <option  value="{{$days->id}}"{{ old('$days_id', $days->id) == 2 ? 'selected' : '' }}>{{$days->days}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">StartDate</label>
                    <input type="date" id="start_date"class="form-control"value='{{$course->start_date}}' name='start_date'/>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">EndDate</label>
                        <input type="date" id="end_date"class="form-control" value='{{$course->end_date}}'name='end_date' />
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label ">StartTime</label>
                            <input name='start_time' type="text" id="timepicker" class="form-control  " value='{{$course->start_time}}'placeholder="start_time" required >
                            </div>
                            <div class="mb-3">
                                <label for="end_time" class="form-label ">EndTime</label>
                                <input name='end_time' type="text" id="timepicker" class="form-control  " value='{{$course->end_time}}'placeholder="start_time" required >
                                </div>
            
            <div class="mb-3">
                <div class="d-flex py-2">
                    <label for="topic" class="form-label">Topics</label>

                    <button type="button" class="btn btn-sm btn-success ms-5" onclick="addTopic()">add new topic</button>
                </div>
                <div class="topics-section">
                    @foreach ($course->topics as $topic)
                        <div class="d-flex mb-2">
                            <input type="text" value="{{ $topic->topic }}" class="form-control" id="topic" name="topics[]" placeholder="course topic" >
                            <button type="button" class="btn btn-danger rounded-full ms-2 delete-btn" >X</button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center py-4">
                <div class="button-group">
                    <button type="submit" class="edu-btn  btn-sm">
                        Update
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
        $(document).ready(function () {
            // when page is ready
            if($('#is-free').is(':checked')){
                $('.price-section').slideUp();
                $('.price-section input').prop('required',false);
            }else{
                $('.price-section').slideDown();
                $('.price-section input').prop('required',true);
            }

            // when change
            $('#is-free').on('change' , ()=> {
                if($('#is-free').is(':checked')){
                    $('.price-section').slideUp();
                    $('.price-section input').prop('required',false);
                }else{
                    $('.price-section').slideDown();
                    $('.price-section input').prop('required',true);
                }
            })



            if($('#has-certificate').is(':checked')){
                $('.certification-section').slideDown();
                $('.certification-section textarea').prop('required',true);
            }else{
                $('.certification-section').slideUp();
                $('.pcertification-section textarea').prop('required',false);
            }

            $('#has-certificate').on('change' , ()=> {
                if($('#has-certificate').is(':checked')){
                    $('.certification-section').slideDown();
                    $('.certification-section textarea').prop('required',true);
                }else{
                    $('.certification-section').slideUp();
                    $('.pcertification-section textarea').prop('required',false);
                }
            })
        });
    </script>
    <script>
        $('#timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '6:00pm',
            maxTime:'11:00pm',
            defaultTime: '6:00pm',
            startTime: '6:00pm',
            dynamic:false,
            dropdown: true,
            scrollbar: true,
        });
            </script>
@endpush
