<style>
    .mob-toggler, .mobile-menu{
        right:-40px !important;
    }
    .pcoded-navbar {
        width:240px;
    }
    .pcoded-navbar .pcoded-inner-navbar li.pcoded-menu-caption{
        color:#df99b9;
        font-size:16px;
    }
    .pcoded-navbar .pcoded-inner-navbar li.active > a, .pcoded-navbar .pcoded-inner-navbar li:focus > a, .pcoded-navbar .pcoded-inner-navbar li:hover > a {
    color: #df99b9 !important;
}
.pcoded-navbar .pcoded-inner-navbar li.active > a, .pcoded-navbar .pcoded-inner-navbar li:focus > a, .pcoded-navbar .pcoded-inner-navbar li:hover > a {
    color: #df99b9 !important;
}
.pcoded-navbar .pcoded-inner-navbar > li.active > a, .pcoded-navbar .pcoded-inner-navbar > li.pcoded-trigger > a {
    background: #df99b9 !important;
    color: #fff !important;
}
.card{
    border-top:3px solid #df99b9 !important
}
.text-c-green {
    color: #df99b9 !important;
}

.row-table .card-body:hover {
    background-color: #df99b9 !important;
    color: white !important;
}
.row-table .card-body:hover i, .row-table .card-body:hover span, .row-table .card-body:hover h5 {
    color: white !important;
}


</style>
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
             
            <img src="{{ asset('dashboard/assets/images/Knowledgeacademy1.png')}}" alt="" class="logo NewStyle">
           
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">

        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    
                    <div class="dropdown-menu dropdown-menu-right notification">
                        
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    
                                   
                                </div>
                            </li>
                            <li class="n-title">
                                <p class="m-b-0">EARLIER</p>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-2.jpg"
                                        alt="Generic placeholder image">
                                    
                                </div>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-1.jpg"
                                        alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i
                                                    class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                        <p>currently login</p>
                                    </div>
                                </div>
                            </li>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="assets/images/user/avatar-2.jpg"
                                        alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>Joseph William</strong><span class="n-time text-muted"><i
                                                    class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                        <p>Prchace New Theme and make payment</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="noti-footer">
                            <a href="#!">show all</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ asset('dashboard/assets/images/user/avatar-1.jpg') }}" class="img-radius"
                                alt="User-Profile-Image">
                            <span>{{ Auth::user()->name}}</span>

                            <a class="dud-logout logout-btn" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="#" class="dropdown-item"><i
                                        class="feather icon-user"></i> Profile</a></li>
                            <li>
                                <a href="#" class="dropdown-item">
                                    <i class="feather icon-mail"></i> My Messages
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">
                                    <i class="feather icon-lock"></i> Lock Screen
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
