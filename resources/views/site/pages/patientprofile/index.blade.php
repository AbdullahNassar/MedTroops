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
<section class="pager-sec bfr">
<div class="container">
    <div class="pager-sec-details">
        @if(Config::get('app.locale') == 'ar')
        <h3>الصفحةالشخصية</h3>
        <ul>
            <li><a href="{{route('site.home')}}" title="">الرئيسية</a></li>
            <li><span>الصفحةالشخصية</span></li>
        </ul>
        @elseif(Config::get('app.locale') == 'en')
        <h3>Your Profile</h3>
        <ul>
            <li><a href="{{route('site.home')}}" title="">Home</a></li>
            <li><span>Your Profile</span></li>
        </ul>
        @endif
    </div><!--pager-sec-details end-->
</div>
</section>
@if(Config::get('app.locale') == 'ar')
<section class="page-main-content section-padding">
    <div class="container">
        <div class="agent-profile-sec">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-md-12 pl-0 pr-0">
                    <div class="agent-profile">
                        <div class="agent-img">
                            <img src="{{asset('storage/uploads/patient').'/'.$patient->image}}" alt="">
                        </div><!--agent-img end-->
                        <div class="agent-info">
                            <a class="editprofile" href="{{route('site.editpatient', ['id' => $patient->id])}}"><i class="fa fa-edit"></i></a>
                            <h3>{{$patient->patient_name_ar}}</h3><hr>
                            <p>{{$patient->bio_ar}}</p>
                            <ul class="cont-links">
                                <li><span><i class="la la-phone"></i>{{$patient->phone}}</span></li>
                                <li><a href="mailto:{{$patient->email}}" title=""><i class="la la-envelope"></i>{{$patient->email}}</a></li>
                            </ul>
                            <ul class="socio-links">
                                <li><a href="{{$patient->facebook}}" title=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$patient->twitter}}" title=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$patient->instagram}}" title=""><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{$patient->linkedin}}" title=""><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div><!--agent-info end-->
                    </div><!--agent-profile end-->
                </div>
                <div class="col-xl-4 col-lg-3 col-md-12 pr-0">
                    <div class="contact-agent">
                        <h3>اتصل بنا</h3>
                        <form>
                            <div class="form-field">
                                <input type="text" name="name" placeholder="الاسم">
                            </div><!--form-field end-->
                            <div class="form-field">
                                <input type="text" name="emal" placeholder="البريد الالكترونى">
                            </div><!--form-field end-->
                            <div class="form-field">
                                <input type="text" name="phone" placeholder="رقم الهاتف">
                            </div><!--form-field end-->
                            <div class="form-field">
                                <textarea name="message" placeholder="رسالتك"></textarea>
                            </div><!--form-field end-->
                            <div class="form-field">
                                <button type="submit" class="btn2">ارسل</button>
                            </div><!--form-field end-->
                        </form>
                    </div><!--contact-agent end-->
                </div>
            </div>
        </div><!--agent-profile-sec end-->
    </div>
</section><!--page-main-content end-->
@elseif(Config::get('app.locale') == 'en')
<section class="page-main-content section-padding">
    <div class="container">
        <div class="agent-profile-sec">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-md-12 pl-0 pr-0">
                    <div class="agent-profile">
                        <div class="agent-img">
                            <img src="{{asset('storage/uploads/patient').'/'.$patient->image}}" alt="">
                        </div><!--agent-img end-->
                        <div class="agent-info">
                            <a class="editprofile" href="{{route('site.editpatient', ['id' => $patient->id])}}"><i class="fa fa-edit"></i></a>
                            <h3>{{$patient->patient_name}}</h3><hr>
                            <p>{{$patient->bio}}</p>
                            <ul class="cont-links">
                                <li><span><i class="la la-phone"></i>{{$patient->phone}}</span></li>
                                <li><a href="mailto:{{$patient->email}}" title=""><i class="la la-envelope"></i>{{$patient->email}}</a></li>
                            </ul>
                            <ul class="socio-links">
                                <li><a href="{{$patient->facebook}}" title=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$patient->twitter}}" title=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$patient->instagram}}" title=""><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{$patient->linkedin}}" title=""><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div><!--agent-info end-->
                    </div><!--agent-profile end-->
                </div>
                <div class="col-xl-4 col-lg-3 col-md-12 pr-0">
                    <div class="contact-agent">
                        <h3>Contact us</h3>
                        <form>
                            <div class="form-field">
                                <input type="text" name="name" placeholder="Your Name">
                            </div><!--form-field end-->
                            <div class="form-field">
                                <input type="text" name="emal" placeholder="Your Email">
                            </div><!--form-field end-->
                            <div class="form-field">
                                <input type="text" name="phone" placeholder="Your Phone">
                            </div><!--form-field end-->
                            <div class="form-field">
                                <textarea name="message" placeholder="Your Message"></textarea>
                            </div><!--form-field end-->
                            <div class="form-field">
                                <button type="submit" class="btn2">Contact</button>
                            </div><!--form-field end-->
                        </form>
                    </div><!--contact-agent end-->
                </div>
            </div>
        </div><!--agent-profile-sec end-->
    </div>
</section><!--page-main-content end-->
@endif
@endsection
@include('site.pages.home.scripts')