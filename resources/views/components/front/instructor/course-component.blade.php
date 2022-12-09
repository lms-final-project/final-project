<div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
    <div class="edu-card card-type-1 bg-white radius-small border">
        <div class="inner">
            <div class="thumbnail pt-5 ">
                {{-- <a href="course-details.html" style="height: 200px">
                    <img class="w-100" src="{{ asset("storage/".$course->image) }}" alt="Course Meta">
                </a> --}}
                <div class="top-position status-group left-top shadow-sm">
                    <span class="eduvibe-status status-01">{{ $course->type->name }}</span>
                </div>
                <div class="top-position status-group right-top shadow-sm">
                    @if ($course->status == 'pinned')
                        <span class="badge bg-primary p-2">{{ $course->status }}</span>
                    @elseif($course->status == 'rejected')
                        <span class="badge bg-danger">{{ $course->status }}</span>
                    @elseif($course->status == 'accepted')
                        <span class="badge bg-success">{{ $course->status }}</span>
                    @endif
                </div>
            </div>
            <div class="content">
                <h6 class="title">
                    <a href="{{ route('course_details', $course->id) }}">{{ $course->title }}</a>
                </h6>

                <div class="card-bottom">
                    <div class="price-list price-style-03">
                        @if ($course->is_free)
                            <div class="price current-price">Free</div>
                        @else
                            <div class="price current-price">{{ '$' . $course->price }}</div>
                        @endif
                    </div>
                    <ul class="edu-meta meta-01">
                        <li><i class="icon-account-circle-line"></i>{{$course->users->count()}}</li>
                    </ul>

                </div>
                <div class="d-flex">
                    <form action="{{ route('courses.edit', $course->id) }}" method="get">
                        @csrf
                        @if ($course->status != 'rejected')
                            <button class="btn btn-info btn-sm rounded-3"style="font-size: 18px"><i class="ri-edit-line"></i></button>
                        @endif
                    </form>
                    <form class="ms-3 delete-form" action="{{ route('courses.destroy', $course->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm rounded-3 "style="font-size: 16px"><i class="ri-delete-bin-6-line"></i></button>
                    </form>

                    <form class="ms-3" action="{{ route('curriculum.show', $course->id) }}" method="get">
                        @csrf
                        @if ($course->status == 'accepted')
                            <button class="btn btn-success btn-sm rounded-3"style="font-size: 10px">Add
                                curriculum</button>
                        @endif
                    </form>
                    <form class="ms-3" action="{{route('indexZoom',['course'=>$course->id])}}" method="get">
                        @csrf
                        @if ($course->status == 'accepted')
                            <button class="btn  btn-secondary btn-sm rounded-3"style="font-size: 10px">Scheduling ZoomLinks</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
