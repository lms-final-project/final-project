<style>
    .social-share li a {
        padding-top:15px !important;
    }
</style>
<footer class="eduvibe-footer-one edu-footer footer-style-default">
    <div class="footer-top">
        <div class="container eduvibe-animated-shape">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="edu-footer-widget">
                        <div class="logo">
                            <a href="#">
                                <img class="logo-light" src="{{ asset('frontend/assets/images/logo/Knowldge Logo 1.png') }}" alt="Site Logo">
                            </a>
                        </div>
                        <p class="description">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                        <ul class="social-share">
                            <li><a href="#"><i class="icon-Fb"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-Pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-Twitter"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="edu-footer-widget explore-widget">
                        <h5 class="widget-title">Explore</h5>
                        <div class="inner">
                            @php
                            $current_route = Request::route()->getName();
                        @endphp
                            <ul class="footer-link link-hover">
                                <li><a href="{{$current_route == 'home'? '#about_section' : route('home').'/#about_section'}}"><i class="icon-Double-arrow"></i>About Us</a></li>
                                <li><a href="{{$current_route == 'home'? '#category_section' : route('home').'/#category_section'}}"><i class="icon-Double-arrow"></i>Categories</a></li>
                                <li><a href="{{$current_route == 'home'? '#course_section' : route('home').'/#course_section'}}"><i class="icon-Double-arrow"></i>Courses</a></li>
                                <li><a href="{{$current_route == 'home'? '#service_section' : route('home').'/#service_section'}}"><i class="icon-Double-arrow"></i>Services</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="edu-footer-widget quick-link-widget">
                        <h5 class="widget-title">Useful Links</h5>
                        <div class="inner">
                            <ul class="footer-link link-hover">
                                <li><a href="#"><i class="icon-Double-arrow"></i>Contact Us</a></li>
                                <li><a href="#"><i class="icon-Double-arrow"></i>Facebook</a></li>
                                <li><a href="#"><i class="icon-Double-arrow"></i>Twitter</a></li>
                                <li><a href="#"><i class="icon-Double-arrow"></i>WhatsApp</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="edu-footer-widget">
                        <h5 class="widget-title">Contact Info</h5>
                        <div class="inner">
                            <div class="widget-information">
                                <ul class="information-list">
                                    <li><i class="icon-map-pin-line"></i>Palestine, Nablus
                                    </li>
                                    <li><i class="icon-phone-fill"></i><a href="">+9720569020059</a></li>
                                    <li><i class="icon-phone-fill"></i><a href="">+9720568592265</a></li>
                                    <li><i class="icon-mail-line-2"></i><a target="_blank" href="">KnowledgeAcademy@gmail.com</a></li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shape-dot-wrapper shape-wrapper d-md-block d-none">
                <div class="shape-image shape-image-1">
                    <img src="{{ asset('frontend/assets/images/shapes/shape-21-01.png')}}" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-2">
                    <img src="{{ asset('frontend/assets/images/shapes/shape-35.png')}}" alt="Shape Thumb" />
                </div>
            </div>
        </div>

</footer>
