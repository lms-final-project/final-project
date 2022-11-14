@extends('frontend.instructor.panel.layouts.index', ['active_btn' => 'courses'])

@push('styles')
@endpush

@section('instructor_panel')
    <h4 class="text-center"><span style="text-transform:capitalize ">{{ $course->title }}</span> - Outline</h4>

    <form action="{{ route('curriculum.store') }}" method="POST" class="card p-3 rounded-4 shadow">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <x-form.text-input name='title' placeholder="heading title"/>
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <button class="btn btn-success btn-lg mt-3" >Submit</button>
        </div>
    </form>

    <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
        @forelse ($course->courseHeadings as $heading)
            <div class="accordion-item">
                <h2 class="accordion-header d-flex" id="flush-headingOne">
                    <button class="accordion-button collapsed fs-2 w-75" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-{{$heading->id}}" aria-expanded="false" aria-controls="flush-{{$heading->id}}">
                        {{$heading->title}}
                    </button>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm ms-3 my-2 btn-outline-info" data-bs-toggle="modal" data-bs-target="#Modal-{{ $heading->id }}">
                            <i class="ri-pencil-line fs-3"></i>
                        </button>
                        <button type="button" class="btn btn-sm ms-3 my-2 btn-outline-danger delete-btn">
                            <i class="ri-delete-bin-line fs-3"></i>
                        </button>
                        <form action="{{ route('curriculum.destroy' , $heading->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                        </form>

                        <button class="btn btn-sm ms-3 my-2 btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#Content-{{ $heading->id }}">
                            <i class="ri-play-list-add-line fs-3"></i>
                        </button>

                    </div>
                </h2>
                <div id="flush-{{$heading->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    @if (count($heading->contents) > 0)
                        <ul>
                            @foreach ($heading->contents as $content)
                                <li>
                                    <div class="d-flex justify-content-between align-items-center w-75 pe-4">
                                        <p>{{ $content->title }}</p>
                                        <div class="d-flex align-items-center">
                                            @if ($content->link)
                                                <a href="{{ $content->link }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                                    <i class="ri-links-line fs-5"></i>
                                                </a>
                                            @endif
                                            <button class="btn {{ $content->link ? 'btn-primary' : 'btn-outline-primary ' }} btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#Content-link-{{ $content->id }}">
                                                <i class="ri-add-line fs-5"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm ms-2 delete-btn" data-bs-toggle="modal" >
                                                <i class="ri-delete-bin-line fs-5"></i>
                                            </button>
                                            <form action="{{ route('heading-content.destroy' , $content->id) }}" class="delete-form" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <button class="btn btn-outline-info btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#Content-title-{{ $content->id }}">
                                                <i class="ri-pencil-line fs-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <!-- Add Link To Content -->
                                <div class="modal fade" id="Content-link-{{ $content->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-2" id="exampleModalLabel">Add link to - {{ $content->title }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('content.add_link' , $content->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body content-section">
                                                    <x-form.text-input name='link' placeholder="google drive link" value="{{ $content->link }}"/>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary fs-5">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Link To Content -->
                                <div class="modal fade" id="Content-title-{{ $content->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-2" id="exampleModalLabel">Update title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('heading-content.update' , $content->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body content-section">
                                                    <label for="title">Title</label>
                                                    <x-form.text-input name='title' placeholder="heading content" value="{{ $content->title }}"/>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary fs-5">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center pt-3">
                            <h5>No Content Yet</h5>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Edit Heading Modal -->
            <div class="modal fade" id="Modal-{{ $heading->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-2" id="exampleModalLabel">Edit on -{{ $heading->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('curriculum.update' , $heading->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="modal-body ms">
                                <x-form.text-input name='title' placeholder="heading title" value="{{ $heading->title }}"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary fs-5">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Add Header Content -->
            <div class="modal fade" id="Content-{{ $heading->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="exampleModalLabel">Add content to - {{ $heading->title }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('heading-content.store' , $heading->id) }}" method="POST">
                            @csrf
                            <div class="modal-body content-section">
                                <div class="">
                                    <label for="content">Content</label>
                                    <input type="text" class="form-control" id="content" name="content" placeholder="content" required>
                                </div>
                            </div>
                            <input type="hidden" name="course_heading_id" value="{{ $heading->id }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary fs-5">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        @empty
            <div class="card-body border rounded text-center">
                <h5>There isn't any outline yet</h5>
            </div>
        @endforelse
    </div>

@endsection

@push('scripts')
    <script>
        $('.delete-btn').on('click' , function(){
            let delete_btn = $(this)
            $.confirm({
                title: 'That will be deleted, and can\'t be restored !',
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

    <script>
        // Create new topic
        function addContent(){
            let content = `   <div class="d-flex mb-2">
                                <input type="text" class="form-control" id="topic" name="contents[]" placeholder="course content" required>
                                <button type="button" class="btn btn-danger rounded-full ms-2 remove1-btn" >X</button>

                            </div>
                            <div class="d-flex mb-2">
                                <input type="text" class="form-control" id="link" name="links[]" placeholder="course content" required>
                                <button type="button" class="btn btn-danger rounded-full ms-2 remove2-btn" >X</button>
                            </div>`;

            $('.content-section').append(content);
        }
        // Remove an content input
        $('.content-section').on('click' , 'button.remove1-btn' , function() {
            $(this).parent().remove();
        })
        // Remove an link  input
        $('.content-section').on('click' , 'button.remove2-btn' , function() {
            $(this).parent().remove();
        })
    </script>
@endpush
