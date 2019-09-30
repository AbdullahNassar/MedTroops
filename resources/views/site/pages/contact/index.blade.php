@extends('site.layouts.master')
@section('meta')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Med Troops">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Med Troops">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="{{asset('vendors/site/EN/image/png')}}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
@endsection
@section('title','Medtroops')
@section('styles')
    @if(Config::get('app.locale') == 'ar')
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/owl.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/rtl.css')}}">
    @elseif(Config::get('app.locale') == 'en')
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/owl.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/responsive.css')}}">
    @endif
@endsection
@section('content')
<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
                        <a class="navbar-brand" href="{{route('site.home')}}">
                            <img src="{{asset('vendors/site/EN/images/logo.png')}}" alt="">
                        </a>
                        <button class="menu-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                            <span class="icon-spar"></span>
                            <span class="icon-spar"></span>
                            <span class="icon-spar"></span>
                        </button>
  
                        
                        @if(Config::get('app.locale') == 'ar')
                        <form method="GET" action="{{route('site.search')}}" class="row banner-search">
                            <div class="form_field addres">
                                <input name="address_ar" type="text" class="form-control" placeholder="العنوان, المنطقة أو المدينة">
                            </div>
                            <div class="form_field tpmax">
                                <div class="form-group">
                                    <select class="form-control" name="type">
                                        <option>النوع</option>
                                        <option value="0">حجز</option>
                                        <option value="1">طوارئ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_field tpmax">
                                <div class="form-group">
                                    <select class="form-control" name="special_ar">
                                        <option>التخصص</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->special_id}}">{{$department->special_name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form_field tpmax">
                                <input name="doctor_ar" type="text" class="form-control" placeholder="اسم الدكتور">
                            </div>
                            <div class="form_field srch-btn">
                                <button type="submit" class="btn btn-outline-primary ">
                                    <i class="la la-search"></i>
                                </button>
                            </div>
                        </form>
                        @elseif(Config::get('app.locale') == 'en')
                        <form method="GET" action="{{route('site.search')}}" class="row banner-search">
                            <div class="form_field addres">
                                <input name="address" type="text" class="form-control" placeholder="Enter Address, City or State">
                            </div>
                            <div class="form_field tpmax">
                                <div class="form-group">
                                    <select class="form-control" name="type">
                                        <option>Type</option>
                                        <option value="0">For Booking</option>
                                        <option value="1">For Urgent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_field tpmax">
                                <div class="form-group">
                                    <select class="form-control" name="special">
                                        <option>Specialty</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->special_id}}">{{$department->special_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form_field tpmax">
                                <input name="doctor" type="text" class="form-control" placeholder="Doctor Name">
                            </div>
                            <div class="form_field srch-btn">
                                <button type="submit" class="btn btn-outline-primary ">
                                    <i class="la la-search"></i>
                                </button>
                            </div>
                        </form>
                        @endif
  
                        @if(Config::get('app.locale') == 'en')
                        <div class="navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav nav-fill w-100">
                                <li class="nav-item @if(Route::currentRouteName()=='site.home') active @endif">
                                    <a class="nav-link" href="{{route('site.home')}}">
                                        HOME
                                    </a>                                          
                                </li>
                                <li class="nav-item @if(Route::currentRouteName()=='site.about') active @endif">
                                    <a class="nav-link" href="{{route('site.about')}}">
                                        ABOUT
                                    </a>                                          
                                </li>
                                <li class="nav-item @if(Route::currentRouteName()=='site.services') active @endif">
                                    <a class="nav-link" href="{{route('site.services')}}">
                                        SERVEICES
                                    </a>
                                </li>
                                @if (!Auth::guard('members')->check())
                                <li class="nav-item @if(Route::currentRouteName()=='site.bedoctor') active @endif">
                                    <a class="nav-link" href="{{route('site.bedoctor')}}">
                                        BE DOCTOR
                                    </a>                                          
                                </li>
                                @endif
                                <li class="nav-item @if(Route::currentRouteName()=='site.departments') active @endif">
                                    <a class="nav-link" href="{{route('site.departments')}}">
                                        DEPARTMENTS
                                    </a>                                          
                                </li>
                                <li class="nav-item  @if(Route::currentRouteName()=='site.blog') active @endif">
                                    <a class="nav-link" href="{{route('site.blog')}}">
                                        BLOG
                                    </a>
                                </li>
                                <li class="nav-item @if(Route::currentRouteName()=='site.contact') active @endif">
                                    <a class="nav-link" href="{{route('site.contact')}}">
                                        CONTACT US
                                    </a>                                          
                                </li>
                            </ul>
                            <a href="#" title="" class="close-menu"><i class="la la-close"></i></a>
                        </div>
                        @elseif(Config::get('app.locale') == 'ar')
                        <div class="navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav nav-fill w-100">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('site.home')}}">
                                        الرئيسية
                                    </a>                                          
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('site.about')}}">
                                        من نحن
                                    </a>                                          
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('site.services')}}">
                                        خدماتنا
                                    </a>
                                </li>
                                @if (!Auth::guard('members')->check())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('site.bedoctor')}}">
                                        كن دكتور
                                    </a>                                          
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('site.departments')}}">
                                        الاقسام
                                    </a>                                          
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('site.blog')}}">
                                        المدونة
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('site.contact')}}">
                                        اتصل بنا
                                    </a>                                          
                                </li>
                            </ul>
                            <a href="#" title="" class="close-menu"><i class="la la-close"></i></a>
                        </div>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
  </header><!--header end-->
<section id="map-container" class="fullwidth-home-map hp3">
        <h3 class="vis-hid">Invisible</h3>
        <div id="map" data-map-zoom="9"></div>
    </section>

    <div class="contact-sec">
        <div class="container">
            <div class="contact-details-sec">
                <div class="row">
                    <div class="col-lg-8 col-md-8 pl-0">
                        <div class="contact_form">
                            @if(Config::get('app.locale') == 'ar')
                                <span>{{$data->get('contact_ar')}}</span>
                                <h3>اتصل بنا</h3>
                                <p>{{$data->get('contact_ar')}}</p>
                            @elseif(Config::get('app.locale') == 'en')
                                <h3>Contact Us</h3>
                                <p>{{$data->get('contact_en')}}</p>
                            @endif
                            
                            <form class="js-ajax-form">
                                <div class="form-group no-pt">
                                    <div class="missing-message">
                                        Populate Missing Fields
                                    </div>
                                    <div class="success-message">
                                        <i class="fa fa-check text-primary"></i> Thank you!. Your message is successfully sent...
                                    </div>
                                    <div class="error-message">Populate Missing Fields</div>
                                </div><!--form-group end-->
                                <div class="form-fieldss">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 pl-0">
                                            <div class="form-field">
                                                <input type="text" name="name" placeholder="Your Name" id="name">
                                            </div><!-- form-field end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-field">
                                                <input type="email" name="email" placeholder="Your Email" id="email">
                                            </div><!-- form-field end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 pr-0">
                                            <div class="form-field">
                                                <input type="text" name="phone" placeholder="Your Phone">
                                            </div><!-- form-field end-->
                                        </div>
                                        <div class="col-lg-12 col-md-12 pl-0 pr-0">
                                            <div class="form-field">
                                                <textarea name="message" placeholder="Your Message"></textarea>
                                            </div><!-- form-field end-->
                                        </div>
                                        <div class="col-lg-12 col-md-12 pl-0">
                                            <button type="submit" class="btn-default submit">Send Message</button>
                                        </div>
                                        
                                    </div>
                                </div><!--form-fieldss end-->
                            </form>
                        </div><!--contact_form end-->
                    </div>
                    <div class="col-lg-4 col-md-4 pr-0">
                        <div class="contact_info">
                            <h3>Contact Information</h3>
                            <ul class="cont_info">
                                @if (Config::get('app.locale') == 'ar') 
                                <li><i class="la la-map-marker"></i>{{$contact->get('address_ar')}}</li>
                                <li><i class="la la-phone"></i>{{$contact->get('phone')}}</li>
                                <li><i class="la la-envelope"></i><a href="mailto:{{$contact->get('address_ar')}}" title="">{{$contact->get('address_ar')}}</a></li>
                                @elseif(Config::get('app.locale') == 'en')
                                <li><i class="la la-map-marker"></i>{{$contact->get('address_en')}}</li>
                                <li><i class="la la-phone"></i>{{$contact->get('phone')}}</li>
                                <li><i class="la la-envelope"></i><a href="mailto:{{$contact->get('address_en')}}" title="">{{$contact->get('address_en')}}</a></li>
                                @endif
                            </ul>
                            <ul class="social_links">
        						<li><a href="{{$contact->get('facebook')}}" title=""><i class="fa fa-facebook"></i></a></li>
        						<li><a href="{{$contact->get('twitter')}}" title=""><i class="fa fa-twitter"></i></a></li>
        						<li><a href="{{$contact->get('instagram')}}" title=""><i class="fa fa-instagram"></i></a></li>
        						<li><a href="{{$contact->get('linkedin')}}" title=""><i class="fa fa-linkedin"></i></a></li>
        					</ul>

                        </div><!--contact_info end-->
                    </div>
                </div>
            </div><!--contact-details-sec end-->
        </div>
    </div><!--contact-sec end-->
@endsection
@include('site.pages.contact.scripts')