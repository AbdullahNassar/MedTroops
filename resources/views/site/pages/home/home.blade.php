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
                                <input name="doctor_ar" type="text" class="form-control" placeholder="Doctor Name">
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
                                <li class="nav-item @if(Route::currentRouteName()=='site.bedoctor') active @endif">
                                    <a class="nav-link" href="{{route('site.bedoctor')}}">
                                        BE DOCTOR
                                    </a>                                          
                                </li>
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('site.bedoctor')}}">
                                        كن دكتور
                                    </a>                                          
                                </li>
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
    <!-- Banner Section -->
    <section id="home-banner" class="container-fluid no-padding banner-section home-banner">
        <div class="container">	
            <div class="">
                <div id="main-carousel" class="carousel slide">				
                    <div class="carousel-inner">
                        @foreach($sliders as $slider)
                            @if(Config::get('app.locale') == 'ar')
                            <div class="row active ">
                                <div class="col-md-6 offset-md-1 col-sm-6 no-padding">
                                    <div class="banner-left">
                                        <span>{{$slider->title_ar}}</span>
                                        <h3>{{$slider->head_ar}}</h3>
                                        <p>{{$slider->content_ar}}</p>
                                        <a href="{{route('site.services')}}">{{$slider->button_ar}}<i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-6 no-padding">
                                    <div class="banner-right">
                                        <img src="{{asset('storage/uploads/slider/'.$slider->image)}}" alt="banner-main"/>
                                    </div>
                                </div>
                            </div>
                            @elseif(Config::get('app.locale') == 'en')
                            <div class="row active ">
                                <div class="col-md-6 offset-md-1 col-sm-6 no-padding">
                                    <div class="banner-left">
                                        <span>{{$slider->title_en}}</span>
                                        <h3>{{$slider->head_en}}</h3>
                                        <p>{{$slider->content_en}}</p>
                                        <a href="{{route('site.services')}}">{{$slider->button_en}}<i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-6 no-padding">
                                    <div class="banner-right">
                                        <img src="{{asset('storage/uploads/slider/'.$slider->image)}}" alt="banner-main"/>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- Container /- -->

        <!-- Shape -->
        <div class="banner-shape container-fluid no-padding">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 shape-left no-padding">
                    <div class="left-shape-blue">				
                        <svg width="100%" height="100%">
                            <clipPath id="clipPolygon2" clipPathUnits="objectBoundingBox">
                                <polygon points="0 0, 0 100, 120 100, 0 0"></polygon>
                            </clipPath>
                        </svg>
                    </div>	
                    <div class="left-shape">				
                        <svg width="100%" height="100%">
                            <clipPath id="clipPolygon1" clipPathUnits="objectBoundingBox">
                                <polygon points="0 0, 0 100, 100 100, 0 0"></polygon>
                            </clipPath>
                        </svg>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6 shape-right no-padding">
                    <div class="right-shape-blue">				
                        <svg width="100%" height="100%">
                            <clipPath id="clipPolygon3" clipPathUnits="objectBoundingBox">
                                <polygon points="1 0.2, 0 1, 0 0.835, 1 0"></polygon>
                            </clipPath>
                        </svg>
                    </div>	
                    <div class="right-shape">				
                        <svg width="100%" height="100%">
                            <clipPath id="clipPolygon4" clipPathUnits="objectBoundingBox">
                                <polygon points="1 0, 0 1, 100 100, 100 0"></polygon>
                            </clipPath>
                        </svg>
                    </div>
                </div>
            </div>
        </div><!-- Shape /--->
    </section><!-- Banner Section /- -->
    

    <!-- Message Borad -->
    <section id="message-borad" class="container-fluid no-padding message-borad">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 widget-property-search pr-40">
                    @if(Config::get('app.locale') == 'ar')
                    <form class="appoinment-form left2" method="post" action="{{route('site.register')}}">
                        <h3><i class="fa fa-user-md"></i> تسجيل حساب جديد</h3>
                        <div class="form_field col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="type" required>
                                    <option>نوع المستخدم</option>
                                    <option value="doctor">دكتور</option>
                                    <option value="patient">مريض</option>
                                </select>
                            </div>
                        </div>                                                    
                        <div class="form_field col-md-6">
                            <input name="username" type="text" class="form-control" placeholder="ادخل اسم المستخدم" required>
                        </div>
                                                        
                        <div class="form_field col-md-6">
                            <input name="password" type="text" class="form-control" placeholder="ادخل كلمة السر" required>
                        </div>

                        <div class="form_field col-md-6">
                            <input name="email" type="text" class="form-control" placeholder="ادخل البريد الالكترونى" required>
                        </div>
                        
                        <div class="form_field col-md-12">
                            <button type="submit" class="btn-submit pull-right">
                            <img src="{{asset('vendors/site/EN/images/heart-sm.png')}}" alt="heart-sm">سجل</button>
                        </div>
                    </form>
                    @elseif(Config::get('app.locale') == 'en')
                    <form class="appoinment-form left2" method="post" action="{{route('site.register')}}">
                        <h3><i class="fa fa-user-md"></i> Registration</h3>
                        <div class="form_field col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="type" required>
                                    <option>User Type</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="patient">Patient</option>
                                </select>
                            </div>
                        </div>
                                                    
                        <div class="form_field col-md-6">
                            <input name="username" type="text" class="form-control" placeholder="Enter Username" required>
                        </div>
                                                        
                        <div class="form_field col-md-6">
                            <input name="password" type="text" class="form-control" placeholder="Enter Password" required>
                        </div>

                        <div class="form_field col-md-6">
                            <input name="email" type="text" class="form-control" placeholder="Enter Email" required>
                        </div>
                        
                        <div class="form_field col-md-12">
                            <button type="submit" class="btn-submit pull-right">
                            <img src="{{asset('vendors/site/EN/images/heart-sm.png')}}" alt="heart-sm">Register</button>
                        </div>
                    </form>
                    @endif
                </div>
                
                <div class="col-md-6 col-sm-6  widget-property-search pl-40">
                    <form class="appoinment-form" method="GET" action="{{route('site.search')}}">
                        <h3><i class="fa fa-search"></i> Search for Doctor</h3>

                        <div class="form_field col-md-6">
                            <input name="address" type="text" class="form-control" placeholder="Enter Address, City or State">
                        </div>		
                        <div class="form_field col-md-6">
                            <input name="doctor" type="text" class="form-control" placeholder="Doctor Name">
                        </div>

                        <div class="form_field col-md-6">
                            <div class="form-group">
                                <select class="form-control select" name="type">
                                    <option>Type</option>
                                    <option value="0">For Booking</option>
                                    <option value="1">For Urgent</option>
                                </select>
                            </div>
                        </div>

                        <div class="form_field col-md-6">
                            <div class="form-group">
                                <select class="form-control select" name="special">
                                    <option>Specialty</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->special_id}}">{{$department->special_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                                                                            
                        <div class="form_field col-md-12">
                            <button type="submit" id="btn_submit" class="btn-submit pull-right">
                            <img src="{{asset('vendors/site/EN/images/heart-sm.png')}}" alt="heart-sm">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Container /- -->
    </section><!-- Message Borad /- -->


    
    <!-- What We Do Best -->
    <section id="what-we-do-best">
        <div class="container-fluid what-we-do-best">					
            <!-- What We Do Best Left -->
            <div class="row">
                <div class="what-we-do-left col-md-4 col-12 no-padding">
                    <img src="{{asset('vendors/site/EN/images/what-we-do-best.jpg')}}" alt="">
                    <img src="{{asset('vendors/site/EN/images/what-we-do-best2.jpg')}}" alt="">
                </div><!-- What We Do Best Left /- -->
                <!-- What We Do Best Right -->
                <div class="col-md-8 col-12 what-we-do-right">
                    <div class="row">
                        @foreach($services as $service)
                            @if(Config::get('app.locale') == 'ar')
                            <div class="col-md-4 col-sm-4 col-12 no-padding">
                                <div class="what-we-do-block">					
                                    <img src="{{asset('vendors/site/EN/images/what-we-do-best-block-bg.jpg')}}" alt="what-we-do-best"/>
                                    <div class="what-we-do-block-content">
                                        <i><img src="{{asset('storage/uploads/service/'.$service->image)}}" alt="pulmonary"/></i>
                                        <h5>{{$service->name_ar}}</h5>
                                        <p>{{$service->content_ar}}</p>
                                    </div>
                                </div>
                            </div>
                            @elseif(Config::get('app.locale') == 'en')
                            <div class="col-md-4 col-sm-4 col-12 no-padding">
                                <div class="what-we-do-block">					
                                    <img src="{{asset('vendors/site/EN/images/what-we-do-best-block-bg.jpg')}}" alt="what-we-do-best"/>
                                    <div class="what-we-do-block-content">
                                        <i><img src="{{asset('storage/uploads/service/'.$service->image)}}" alt="pulmonary"/></i>
                                        <h5>{{$service->name_en}}</h5>
                                        <p>{{$service->content_en}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div><!-- What We Do Best Right /- -->
            </div>
        </div><!-- What We Do Best /- -->
    </section>

    
    
    <section class="main-banner-sec hp6">
        <div class="container">
            <div class="bannner_text">
                <h3>Discover the Best Properties</h3>
                <p>Aenean sollicitudin, lorem quis bibendum aucto elit consequat ipsumas nec sagittis sem nibh id elit. Duis sed odio sit amet nibhulpu tate cursus a sit amet mauris. Morbi accumsan ipsum torquent.</p>
                <a href="#" title="" class="btn-default st1">Book consultation</a>
            </div><!--banner_img end-->
            <a href="https://www.youtube.com/watch?v=hWo-43ObCP8" title="" class="html5lightbox">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </section><!--main-banner-sec end-->



    <section class="hp5 section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    @if(Config::get('app.locale') == 'ar')
                        <div class="section-header">
                            <h3>مراكز التميز</h3>
                            <p>{{$data->get('app_head_ar')}}</p>
                        </div>
                    @elseif(Config::get('app.locale') == 'en')
                        <div class="section-header">
                            <h3>Centres of Excellence</h3>
                            <p>{{$data->get('app_head_en')}}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-categories">
                        <img src="{{asset('vendors/site/EN/images/screen1.jpg')}}" alt=""/>
                        <img src="{{asset('vendors/site/EN/images/screen2.jpg')}}" alt=""/>
                        <img src="{{asset('vendors/site/EN/images/screen1.jpg')}}" alt=""/>
                        <img src="{{asset('vendors/site/EN/images/screen2.jpg')}}" alt=""/>
                    </div>
                </div>
                
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3">
                    <div class="support-info">
                        <a href="{{$data->get('android')}}" title="" class="btn2">Download Now <i class="fa fa-android"></i></a>
                    </div><!--support-info end-->
                </div>
                <div class="col-xl-3">
                    <div class="support-info">
                        <a href="{{$data->get('ios')}}" title="" class="btn2">Download Now <i class="fa fa-apple"></i></a>
                    </div><!--support-info end-->
                </div>
            </div>
        </div>
    </section>
@endsection
@include('site.pages.home.scripts')