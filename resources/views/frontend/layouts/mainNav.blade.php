
<Style>
    .edu-header .logo a img {
    max-height: 107px;
}
.mainmenu-nav .mainmenu > li > a {
    color: #232B87;
    font-size: 18px;
    font-weight: 1000;
   
}

.edu-btn{
    color: #232B87 !important;
}

a.edu-btn:hover, button.edu-btn:hover {
    background: var(--color-dark);
    color: var(--color-white) !important;
}


a.edu-btn.btn-medium.header-button, button.edu-btn.btn-medium.header-button {
    
    border: 2px solid #232B87 !important;
}

</style>

<header class="edu-header disable-transparent  header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-2 col-md-6 col-6">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img class="logo-light" style="" src="{{ asset('frontend/assets/images/logo/Knowldge Logo 1.png')}}" alt="Site Logo">

                    </a>

                </div>

            </div>
            <div class="col-lg-8 d-none d-xl-block">
                <nav class="mainmenu-nav d-none d-lg-block">
                    <ul class="mainmenu">
                        <li class="has-droupdown"><a href="#">Home</a>
                         
                        </li>
                        <li class="has-droupdown"><a href="#">About Us</a>
                         
                        </li>

                        <li class="has-droupdown"><a href="#">Categories</a>
                         
                        </li>
                        <li class="has-droupdown"><a href="#">Courses</a>
                    
                        </li>
                        <li class="has-droupdown"><a href="#">FAGs</a>
                          
                                </li>
                               
                            </ul>
                        </li>
                    
                    </ul>
                </nav>
            </div>
            <div class="col-lg-6 col-xl-2 col-md-6 col-6">
                <div class="header-right d-flex justify-content-end">
                    <div class="header-quote">
                        @auth
                            @if (auth()->user()->role->name == 'instructor')
                                <form action="{{ route('instructor.panel') }}" method="GET">
                                    @csrf
                                    <button class="edu-btn btn-medium left-icon header-button ms-3 fs-5" >
                                        InstructorPanel
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('student.panel') }}" method="GET">
                                    @csrf
                                    <button class="edu-btn btn-medium left-icon header-button ms-3 fs-5" ">
                                        StudentPanel
                                    </button>
                                </form>
                            @endif

                            <div class="has-droupdown" >
                               <a style="  background-color: #525ee171;margin-left:5px;padding:10px;font-size:15px;font-weight:bold" class="rounded btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">


                                        {{ auth()->user()->name }}

                                </a>


                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            <div  id="user-btn">
                                                <a  style="color:#525ee1fd;font-size:10px;font-weight:bold"class="dropdown-item   btn-medium left-icon header-button fs-5" >
                                                    @csrf
                                                    LogOut
                                                </a>
                                            </div>
                                        </form>
                                    </li>
                                    <li>
                                        @if (auth()->user()->role->name == 'instructor')
                                        <a class="dropdown-item  btn-medium left-icon header-button fs-5 "style="color:#525ee1fd;font-size:10px;font-weight:bold" href="{{route('create_profile')}}">Profile</a>
                                        @else
                                        <a class="dropdown-item  btn-medium left-icon header-button fs-5 "style="color:#525ee1fd;font-size:10px;font-weight:bold" href="{{route('profile.create')}}">Profile</a>
                                        @endif

                                    </li>


                                </ul>
                            </div>

                        @endauth
                        @guest
                            <div class="quote-icon quote-user d-none d-md-block ml--15 ml_sm--5">
                                <a class="edu-btn btn-medium left-icon header-button" href="{{ route('login') }}"><i class="ri-user-line"></i>Login / Register</a>
                            </div>
                        @endguest

                        <div class="hamberger quote-icon d-block d-xl-none">
                            <button class="hamberger-button"><i class="ri-menu-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
