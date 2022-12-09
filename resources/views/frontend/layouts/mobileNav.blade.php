<style>
    .edu-header .logo a img {
    max-height: 50px;
    margin-left: -20px;

}

/* .header-quote .quote-icon a i, .header-quote .quote-icon button i{
    font-size:40px;
} */

</style>
@php
                        $current_route = Request::route()->getName();
@endphp
<div class="popup-mobile-menu">
    <div class="inner">
        <div class="header-top">
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('frontend/assets/images/logo/Knowldge Logo 1.png') }}" alt="Site Logo">
                </a>
            </div>
            <div class="close-menu">
                <button class="close-button">
                    <i class="ri-close-line"></i>
                </button>
            </div>
        </div>
        
        <ul class="mainmenu">
            <li ><a href="{{$current_route == 'home'? '#' : route('home')}}">Home</a>
            
            </li>
            <li ><a href="{{$current_route == 'home'? '#about_section' : route('home').'/#about_section'}}">About</a>
            
            </li>

            <li ><a href="{{$current_route == 'home'? '#category_section' : route('home').'/#category_section'}}">Categories</a>
             
            </li>
            <li ><a href="{{$current_route == 'home'? '#course_section' : route('home').'/#course_section'}}">Courses</a>
               
            </li>
            <li ><a href="{{$current_route == 'home'? '#service_section' : route('home').'/#service_section'}}">Services</a>
          
            </li>
            
        </ul>
    </div>
</div>
