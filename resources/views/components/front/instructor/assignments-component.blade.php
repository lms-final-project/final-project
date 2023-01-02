<div class="col-12 col-sm-12 col-xl-4 col-md-6" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
    <div class="edu-card card-type-1 bg-white radius-small border">
        <div class="inner">
            <div class="thumbnail pt-5 ">
                {{-- <a href="course-details.html" style="height: 200px">
                    <img class="w-100" src="{{ asset("storage/".$course->image) }}" alt="Course Meta">
                </a> --}}


            </div>
            <div class="content">
                <h6 class="title">
                   <span>{{ $assignment->title }}</span>
                </h6>

                <div class="card-bottom">
                    <div class="price-list price-style-03">

                            <div class="price current-price">{{$assignment->description}}</div>



                    </div>
                    <ul class="edu-meta meta-01">
                        <li><i class="icon-account-circle-line">{{$count}}</i></li>
                    </ul>

                </div>
                <div class="d-flex">
                    <form action="{{route('assignments.edit',$assignment->id)}}" method="get">
                        @csrf

                            <button class="btn btn-info btn-sm rounded-3"style="font-size: 18px"><i class="ri-edit-line"></i></button>


                    </form>
                    <form class="ms-3 delete-form" action="{{route('assignments.destroy',$assignment->id)}}" method="POST">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger btn-sm rounded-3 delete-btn "style="font-size: 16px"><i class="ri-delete-bin-6-line"></i></button>
                        <input type="hidden" name="course_id" value="{{ $assignment->course_id }}">
                    </form>
                    <form class="ms-3" action="{{route('Assessment',$assignment->id)}}" method="get">
                        @csrf
                       @method('post')
                            <button class="btn btn-success btn-sm rounded-3"style="font-size: 11px">Student Assessment</button>
                        
                    </form>


                </div>

            </div>
        </div>
    </div>
</div>
