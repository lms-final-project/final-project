@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@section('instructor_panel')
    <div class="container eduvibe-animated-shape">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">{{ $course->title }}</span>
                    <h3 class="title">Assignments</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="load-more-btn mt--60 ">
                <a class="eduu-btn" href="{{ route('assignments.create' ,['course_id' => $course->id , 'instructor_id' => $course->instructor_id]) }}"><i
                    class="ri-upload-line me-2"></i>Upload new assignment</a>
            </div>
        </div>
        <div class="row g-5 mt--25">
            {{-- @forelse ($courses as $course) --}}
                <!-- Start Single Card  -->
                {{-- <x-front.instructor.course-component :course="$course" /> --}}
            {{-- @empty --}}
                <h5 class="text-center">
                    There isn't any course yet
                </h5>
            {{-- @endforelse --}}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.delete-btn').on('click' , function(){
            let delete_btn = $(this)
            $.confirm({
                title: 'Course will be deleted !',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function(){
                            delete_btn.siblings('.delete-form').first().submit();
                        }
                    },
                    close: function () {
                    }
                }
            });
        })
    </script>
@endpush
