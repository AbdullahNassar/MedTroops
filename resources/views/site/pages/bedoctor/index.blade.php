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
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/rtl.css')}}">
        <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    @elseif(Config::get('app.locale') == 'en')
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/owl.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/responsive.css')}}">
        <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
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
<section class="pager-sec bfr">
        <div class="container">
            <div class="pager-sec-details">
                @if(Config::get('app.locale') == 'ar')
                    <h3>كن دكتور</h3>
                    <ul>
                        <li><a href="{{route('site.home')}}" title="">الرئيسية</a></li>
                        <li><span>كن دكتور</span></li>
                    </ul>
                @elseif(Config::get('app.locale') == 'en')
                    <h3>Be Doctor</h3>
                    <ul>
                        <li><a href="{{route('site.home')}}" title="">Home</a></li>
                        <li><span>Be Doctor</span></li>
                    </ul>
                @endif
            </div><!--pager-sec-details end-->
        </div>
    </section>

    @if(Config::get('app.locale') == 'ar')
    <section class="be-doctors-sec pt">
        <div class="container">
            <div class="be-doctor-sec">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="doctor_form_section">
                            <h4>حساب الدكتور</h4>
                            <img src="{{asset('vendors/site/EN/images/section-seprator.png')}}" alt="image">
                            <form method="post" id="doctor_form" enctype="multipart/form-data">
                                
                                <div class="user-img-upload">
                                    <div class="fileUpload user-editimg">
                                        <span><i class="fa fa-camera"></i> تعديل</span>
                                        <input type="file" id="imgInp" class="upload" name="image"> 
                                        <input type="hidden" value="doctor" name="storage" >
                                    </div>
                                    <img src="{{asset('vendors/img/1.jpg')}}" id="blah" class="img-circle" alt="">
                                    <p>        </p>
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="doctor_name" placeholder="الاسم باللغة العربية" id="doctor_name">
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="doctor_name_ar" placeholder="الاسم باللغة الانجليزية" id="doctor_name_ar">
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="username" placeholder="اسم المستخدم" id="username">
                                </div>
                                <div class="form-field half">
                                    <input type="password" name="password" placeholder="كلمة السر" id="password">
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="email" placeholder="البريد الالكترونى" id="email">
                                </div>
                                <div class="form-field half">
                                    <input class="js-datepicker" type="text" name="birth" id="birth" placeholder="يوم الميلاد">
                                    <i class="input-icon fa fa-calendar"></i>
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="phone" placeholder="رقم الهاتف" id="phone">
                                </div>
                                <div class="form-field half rs-select2 js-select-simple select--no-search">
                                    <select class="select2" data-placeholder="اختر المناطق" name="area[]" id="area" multiple>
                                        <option></option>
                                        @foreach ($areas as $item)
                                            <option value="{{$item->areas_id}}">{{$item->area_name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-field half rs-select2 js-select-simple select--no-search">
                                    <select class="select2" data-placeholder="اختر التخصص"  name="specialty"  id="specialty">
                                        <option></option>
                                        @foreach ($specials as $special)
                                            <option value="{{$special->special_id}}">{{$special->special_name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-field half">
                                    <input type="file" name="cv" placeholder="قم بتحميل السيرة الذاتية" id="cv">
                                </div>
                                <div class="form-field">
                                    <input type="text" name="address_ar" placeholder="العنوان باللغة العربية" id="address_ar">
                                </div>
                                <div class="form-field">
                                    <input type="text" name="address" placeholder="العنوان باللغة الانجليزية" id="address">
                                </div>
                                <div class="form-field">
                                    <textarea name="bio_ar" id="bio_ar" placeholder="تفاصيل باللغة العربية"></textarea>
                                </div>
                                <div class="form-field">
                                    <textarea name="bio" id="bio" placeholder="تفاصيل باللغة الانجليزية"></textarea>
                                </div>
                                {{csrf_field()}}
                                <button type="submit" class="btn2 clear">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- about-us-sec end-->
        </div>
    </section><!--about-sec end-->
@elseif(Config::get('app.locale') == 'en')
    <section class="be-doctors-sec pt">
        <div class="container">
            <div class="be-doctor-sec">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="doctor_form_section">
                            <h4>Doctor account</h4>
                            <img src="{{asset('vendors/site/EN/images/section-seprator.png')}}" alt="image">
                            <form method="post" id="doctor_form" enctype="multipart/form-data">
                                
                                <div class="user-img-upload">
                                    <div class="fileUpload user-editimg">
                                        <span><i class="fa fa-camera"></i> Add</span>
                                        <input type="file" id="imgInp" class="upload" name="image"> 
                                        <input type="hidden" value="doctor" name="storage" >
                                    </div>
                                    <img src="{{asset('vendors/img/1.jpg')}}" id="blah" class="img-circle" alt="">
                                    <p>        </p>
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="doctor_name" placeholder="Full Name in English" id="doctor_name">
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="doctor_name_ar" placeholder="Full Name in Arabic" id="doctor_name_ar">
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="username" placeholder="Username" id="username">
                                </div>
                                <div class="form-field half">
                                    <input type="password" name="password" placeholder="Password" id="password">
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="email" placeholder="Email" id="email">
                                </div>
                                <div class="form-field half">
                                    <input class="js-datepicker" type="text" name="birth" id="birth" placeholder="Birthday">
                                    <i class="input-icon fa fa-calendar"></i>
                                </div>
                                <div class="form-field half">
                                    <input type="text" name="phone" placeholder="Phone Number" id="phone">
                                </div>
                                <div class="form-field half rs-select2 js-select-simple select--no-search">
                                    <select class="select2" data-placeholder="Select Areas" name="area[]" id="area" multiple>
                                        <option></option>
                                        @foreach ($areas as $item)
                                            <option value="{{$item->areas_id}}">{{$item->area_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-field half rs-select2 js-select-simple select--no-search">
                                    <select class="select2" data-placeholder="Select Specialty" name="specialty"  id="specialty">
                                        <option></option>
                                        @foreach ($specials as $special)
                                            <option value="{{$special->special_id}}">{{$special->special_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-field half">
                                    <input type="file" name="cv" placeholder="Upload Your CV" id="cv">
                                </div>
                                <div class="form-field">
                                    <input type="text" name="address_ar" placeholder="Address in Arabic" id="address_ar">
                                </div>
                                <div class="form-field">
                                    <input type="text" name="address" placeholder="Address in English" id="address">
                                </div>
                                <div class="form-field">
                                    <textarea name="bio_ar" id="bio_ar" placeholder="Bio"></textarea>
                                </div>
                                <div class="form-field">
                                    <textarea name="bio" id="bio" placeholder="Bio"></textarea>
                                </div>
                                {{csrf_field()}}
                                <button type="submit" class="btn2 clear">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- about-us-sec end-->
        </div>
    </section><!--about-sec end-->
@endif

@endsection
@include('site.pages.bedoctor.scripts')