<nav class="pcoded-navbar">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('dashboard/assets/images/user/TariqAdmin.jpg')}}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>{{ Auth::user()->name }}</span>
                        <div id="more-details">manager<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        
                        <li class="list-group-item logout-btn">
                            <i class="feather icon-log-out m-r-5"></i>
                            Logout
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li  @class(['nav-item', 'active' => $active_button == 'dashboard'])>
                    <a href="{{ route('dashboard.home') }}" class="nav-link"><span class="pcoded-micon">
                        <i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('dashboard.users.index')}}" @class(['active' =>$active_button == 'users'])>
                        <span class="pcoded-micon"><i  class="ri-user-line text-c-white mb-1 d-block"></i></span>
                       <span class="pcoded-mtext">Users</span>
                    </a>

                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-micon"><i class="ri-html5-line text-c-white mb-1 d-block"></i></span>
                        <span class="pcoded-mtext">Courses</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li @class(['active' =>$active_button == 'courses'])>
                            <a href="{{ route('dashboard.courses') }}" >
                                <i class="ri-slideshow-3-line text-c-white mb-1 d-block">   Show All</i>
                            </a>
                        </li>
                    </ul>
                    <ul class="pcoded-submenu">
                        <li @class(['active' =>$active_button == 'category'])>

                            <a href="{{ route('dashboard.category.index') }}" >
                                <i class="ri-article-line text-c-white mb-1 d-block">   Categories</i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{route('dashboard.about.index')}}" @class(['active' =>$active_button == 'about'])>
                        <span class="pcoded-micon"> <i class="ri-question-line text-c-white mb-1 d-block"></i></span>
                        <span class="pcoded-mtext">About</span>
                    </a>

                </li>
                <li class="nav-item ">
                    <a href="{{route('dashboard.service.index')}}" @class(['active' =>$active_button == 'service'])>
                        <span class="pcoded-micon"><i class="ri-service-line text-c-white mb-1 d-block"></i></span>
                       <span class="pcoded-mtext">Services</span>
                    </a>

                </li>

                <li class="nav-item ">
                    <a href="{{route('dashboard.all_payments')}}" @class(['active' =>$active_button == 'payment'])>
                        <span class="pcoded-micon"><i class="ri-money-dollar-circle-line text-c-white mb-1 d-block"></i></span>
                       <span class="pcoded-mtext">Payment</span>
                    </a>

                </li>


                <li class="nav-item ">
                    <a href="{{route('dashboard.all_certificate')}}" @class(['active' =>$active_button == 'certificate'])>
                        <span class="pcoded-micon"><i  class="ri-article-line text-c-white mb-1 d-block"></i></span>
                       <span class="pcoded-mtext">Certificate</span>
                    </a>

                </li>

                

            </ul>
        </div>
    </div>
</nav>
