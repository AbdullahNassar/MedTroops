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
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/AR/css/rtl.css')}}">
        <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    @elseif(Config::get('app.locale') == 'en')
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/owl.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/site/EN/css/slick.css')}}">
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
    <section class="property-single-pg">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#doctor_profile">الصفحة الشخصية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#edit_profile">تعديل الصفحة الشخصية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#doctor_history">الأرشيف</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="doctor_profile">
                <div class="container">
                    <div class="property-hd-sec">
                        <div class="card">
                            <div class="card-body">
                                <a href="#">
                                    <h3>{{$doctor->doctor_name_ar}}</h3>
                                    <p><i class="la la-map-marker"></i>{{$doctor->address_ar}}</p>
                                </a>
                                <ul>
                                    <li>41,143 views</li>
                                    <li>932 Reservation</li>
                                    <li>92 Comments</li>
                                </ul>
                            </div><!--card-body end-->
                            <div class="rate-info">
                                <h5>{{$doctor->price}} LE</h5>
                                @if($doctor->avail == 1)
                                    <span>For Urgent</span>
                                @else
                                    <span>For Booking</span>
                                @endif
                            </div><!--rate-info end-->
                        </div><!--card end-->
                    </div><!---property-hd-sec end-->
                    <div class="property-single-page-content">
                        <div class="row">
                            <div class="col-lg-8 pl-0 pr-0">
                                <div class="property-pg-left">
                                    <div class="property-imgs">
                                        <div class="property-main-img">
                                            <div class="property-img">
                                                <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" alt="">
                                            </div><!--property-img end-->
                                        </div><!--property-main-img end-->
                                    </div><!--property-imgs end-->
                                    <div class="descp-text">
                                        <h3>Description</h3>
                                        <p>{{$doctor->bio}}</p>
                                    </div><!--descp-text end-->
                                    <div class="details-info">
                                        <h3>تفاصيل</h3>
                                        <ul>
                                            <li>
                                                <h4>النوع:</h4>
                                                <span>دكتور</span>
                                            </li>
                                            <li>
                                                <h4>السن:</h4>
                                                <span>{{$doctor->age}}</span>
                                            </li>
                                            <li>
                                                <h4>التخصص:</h4>
                                                @foreach($specialty as $s)
                                                <span>{{$s->special_name_ar}}</span>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div><!--details-info end-->
                                    <div class="features-dv">
                                        <h3>المواعيد</h3>
                                        <form class="form_field">
                                            <ul>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c1">
                                                    <label for="c1">
                                                        <span></span>
                                                        <small>السبت</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c2" checked>
                                                    <label for="c2">
                                                        <span></span>
                                                        <small>الأحد</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c3">
                                                    <label for="c3">
                                                        <span></span>
                                                        <small>الاثنين</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c4" checked>
                                                    <label for="c4">
                                                        <span></span>
                                                        <small>الثلاثاء</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c5" checked>
                                                    <label for="c5">
                                                        <span></span>
                                                        <small>الأربعاء</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c6">
                                                    <label for="c6">
                                                        <span></span>
                                                        <small>الخميس</small>
                                                    </label>
                                                </li>
                                            </ul>
                                        </form>
                                    </div><!--features-dv end-->
    
                                    <div class="map-dv">
                                        <h3>الموقع</h3>
                                        <div id="map-container" class="fullwidth-home-map">
                                            <div id="map" data-map-zoom="9"></div>
                                        </div>
                                    </div><!--map-dv end-->
                                    <div class="nearby-locts">
                                        <h3>ماذا يوجد بالقرب من الدكتور؟</h3>
                                        <span>Powered by <img src="{{asset('vendors/site/EN/images/ylog.png')}}" alt=""></span>
                                        <div class="widget-posts">
                                            <ul>
                                                <li>
                                                    <div class="wd-posts">
                                                        <div class="ps-img">
                                                            <img src="{{asset('vendors/site/EN/images/listing-item-01.jpg')}}" alt="">
                                                        </div><!--ps-img end-->
                                                        <div class="ps-info">
                                                            <h3><a href="#" title="">The Museum of Modern Art</a></h3>
                                                            <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                                        </div><!--ps-info end-->
                                                    </div><!--wd-posts end-->
                                                    <ul class="star-rating">
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                    </ul><!--star-rating end-->
                                                </li>
                                                <li>
                                                    <div class="wd-posts">
                                                        <div class="ps-img">
                                                            <img src="{{asset('vendors/site/EN/images/listing-item-01.jpg')}}" alt="">
                                                        </div><!--ps-img end-->
                                                        <div class="ps-info">
                                                            <h3><a href="#" title="">Joe's Shanghai</a></h3>
                                                            <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                                        </div><!--ps-info end-->
                                                    </div><!--wd-posts end-->
                                                    <ul class="star-rating">
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                    </ul><!--star-rating end-->
                                                </li>
                                                <li>
                                                    <div class="wd-posts">
                                                        <div class="ps-img">
                                                            <img src="{{asset('vendors/site/EN/images/listing-item-01.jpg')}}" alt="">
                                                        </div><!--ps-img end-->
                                                        <div class="ps-info">
                                                            <h3><a href="#" title="">Apple Fifth Avenue</a></h3>
                                                            <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                                        </div><!--ps-info end-->
                                                    </div><!--wd-posts end-->
                                                    <ul class="star-rating">
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                    </ul><!--star-rating end-->
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--nearby-locts end-->
                                    <div class="comments-dv">
                                        <h3>3 Reviews</h3>
                                        <div class="comment-section">
                                            <ul>
                                                <li>
                                                    <div class="cm-info-sec">
                                                        <div class="cm-img">
                                                            <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                                        </div><!--author-img end-->
                                                        <div class="cm-info">
                                                            <h3>Mohammed El-Mazen</h3>
                                                            <h4>April 25, 2019</h4>
                                                        </div>
                                                        <ul class="rating-lst">
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                        </ul><!--rating-lst end-->
                                                    </div><!--cm-info-sec end-->
                                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                                    <a href="#" title="" class="cm-reply">Reply</a>
                                                </li>
                                                <li>
                                                    <div class="cm-info-sec">
                                                        <div class="cm-img">
                                                            <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                                        </div><!--author-img end-->
                                                        <div class="cm-info">
                                                            <h3>Mohammed El-Mazen</h3>
                                                            <h4>April 25, 2019</h4>
                                                        </div>
                                                        <ul class="rating-lst">
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                        </ul><!--rating-lst end-->
                                                    </div><!--cm-info-sec end-->
                                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                                    <a href="#" title="" class="cm-reply">Reply</a>
                                                </li>
                                                <li>
                                                    <div class="cm-info-sec">
                                                        <div class="cm-img">
                                                            <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                                        </div><!--author-img end-->
                                                        <div class="cm-info">
                                                            <h3>Mohammed El-Mazen</h3>
                                                            <h4>April 25, 2019</h4>
                                                        </div>
                                                        <ul class="rating-lst">
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                        </ul><!--rating-lst end-->
                                                    </div><!--cm-info-sec end-->
                                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                                    <a href="#" title="" class="cm-reply">Reply</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="review-hd">
                                            <div class="rev-hd">
                                                <h3>Write a Review</h3>
                                                <ul class="rating-lst">
                                                    <li><span class="la la-star"></span></li>
                                                    <li><span class="la la-star"></span></li>
                                                    <li><span class="la la-star"></span></li>
                                                    <li><span class="la la-star"></span></li>
                                                    <li><span class="la la-star"></span></li>
                                                </ul><!--rating-lst end-->
                                            </div><!--rev-hd end-->
                                            <div class="post-comment-sec">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 pl-0">
                                                            <div class="form-field">
                                                                <input type="text" name="name" placeholder="Your Name">
                                                            </div><!--form-field end-->
                                                        </div>
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="form-field">
                                                                <input type="text" name="email" placeholder="Your Email">
                                                            </div><!--form-field end-->
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 pr-0">
                                                            <div class="form-field">
                                                                <input type="text" name="phone" placeholder="Your Phone">
                                                            </div><!--form-field end-->
                                                        </div>
                                                        <div class="col-lg-12 pl-0 pr-0">
                                                            <div class="form-field">
                                                                <textarea name="message" placeholder="Your Message"></textarea>
                                                            </div><!--form-field end-->
                                                        </div>
                                                        <div class="col-lg-12 pl-0 pr-0">
                                                            <button type="submit" class="btn-default">Post Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!--post-comment-sec end-->
                                        </div><!--review-hd end-->
                                    </div><!--comments-dv end-->
                                    <div class="similar-listings-posts">
                                        <h3>Similar Listings</h3>
                                        <div class="list-products">
                                            <div class="card">
                                                <a href="Single.html" title="">
                                                    <div class="img-block">
                                                        <div class="overlay"></div>
                                                        <img src="{{asset('vendors/site/EN/images/1.jpg')}}" alt="" class="img-fluid">
                                                        <div class="rate-info">
                                                            <h5>$550.000</h5>
                                                            <span>For Booking</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card_bod_full">
                                                    <div class="card-body">
                                                        <a href="Single.html" title="">
                                                            <h3>Dr/ Doctor Name</h3>
                                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                                        </a>
                                                        <ul>
                                                            <li>41,143 views</li>
                                                            <li>932 Reservation</li>
                                                            <li>92 Comments</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="crd-links">
                                                            <a href="#" class="pull-left">
                                                                <i class="la la-heart-o"></i>
                                                            </a>
                                                            <a href="#" class="plf">
                                                                <i class="la la-calendar-check-o"></i> 25 Days Ago
                                                            </a>
                                                        </div><!--crd-links end-->
                                                        <a href="Single.html" title="" class="btn-default">View Profile</a>
                                                    </div>
                                                </div><!--card_bod_full end-->
                                                <a href="Single.html" title="" class="ext-link"></a>
                                            </div><!--card end-->
                                            <div class="card">
                                                <a href="Single.html" title="">
                                                    <div class="img-block">
                                                        <div class="overlay"></div>
                                                        <img src="{{asset('vendors/site/EN/images/2.jpg')}}" alt="" class="img-fluid">
                                                        <div class="rate-info">
                                                            <h5>$550.000</h5>
                                                            <span>For Booking</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card_bod_full">
                                                    <div class="card-body">
                                                        <a href="Single.html" title="">
                                                            <h3>Dr/ Doctor Name</h3>
                                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                                        </a>
                                                        <ul>
                                                            <li>41,143 views</li>
                                                            <li>932 Reservation</li>
                                                            <li>92 Comments</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="crd-links">
                                                            <a href="#" class="pull-left">
                                                                <i class="la la-heart-o"></i>
                                                            </a>
                                                            <a href="#" class="plf">
                                                                <i class="la la-calendar-check-o"></i> 25 Days Ago
                                                            </a>
                                                        </div><!--crd-links end-->
                                                        <a href="Single.html" title="" class="btn-default">View Profile</a>
                                                    </div>
                                                </div><!--card_bod_full end-->
                                                <a href="Single.html" title="" class="ext-link"></a>
                                            </div><!--card end-->
                                            <div class="card">
                                                <a href="Single.html" title="">
                                                    <div class="img-block">
                                                        <div class="overlay"></div>
                                                        <img src="{{asset('vendors/site/EN/images/3.jpg')}}" alt="" class="img-fluid">
                                                        <div class="rate-info">
                                                            <h5>$550.000</h5>
                                                            <span>For Booking</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card_bod_full">
                                                    <div class="card-body">
                                                        <a href="Single.html" title="">
                                                            <h3>Dr/ Doctor Name</h3>
                                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                                        </a>
                                                        <ul>
                                                            <li>41,143 views</li>
                                                            <li>932 Reservation</li>
                                                            <li>92 Comments</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="crd-links">
                                                            <a href="#" class="pull-left">
                                                                <i class="la la-heart-o"></i>
                                                            </a>
                                                            <a href="#" class="plf">
                                                                <i class="la la-calendar-check-o"></i> 25 Days Ago
                                                            </a>
                                                        </div><!--crd-links end-->
                                                        <a href="Single.html" title="" class="btn-default">View Profile</a>
                                                    </div>
                                                </div><!--card_bod_full end-->
                                                <a href="Single.html" title="" class="ext-link"></a>
                                            </div><!--card end-->
                                            <div class="card">
                                                <a href="Single.html" title="">
                                                    <div class="img-block">
                                                        <div class="overlay"></div>
                                                        <img src="{{asset('vendors/site/EN/images/4.jpg')}}" alt="" class="img-fluid">
                                                        <div class="rate-info">
                                                            <h5>$550.000</h5>
                                                            <span>For Booking</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card_bod_full">
                                                    <div class="card-body">
                                                        <a href="Single.html" title="">
                                                            <h3>Dr/ Doctor Name</h3>
                                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                                        </a>
                                                        <ul>
                                                            <li>41,143 views</li>
                                                            <li>932 Reservation</li>
                                                            <li>92 Comments</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="crd-links">
                                                            <a href="#" class="pull-left">
                                                                <i class="la la-heart-o"></i>
                                                            </a>
                                                            <a href="#" class="plf">
                                                                <i class="la la-calendar-check-o"></i> 25 Days Ago
                                                            </a>
                                                        </div><!--crd-links end-->
                                                        <a href="Single.html" title="" class="btn-default">View Profile</a>
                                                    </div>
                                                </div><!--card_bod_full end-->
                                                <a href="Single.html" title="" class="ext-link"></a>
                                            </div><!--card end-->
                                        </div><!-- list-products end-->
                                    </div><!--similar-listings-posts end-->
                                </div><!--property-pg-left end-->
                            </div>
                            <div class="col-lg-4 pr-0">
                                <div class="sidebar layout2">
                                    <div class="widget widget-form">
                                        <h3 class="widget-title">Contact with Med Troops</h3>
                                        <div class="contct-info">
                                            <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" style="max-width: 81px;">
                                            <div class="contct-nf">
                                                <h3>{{$doctor->doctor_name}}</h3>
                                                <h4>Med Troops Doctor</h4>
                                                <span><i class="la la-phone"></i>{{$doctor->phone}}</span>
                                            </div>
                                        </div><!--contct-info end-->
                                        <div class="post-comment-sec">
                                            <form>
                                                <div class="form-field">
                                                    <input type="text" name="name" placeholder="Your Name">
                                                </div><!--form-field end-->
                                                <div class="form-field">
                                                    <input type="text" name="email" placeholder="Your Email">
                                                </div><!--form-field end-->
                                                <div class="form-field">
                                                    <input type="text" name="phone" placeholder="Your Phone">
                                                </div><!--form-field end-->
                                                <div class="form-field">
                                                    <textarea name="message" placeholder="Your Message"></textarea>
                                                </div><!--form-field end-->
                                                <button type="submit" class="btn2">Contact</button>
                                            </form>
                                        </div><!--post-comment-sec end-->
                                    </div><!--widget-form end-->
                                </div><!--sidebar end-->
                            </div>
                        </div>
                    </div><!--property-single-page-content end-->
                </div>
            </div>
            <div class="tab-pane fade" id="edit_profile">
                <div class="be-doctor-sec container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="doctor_form_section">
                                    <form method="post" id="doctor_form" enctype="multipart/form-data">
                                        
                                        <div class="user-img-upload">
                                            <div class="fileUpload user-editimg">
                                                <span><i class="fa fa-camera"></i> Add</span>
                                                <input type="file" id="imgInp" class="upload" name="image" value="{{$doctor->image}}"> 
                                                <input type="hidden" value="doctor" name="storage" >
                                            </div>
                                            @if($doctor->image == null)
                                            <img src="{{asset('vendors/img/1.jpg')}}" id="blah" class="img-circle" alt="">
                                            @else
                                            <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" id="blah" class="img-circle" alt="">
                                            @endif
                                            <p>        </p>
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="doctor_name" placeholder="Full Name in English" id="doctor_name" value="{{$doctor->doctor_name}}">
                                            <input type="hidden" value="{{$doctor->id}}" name="doctor_id" >
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="doctor_name_ar" placeholder="Full Name in Arabic" id="doctor_name_ar" value="{{$doctor->doctor_name_ar}}">
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="username" placeholder="Username" id="username" value="{{$doctor->username}}">
                                        </div>
                                        <div class="form-field half">
                                            <input type="password" name="password" placeholder="Password" id="password" value="{{$doctor->recover}}">
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="email" placeholder="Email" id="email" value="{{$doctor->email}}">
                                        </div>
                                        <div class="form-field half">
                                            <input class="js-datepicker" type="text" name="birth" id="birth" placeholder="Birthday" value="{{$doctor->birth}}">
                                            <i class="input-icon fa fa-calendar"></i>
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="phone" placeholder="Phone Number" id="phone"  value="{{$doctor->phone}}">
                                        </div>
                                        <div class="form-field half rs-select2 js-select-simple select--no-search">
                                            <select class="select2" data-placeholder="Select Areas" name="area[]" id="area" multiple>
                                                @foreach ($doctorAreas as $doctorArea)
                                                    <option value="{{$doctorArea->area_id}}" selected>{{$doctorArea->area_name}}</option>
                                                @endforeach
                                                @foreach ($areas as $item)
                                                    <option value="{{$item->areas_id}}">{{$item->area_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-field half rs-select2 js-select-simple select--no-search">
                                            <select class="select2" data-placeholder="Select Specialty" name="specialty"  id="specialty">
                                                @foreach ($doctorSpecials as $doctorSpecial)
                                                    <option value="{{$doctorSpecial->special_id}}" selected>{{$doctorSpecial->special_name}}</option>
                                                @endforeach
                                                @foreach ($specials as $special)
                                                    <option value="{{$special->special_id}}">{{$special->special_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-field half">
                                            <input type="file" name="cv" placeholder="Upload Your CV" id="cv" value="{{$doctor->cv}}">
                                        </div>
                                        <div class="form-field">
                                            <input type="text" name="address_ar" placeholder="Address in Arabic" id="address_ar" value="{{$doctor->address_ar}}">
                                        </div>
                                        <div class="form-field">
                                            <input type="text" name="address" placeholder="Address in English" id="address" value="{{$doctor->address}}">
                                        </div>
                                        <div class="form-field">
                                            <textarea name="bio_ar" id="bio_ar" placeholder="Bio">{{$doctor->bio_ar}}</textarea>
                                        </div>
                                        <div class="form-field">
                                            <textarea name="bio" id="bio" placeholder="Bio">{{$doctor->bio}}</textarea>
                                        </div>
                                        {{csrf_field()}}
                                        <button type="submit" class="btn2 clear">Submit</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div><!-- about-us-sec end-->
            </div>
            <div class="tab-pane fade" id="doctor_history">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <a href="#" class="btn-default">Contact Us</a>
                                    <span class="prices">$550.000</span>
                                    <ul class="rating-lst">
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                    </ul><!--rating-lst end-->
                                    <h3>Mohammed El-Mazen</h3>
                                    <h4>April 25, 2019</h4>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                </div>
                            </div>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <a href="#" class="btn-default">Contact Us</a>
                                    <span class="prices">$550.000</span>
                                    <ul class="rating-lst">
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                    </ul><!--rating-lst end-->
                                    <h3>Mohammed El-Mazen</h3>
                                    <h4>April 25, 2019</h4>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                </div>
                            </div>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <a href="#" class="btn-default">Contact Us</a>
                                    <span class="prices">$550.000</span>
                                    <ul class="rating-lst">
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                    </ul><!--rating-lst end-->
                                    <h3>Mohammed El-Mazen</h3>
                                    <h4>April 25, 2019</h4>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                </div>
                            </div>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <a href="#" class="btn-default">Contact Us</a>
                                    <span class="prices">$550.000</span>
                                    <ul class="rating-lst">
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                    </ul><!--rating-lst end-->
                                    <h3>Mohammed El-Mazen</h3>
                                    <h4>April 25, 2019</h4>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="banner_text">
                                <div class="rate-info">
                                    <span>اجمالى</span>
                                    <h5>{{$doctor->balance}} ج م</h5>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#" tabindex="0">
                                            <h3>Dr/ Doctor Name</h3>
                                            <p> <i class="la la-map-marker"></i>212 5th Ave, Egypt</p>
                                        </a>
                                        <ul>
                                            <li>50 Visits</li>
                                            <li>4.8 Rate</li>
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" title="" tabindex="0">Contact Us <i class="la la-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--property-single-pg end-->
@elseif(Config::get('app.locale') == 'en')
    <section class="property-single-pg">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#doctor_profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#edit_profile">Edit Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#doctor_history">History</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="doctor_profile">
                <div class="container">
                    <div class="property-hd-sec">
                        <div class="card">
                            <div class="card-body">
                                <a href="#">
                                    <h3>{{$doctor->doctor_name}}</h3>
                                    <p><i class="la la-map-marker"></i>{{$doctor->address}}</p>
                                </a>
                                <ul>
                                    <li>41,143 views</li>
                                    <li>932 Reservation</li>
                                    <li>92 Comments</li>
                                </ul>
                            </div><!--card-body end-->
                            <div class="rate-info">
                                <h5>{{$doctor->price}} LE</h5>
                                @if($doctor->avail == 1)
                                    <span>For Urgent</span>
                                @else
                                    <span>For Booking</span>
                                @endif
                            </div><!--rate-info end-->
                        </div><!--card end-->
                    </div><!---property-hd-sec end-->
                    <div class="property-single-page-content">
                        <div class="row">
                            <div class="col-lg-8 pl-0 pr-0">
                                <div class="property-pg-left">
                                    <div class="property-imgs">
                                        <div class="property-main-img">
                                            <div class="property-img">
                                                <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" alt="">
                                            </div><!--property-img end-->
                                        </div><!--property-main-img end-->
                                    </div><!--property-imgs end-->
                                    <div class="descp-text">
                                        <h3>Description</h3>
                                        <p>{{$doctor->bio}}</p>
                                    </div><!--descp-text end-->
                                    <div class="details-info">
                                        <h3>Detail</h3>
                                        <ul>
                                            <li>
                                                <h4>Type:</h4>
                                                <span>Doctor</span>
                                            </li>
                                            <li>
                                                <h4>Age:</h4>
                                                <span>{{$doctor->age}}</span>
                                            </li>
                                            <li>
                                                <h4>Specialty:</h4>
                                                @foreach ($specialty as $s)
                                                <span>{{$s->special_name}}</span>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div><!--details-info end-->
                                    <div class="features-dv">
                                        <h3>Dates</h3>
                                        <form class="form_field">
                                            <ul>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c1">
                                                    <label for="c1">
                                                        <span></span>
                                                        <small>Saturday</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c2" checked>
                                                    <label for="c2">
                                                        <span></span>
                                                        <small>Sunday ( 3pm : 9pm )</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c3">
                                                    <label for="c3">
                                                        <span></span>
                                                        <small>Monday</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c4" checked>
                                                    <label for="c4">
                                                        <span></span>
                                                        <small>Tuesday ( 3pm : 9pm )</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c5" checked>
                                                    <label for="c5">
                                                        <span></span>
                                                        <small>Wednesday ( 3pm : 9pm )</small>
                                                    </label>
                                                </li>
                                                <li class="input-field">
                                                    <input type="checkbox" name="cc" id="c6">
                                                    <label for="c6">
                                                        <span></span>
                                                        <small>Thursday</small>
                                                    </label>
                                                </li>
                                            </ul>
                                        </form>
                                    </div><!--features-dv end-->
    
                                    <div class="map-dv">
                                        <h3>Location</h3>
                                        <div id="map-container" class="fullwidth-home-map">
                                            <div id="map" data-map-zoom="9"></div>
                                        </div>
                                    </div><!--map-dv end-->
                                    <div class="nearby-locts">
                                        <h3>What's Nearby?</h3>
                                        <span>Powered by <img src="{{asset('vendors/site/EN/images/ylog.png')}}" alt=""></span>
                                        <div class="widget-posts">
                                            <ul>
                                                <li>
                                                    <div class="wd-posts">
                                                        <div class="ps-img">
                                                            <img src="{{asset('vendors/site/EN/images/listing-item-01.jpg')}}" alt="">
                                                        </div><!--ps-img end-->
                                                        <div class="ps-info">
                                                            <h3><a href="#" title="">The Museum of Modern Art</a></h3>
                                                            <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                                        </div><!--ps-info end-->
                                                    </div><!--wd-posts end-->
                                                    <ul class="star-rating">
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                    </ul><!--star-rating end-->
                                                </li>
                                                <li>
                                                    <div class="wd-posts">
                                                        <div class="ps-img">
                                                            <img src="{{asset('vendors/site/EN/images/listing-item-01.jpg')}}" alt="">
                                                        </div><!--ps-img end-->
                                                        <div class="ps-info">
                                                            <h3><a href="#" title="">Joe's Shanghai</a></h3>
                                                            <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                                        </div><!--ps-info end-->
                                                    </div><!--wd-posts end-->
                                                    <ul class="star-rating">
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                    </ul><!--star-rating end-->
                                                </li>
                                                <li>
                                                    <div class="wd-posts">
                                                        <div class="ps-img">
                                                            <img src="{{asset('vendors/site/EN/images/listing-item-01.jpg')}}" alt="">
                                                        </div><!--ps-img end-->
                                                        <div class="ps-info">
                                                            <h3><a href="#" title="">Apple Fifth Avenue</a></h3>
                                                            <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                                        </div><!--ps-info end-->
                                                    </div><!--wd-posts end-->
                                                    <ul class="star-rating">
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                        <li><span class="la la-star"></span></li>
                                                    </ul><!--star-rating end-->
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--nearby-locts end-->
                                    <div class="comments-dv">
                                        <h3>3 Reviews</h3>
                                        <div class="comment-section">
                                            <ul>
                                                <li>
                                                    <div class="cm-info-sec">
                                                        <div class="cm-img">
                                                            <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                                        </div><!--author-img end-->
                                                        <div class="cm-info">
                                                            <h3>Mohammed El-Mazen</h3>
                                                            <h4>April 25, 2019</h4>
                                                        </div>
                                                        <ul class="rating-lst">
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                        </ul><!--rating-lst end-->
                                                    </div><!--cm-info-sec end-->
                                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                                    <a href="#" title="" class="cm-reply">Reply</a>
                                                </li>
                                                <li>
                                                    <div class="cm-info-sec">
                                                        <div class="cm-img">
                                                            <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                                        </div><!--author-img end-->
                                                        <div class="cm-info">
                                                            <h3>Mohammed El-Mazen</h3>
                                                            <h4>April 25, 2019</h4>
                                                        </div>
                                                        <ul class="rating-lst">
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                        </ul><!--rating-lst end-->
                                                    </div><!--cm-info-sec end-->
                                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                                    <a href="#" title="" class="cm-reply">Reply</a>
                                                </li>
                                                <li>
                                                    <div class="cm-info-sec">
                                                        <div class="cm-img">
                                                            <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                                        </div><!--author-img end-->
                                                        <div class="cm-info">
                                                            <h3>Mohammed El-Mazen</h3>
                                                            <h4>April 25, 2019</h4>
                                                        </div>
                                                        <ul class="rating-lst">
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                            <li><span class="la la-star"></span></li>
                                                        </ul><!--rating-lst end-->
                                                    </div><!--cm-info-sec end-->
                                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                                    <a href="#" title="" class="cm-reply">Reply</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="review-hd">
                                            <div class="rev-hd">
                                                <h3>Write a Review</h3>
                                                <ul class="rating-lst">
                                                    <li><span class="la la-star"></span></li>
                                                    <li><span class="la la-star"></span></li>
                                                    <li><span class="la la-star"></span></li>
                                                    <li><span class="la la-star"></span></li>
                                                    <li><span class="la la-star"></span></li>
                                                </ul><!--rating-lst end-->
                                            </div><!--rev-hd end-->
                                            <div class="post-comment-sec">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 pl-0">
                                                            <div class="form-field">
                                                                <input type="text" name="name" placeholder="Your Name">
                                                            </div><!--form-field end-->
                                                        </div>
                                                        <div class="col-lg-4 col-md-4">
                                                            <div class="form-field">
                                                                <input type="text" name="email" placeholder="Your Email">
                                                            </div><!--form-field end-->
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 pr-0">
                                                            <div class="form-field">
                                                                <input type="text" name="phone" placeholder="Your Phone">
                                                            </div><!--form-field end-->
                                                        </div>
                                                        <div class="col-lg-12 pl-0 pr-0">
                                                            <div class="form-field">
                                                                <textarea name="message" placeholder="Your Message"></textarea>
                                                            </div><!--form-field end-->
                                                        </div>
                                                        <div class="col-lg-12 pl-0 pr-0">
                                                            <button type="submit" class="btn-default">Post Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!--post-comment-sec end-->
                                        </div><!--review-hd end-->
                                    </div><!--comments-dv end-->
                                    <div class="similar-listings-posts">
                                        <h3>Similar Listings</h3>
                                        <div class="list-products">
                                            <div class="card">
                                                <a href="Single.html" title="">
                                                    <div class="img-block">
                                                        <div class="overlay"></div>
                                                        <img src="{{asset('vendors/site/EN/images/1.jpg')}}" alt="" class="img-fluid">
                                                        <div class="rate-info">
                                                            <h5>$550.000</h5>
                                                            <span>For Booking</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card_bod_full">
                                                    <div class="card-body">
                                                        <a href="Single.html" title="">
                                                            <h3>Dr/ Doctor Name</h3>
                                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                                        </a>
                                                        <ul>
                                                            <li>41,143 views</li>
                                                            <li>932 Reservation</li>
                                                            <li>92 Comments</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="crd-links">
                                                            <a href="#" class="pull-left">
                                                                <i class="la la-heart-o"></i>
                                                            </a>
                                                            <a href="#" class="plf">
                                                                <i class="la la-calendar-check-o"></i> 25 Days Ago
                                                            </a>
                                                        </div><!--crd-links end-->
                                                        <a href="Single.html" title="" class="btn-default">View Profile</a>
                                                    </div>
                                                </div><!--card_bod_full end-->
                                                <a href="Single.html" title="" class="ext-link"></a>
                                            </div><!--card end-->
                                            <div class="card">
                                                <a href="Single.html" title="">
                                                    <div class="img-block">
                                                        <div class="overlay"></div>
                                                        <img src="{{asset('vendors/site/EN/images/2.jpg')}}" alt="" class="img-fluid">
                                                        <div class="rate-info">
                                                            <h5>$550.000</h5>
                                                            <span>For Booking</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card_bod_full">
                                                    <div class="card-body">
                                                        <a href="Single.html" title="">
                                                            <h3>Dr/ Doctor Name</h3>
                                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                                        </a>
                                                        <ul>
                                                            <li>41,143 views</li>
                                                            <li>932 Reservation</li>
                                                            <li>92 Comments</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="crd-links">
                                                            <a href="#" class="pull-left">
                                                                <i class="la la-heart-o"></i>
                                                            </a>
                                                            <a href="#" class="plf">
                                                                <i class="la la-calendar-check-o"></i> 25 Days Ago
                                                            </a>
                                                        </div><!--crd-links end-->
                                                        <a href="Single.html" title="" class="btn-default">View Profile</a>
                                                    </div>
                                                </div><!--card_bod_full end-->
                                                <a href="Single.html" title="" class="ext-link"></a>
                                            </div><!--card end-->
                                            <div class="card">
                                                <a href="Single.html" title="">
                                                    <div class="img-block">
                                                        <div class="overlay"></div>
                                                        <img src="{{asset('vendors/site/EN/images/3.jpg')}}" alt="" class="img-fluid">
                                                        <div class="rate-info">
                                                            <h5>$550.000</h5>
                                                            <span>For Booking</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card_bod_full">
                                                    <div class="card-body">
                                                        <a href="Single.html" title="">
                                                            <h3>Dr/ Doctor Name</h3>
                                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                                        </a>
                                                        <ul>
                                                            <li>41,143 views</li>
                                                            <li>932 Reservation</li>
                                                            <li>92 Comments</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="crd-links">
                                                            <a href="#" class="pull-left">
                                                                <i class="la la-heart-o"></i>
                                                            </a>
                                                            <a href="#" class="plf">
                                                                <i class="la la-calendar-check-o"></i> 25 Days Ago
                                                            </a>
                                                        </div><!--crd-links end-->
                                                        <a href="Single.html" title="" class="btn-default">View Profile</a>
                                                    </div>
                                                </div><!--card_bod_full end-->
                                                <a href="Single.html" title="" class="ext-link"></a>
                                            </div><!--card end-->
                                            <div class="card">
                                                <a href="Single.html" title="">
                                                    <div class="img-block">
                                                        <div class="overlay"></div>
                                                        <img src="{{asset('vendors/site/EN/images/4.jpg')}}" alt="" class="img-fluid">
                                                        <div class="rate-info">
                                                            <h5>$550.000</h5>
                                                            <span>For Booking</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="card_bod_full">
                                                    <div class="card-body">
                                                        <a href="Single.html" title="">
                                                            <h3>Dr/ Doctor Name</h3>
                                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                                        </a>
                                                        <ul>
                                                            <li>41,143 views</li>
                                                            <li>932 Reservation</li>
                                                            <li>92 Comments</li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="crd-links">
                                                            <a href="#" class="pull-left">
                                                                <i class="la la-heart-o"></i>
                                                            </a>
                                                            <a href="#" class="plf">
                                                                <i class="la la-calendar-check-o"></i> 25 Days Ago
                                                            </a>
                                                        </div><!--crd-links end-->
                                                        <a href="Single.html" title="" class="btn-default">View Profile</a>
                                                    </div>
                                                </div><!--card_bod_full end-->
                                                <a href="Single.html" title="" class="ext-link"></a>
                                            </div><!--card end-->
                                        </div><!-- list-products end-->
                                    </div><!--similar-listings-posts end-->
                                </div><!--property-pg-left end-->
                            </div>
                            <div class="col-lg-4 pr-0">
                                <div class="sidebar layout2">
                                    <div class="widget widget-form">
                                        <h3 class="widget-title">Contact with Med Troops</h3>
                                        <div class="contct-info">
                                            <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" style="max-width: 81px;">
                                            <div class="contct-nf">
                                                <h3>{{$doctor->doctor_name}}</h3>
                                                <h4>Med Troops Doctor</h4>
                                                <span><i class="la la-phone"></i>{{$doctor->phone}}</span>
                                            </div>
                                        </div><!--contct-info end-->
                                        <div class="post-comment-sec">
                                            <form>
                                                <div class="form-field">
                                                    <input type="text" name="name" placeholder="Your Name">
                                                </div><!--form-field end-->
                                                <div class="form-field">
                                                    <input type="text" name="email" placeholder="Your Email">
                                                </div><!--form-field end-->
                                                <div class="form-field">
                                                    <input type="text" name="phone" placeholder="Your Phone">
                                                </div><!--form-field end-->
                                                <div class="form-field">
                                                    <textarea name="message" placeholder="Your Message"></textarea>
                                                </div><!--form-field end-->
                                                <button type="submit" class="btn2">Contact</button>
                                            </form>
                                        </div><!--post-comment-sec end-->
                                    </div><!--widget-form end-->
                                </div><!--sidebar end-->
                            </div>
                        </div>
                    </div><!--property-single-page-content end-->
                </div>
            </div>
            <div class="tab-pane fade" id="edit_profile">
                <div class="be-doctor-sec container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="doctor_form_section">
                                    <form method="post" id="doctor_form" enctype="multipart/form-data">
                                        <div class="user-img-upload">
                                            <div class="fileUpload user-editimg">
                                                <span><i class="fa fa-camera"></i> Add</span>
                                                <input type="file" id="imgInp" class="upload" name="image" value="{{$doctor->image}}"> 
                                                <input type="hidden" value="doctor" name="storage" >
                                            </div>
                                            @if($doctor->image == null)
                                            <img src="{{asset('vendors/img/1.jpg')}}" id="blah" class="img-circle" alt="">
                                            @else
                                            <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" id="blah" class="img-circle" alt="">
                                            @endif
                                            <p>        </p>
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="doctor_name" placeholder="Full Name in English" id="doctor_name" value="{{$doctor->doctor_name}}">
                                            <input type="hidden" value="{{$doctor->id}}" name="doctor_id" >
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="doctor_name_ar" placeholder="Full Name in Arabic" id="doctor_name_ar" value="{{$doctor->doctor_name_ar}}">
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="username" placeholder="Username" id="username" value="{{$doctor->username}}">
                                        </div>
                                        <div class="form-field half">
                                            <input type="password" name="password" placeholder="Password" id="password" value="{{$doctor->recover}}">
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="email" placeholder="Email" id="email" value="{{$doctor->email}}">
                                        </div>
                                        <div class="form-field half">
                                            <input class="js-datepicker" type="text" name="birth" id="birth" placeholder="Birthday" value="{{$doctor->birth}}">
                                            <i class="input-icon fa fa-calendar"></i>
                                        </div>
                                        <div class="form-field half">
                                            <input type="text" name="phone" placeholder="Phone Number" id="phone"  value="{{$doctor->phone}}">
                                        </div>
                                        <div class="form-field half rs-select2 js-select-simple select--no-search">
                                            <select class="select2" data-placeholder="Select Areas" name="area[]" id="area" multiple>
                                                @foreach ($doctorAreas as $doctorArea)
                                                    <option value="{{$doctorArea->area_id}}" selected>{{$doctorArea->area_name}}</option>
                                                @endforeach
                                                @foreach ($areas as $item)
                                                    <option value="{{$item->areas_id}}">{{$item->area_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-field half rs-select2 js-select-simple select--no-search">
                                            <select class="select2" data-placeholder="Select Specialty" name="specialty"  id="specialty">
                                                @foreach ($doctorSpecials as $doctorSpecial)
                                                    <option value="{{$doctorSpecial->special_id}}" selected>{{$doctorSpecial->special_name}}</option>
                                                @endforeach
                                                @foreach ($specials as $special)
                                                    <option value="{{$special->special_id}}">{{$special->special_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-field half">
                                            <input type="file" name="cv" placeholder="Upload Your CV" id="cv" value="{{$doctor->cv}}">
                                        </div>
                                        <div class="form-field">
                                            <input type="text" name="address_ar" placeholder="Address in Arabic" id="address_ar" value="{{$doctor->address_ar}}">
                                        </div>
                                        <div class="form-field">
                                            <input type="text" name="address" placeholder="Address in English" id="address" value="{{$doctor->address}}">
                                        </div>
                                        <div class="form-field">
                                            <textarea name="bio_ar" id="bio_ar" placeholder="Bio">{{$doctor->bio_ar}}</textarea>
                                        </div>
                                        <div class="form-field">
                                            <textarea name="bio" id="bio" placeholder="Bio">{{$doctor->bio}}</textarea>
                                        </div>
                                        {{csrf_field()}}
                                        <button type="submit" class="btn2 clear">Submit</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div><!-- about-us-sec end-->
            </div>
            <div class="tab-pane fade" id="doctor_history">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <a href="#" class="btn-default">Contact Us</a>
                                    <span class="prices">$550.000</span>
                                    <ul class="rating-lst">
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                    </ul><!--rating-lst end-->
                                    <h3>Mohammed El-Mazen</h3>
                                    <h4>April 25, 2019</h4>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                </div>
                            </div>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <a href="#" class="btn-default">Contact Us</a>
                                    <span class="prices">$550.000</span>
                                    <ul class="rating-lst">
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                    </ul><!--rating-lst end-->
                                    <h3>Mohammed El-Mazen</h3>
                                    <h4>April 25, 2019</h4>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                </div>
                            </div>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <a href="#" class="btn-default">Contact Us</a>
                                    <span class="prices">$550.000</span>
                                    <ul class="rating-lst">
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                    </ul><!--rating-lst end-->
                                    <h3>Mohammed El-Mazen</h3>
                                    <h4>April 25, 2019</h4>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                </div>
                            </div>
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <a href="#" class="btn-default">Contact Us</a>
                                    <span class="prices">$550.000</span>
                                    <ul class="rating-lst">
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                        <li><span class="la la-star"></span></li>
                                    </ul><!--rating-lst end-->
                                    <h3>Mohammed El-Mazen</h3>
                                    <h4>April 25, 2019</h4>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="banner_text">
                                <div class="rate-info">
                                    <span>Total</span>
                                    <h5>{{$doctor->balance}} LE</h5>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#" tabindex="0">
                                            <h3>Dr/ Doctor Name</h3>
                                            <p> <i class="la la-map-marker"></i>212 5th Ave, Egypt</p>
                                        </a>
                                        <ul>
                                            <li>50 Visits</li>
                                            <li>4.8 Rate</li>
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" title="" tabindex="0">Contact Us <i class="la la-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--property-single-pg end-->
@endif
@endsection
@include('site.pages.doctorprofile.scripts')