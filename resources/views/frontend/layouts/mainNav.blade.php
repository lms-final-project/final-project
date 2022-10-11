<header class="edu-header disable-transparent  header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-2 col-md-6 col-6">
                <div class="logo">
                    <a href="index.html">
                        <img class="logo-light" src="{{ asset('frontend/assets/images/logo/logo.png')}}" alt="Site Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-xl-block">
                <nav class="mainmenu-nav d-none d-lg-block">
                    <ul class="mainmenu">
                        <li class="has-droupdown"><a href="#">Home</a>
                            <ul class="submenu">
                                <li><a href="index-one.html">Home 1</a></li>
                                <li><a href="index-two.html">Home 2</a></li>
                                <li><a href="index-three.html">Home 3</a></li>
                                <li><a href="index-four.html">Home 4</a></li>
                                <li><a href="index-five.html">Home 5</a></li>
                                <li><a href="index.html">Landing Demo</a></li>
                            </ul>
                        </li>
                        <li class="has-droupdown"><a href="#">About</a>
                            <ul class="submenu">
                                <li><a href="about-us-1.html">About Us 1</a></li>
                                <li><a href="about-us-2.html">About Us 2</a></li>
                                <li><a href="about-us-3.html">About Us 3</a></li>
                            </ul>
                        </li>

                        <li class="has-droupdown"><a href="#">Courses</a>
                            <ul class="submenu">
                                <li><a href="course-style-1.html">Course Style 1</a></li>
                                <li><a href="course-style-2.html">Course Style 2</a></li>
                                <li><a href="course-style-3.html">Course Style 3</a></li>
                                <li><a href="course-style-4.html">Course Style 4</a></li>
                                <li><a href="course-style-5.html">Course Style 5</a></li>
                                <li><a href="course-filter.html">Course Filter</a></li>
                                <li><a href="course-carousel.html">Course Carousel</a></li>
                                <li><a href="course-sidebar.html">Course With Sidebar</a></li>
                                <li><a href="course-details.html">Course Details 1</a></li>
                                <li><a href="course-details-2.html">Course Details 2</a></li>
                            </ul>
                        </li>
                        <li class="has-droupdown"><a href="#">Pages</a>
                            <ul class="submenu">
                                <li class="has-droupdown"><a href="#">Event</a>
                                    <ul class="submenu">
                                        <li><a href="event-grid.html">Event Grid</a></li>
                                        <li><a href="event-list.html">Event List</a></li>
                                        <li><a href="event-carousel.html">Event Carousel</a></li>
                                        <li><a href="event-details.html">Event Details</a></li>
                                    </ul>
                                </li>

                                <li class="has-droupdown"><a href="#">Gallery</a>
                                    <ul class="submenu">
                                        <li><a href="gallery-grid.html">Gallery Grid</a></li>
                                        <li><a href="gallery-masonry.html">Gallery Masonry</a></li>
                                    </ul>
                                </li>

                                <li class="has-droupdown"><a href="#">Instructor</a>
                                    <ul class="submenu">
                                        <li><a href="instructor-one.html">Instructor 1</a></li>
                                        <li><a href="instructor-two.html">Instructor 2</a></li>
                                        <li><a href="instructor-three.html">Instructor 3</a></li>
                                        <li><a href="instructor-profile.html">Instructor Profile</a></li>
                                    </ul>
                                </li>

                                <li class="has-droupdown"><a href="#">Contact</a>
                                    <ul class="submenu">
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                        <li><a href="contact-me.html">Contact Me</a></li>
                                    </ul>
                                </li>

                                <li><a href="faq.html">FAQ Page</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="purchase-guide.html">Purchase Guide</a></li>
                                <li><a href="testimonial.html">Testimonial</a></li>
                                <li><a href="coming-soon.html">Comming Soon</a></li>
                                <li><a href="login-register.html">Login/Register</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>
                        </li>
                        <li class="has-droupdown"><a href="#">Blog</a>
                            <ul class="submenu">
                                <li class="has-droupdown"><a href="#">Blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog-grid-1.html">Blog Grid 1</a></li>
                                        <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                        <li><a href="blog-grid-3.html">Blog Grid 3</a></li>
                                        <li><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a></li>
                                        <li><a href="blog-standard.html">Blog Standard</a></li>
                                        <li><a href="blog-carousel.html">Blog Carousel</a></li>
                                    </ul>
                                </li>
                                <li class="has-droupdown"><a href="#">Blog Details</a>
                                    <ul class="submenu">
                                        <li><a href="blog-details-left-sidebar.html">Blog Details 1</a></li>
                                        <li><a href="blog-details-right-sidebar.html">Blog Details 2</a></li>
                                        <li><a href="blog-details.html">Blog Details 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-droupdown"><a href="#">Shop</a>
                            <ul class="submenu">
                                <li><a href="shop.html">Shop Page</a></li>
                                <li><a href="product-details.html">Product Details</a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
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
                                        Panel
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('logout') }}" method="POST">
                                <div class="quote-icon d-none d-md-block" id="user-btn">
                                    <a class="edu-btn btn-medium left-icon header-button fs-5" >
                                        @csrf
                                        <i class="ri-user-line"></i>
                                        <span>
                                            {{ auth()->user()->name }}
                                        </span>
                                    </a>
                                </div>
                            </form>
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
