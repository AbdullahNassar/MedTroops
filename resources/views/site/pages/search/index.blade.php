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
                    <h3>نتائج البحث</h3>
                    <ul>
                        <li><a href="{{route('site.home')}}" title="">الرئيسية</a></li>
                        <li><span>نتائج البحث</span></li>
                    </ul>
                @elseif(Config::get('app.locale') == 'en')
                    <h3>Search Results</h3>
                    <ul>
                        <li><a href="{{route('site.home')}}" title="">Home</a></li>
                        <li><span>Search Results</span></li>
                    </ul>
                @endif
            </div><!--pager-sec-details end-->
        </div>
    </section>

    <section class="listing-main-sec section-padding2">
        <div class="container">
            <div class="listing-main-sec-details">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="listing-directs">
                            <div class="list-head">
                                <div class="sortby">
                                    <span>Sort by:</span>
                                    <div class="drop-menu">
                                        <div class="select">
                                            <span>Type</span>
                                            <i class="la la-caret-down"></i>
                                        </div>
                                        <input type="hidden" name="gender">
                                        <ul class="dropeddown">
                                            <li>For Urgent</li>
                                            <li>For Booking</li>
                                        </ul>
                                    </div>
                                </div><!--sortby end-->
                                <div class="view-change">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="grid-tab1" data-toggle="tab" href="#grid-view-tab1" role="tab" aria-controls="grid-view-tab1" aria-selected="true"><i class="la la-th-large"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="grid-tab2" data-toggle="tab" href="#grid-view-tab2" role="tab" aria-controls="grid-view-tab2" aria-selected="true"><i class="la la-th-list"></i></a>
                                        </li>
                                    </ul>
                                </div><!--view-change end-->
                            </div><!--list-head end-->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="grid-view-tab1" role="tabpanel" aria-labelledby="grid-view-tab1">
                                    <div class="list_products">
                                        <div class="row">
                                            @foreach($doctors as $doctor)
                                                @if(Config::get('app.locale') == 'ar')
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="card">
                                                            <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="">
                                                                <div class="img-block">
                                                                    <div class="overlay"></div>
                                                                    <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" alt="" class="img-fluid">
                                                                    <div class="rate-info">
                                                                        <h5>{{$doctor->price}} ج م</h5>
                                                                        @if($doctor->avail == 1)
                                                                            <span>طوارئ</span>
                                                                        @else
                                                                            <span>حجز</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="card-body">
                                                                <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="">
                                                                    <h3>{{$doctor->doctor_name_ar}}</h3>
                                                                    <p>
                                                                        <i class="la la-map-marker"></i>{{$doctor->address_ar}}
                                                                    </p>
                                                                </a>
                                                                <ul>
                                                                    <li>41,143 views</li>
                                                                    <li>932 Reservation</li>
                                                                    <li>12 minute</li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="crd-links">
                                                                    <ul class="rating-lst">
                                                                        <li><span class="la la-star"></span></li>
                                                                        <li><span class="la la-star"></span></li>
                                                                        <li><span class="la la-star"></span></li>
                                                                        <li><span class="la la-star"></span></li>
                                                                        <li><span class="la la-star"></span></li>
                                                                    </ul>
                                                                </div><!--crd-links end-->
                                                                <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="" class="btn-default">View Profile</a>
                                                                <a href="#" title="" class="btn-default">Reservation</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @elseif(Config::get('app.locale') == 'en')
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="card">
                                                            <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="">
                                                                <div class="img-block">
                                                                    <div class="overlay"></div>
                                                                    <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" alt="" class="img-fluid">
                                                                    <div class="rate-info">
                                                                        <h5>{{$doctor->price}} LE</h5>
                                                                        @if($doctor->avail == 1)
                                                                            <span>For Urgent</span>
                                                                        @else
                                                                            <span>For Booking</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="card-body">
                                                                <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="">
                                                                    <h3>{{$doctor->doctor_name}}</h3>
                                                                    <p>
                                                                        <i class="la la-map-marker"></i>{{$doctor->address}}
                                                                    </p>
                                                                </a>
                                                                <ul>
                                                                    <li>41,143 views</li>
                                                                    <li>932 Reservation</li>
                                                                    <li>12 minute</li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="crd-links">
                                                                    <ul class="rating-lst">
                                                                        <li><span class="la la-star"></span></li>
                                                                        <li><span class="la la-star"></span></li>
                                                                        <li><span class="la la-star"></span></li>
                                                                        <li><span class="la la-star"></span></li>
                                                                        <li><span class="la la-star"></span></li>
                                                                    </ul>
                                                                </div><!--crd-links end-->
                                                                <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="" class="btn-default">View Profile</a>
                                                                <a href="#" title="" class="btn-default">Reservation</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><!--list_products end-->
                                    
                                </div>
                                <div class="tab-pane fade show active" id="grid-view-tab2" role="tabpanel" aria-labelledby="grid-view-tab2">
                                    <div class="list-products">
                                        @foreach($doctors as $doctor)
                                            @if(Config::get('app.locale') == 'ar')
                                                <div class="card">
                                                    <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="">
                                                        <div class="img-block">
                                                            <div class="overlay"></div>
                                                            <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" alt="" class="img-fluid">
                                                            <div class="rate-info">
                                                                <h5>{{$doctor->price}} ج م</h5>
                                                                @if($doctor->avail == 1)
                                                                    <span>طوارئ</span>
                                                                @else
                                                                    <span>حجز</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card_bod_full">
                                                        <div class="card-body">
                                                            <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="">
                                                                <h3>{{$doctor->doctor_name_ar}}</h3>
                                                                <p><i class="la la-map-marker"></i>{{$doctor->address_ar}}</p>
                                                            </a>
                                                            <ul>
                                                                <li>41,143 views</li>
                                                                <li>932 Reservation</li>
                                                                <li>12 minute</li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="crd-links">
                                                                <ul class="rating-lst">
                                                                    <li><span class="la la-star"></span></li>
                                                                    <li><span class="la la-star"></span></li>
                                                                    <li><span class="la la-star"></span></li>
                                                                    <li><span class="la la-star"></span></li>
                                                                    <li><span class="la la-star"></span></li>
                                                                </ul>
                                                            </div><!--crd-links end-->
                                                            <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="" class="btn-default">View Profile</a>
                                                            <a href="#" title="" class="btn-default">حجز</a>
                                                        </div>
                                                    </div><!--card_bod_full end-->
                                                    <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="" class="ext-link"></a>
                                                </div><!--card end-->
                                            @elseif(Config::get('app.locale') == 'en')
                                                <div class="card">
                                                    <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="">
                                                        <div class="img-block">
                                                            <div class="overlay"></div>
                                                            <img src="{{asset('storage/uploads/doctor/'.$doctor->image)}}" alt="" class="img-fluid">
                                                            <div class="rate-info">
                                                                <h5>{{$doctor->price}} LE</h5>
                                                                @if($doctor->avail == 1)
                                                                    <span>For Urgent</span>
                                                                @else
                                                                    <span>For Booking</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="card_bod_full">
                                                        <div class="card-body">
                                                            <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="">
                                                                <h3>{{$doctor->doctor_name}}</h3>
                                                                <p><i class="la la-map-marker"></i>{{$doctor->address}}</p>
                                                            </a>
                                                            <ul>
                                                                <li>41,143 views</li>
                                                                <li>932 Reservation</li>
                                                                <li>12 minute</li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="crd-links">
                                                                <ul class="rating-lst">
                                                                    <li><span class="la la-star"></span></li>
                                                                    <li><span class="la la-star"></span></li>
                                                                    <li><span class="la la-star"></span></li>
                                                                    <li><span class="la la-star"></span></li>
                                                                    <li><span class="la la-star"></span></li>
                                                                </ul>
                                                            </div><!--crd-links end-->
                                                            <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="" class="btn-default">View Profile</a>
                                                            <a href="#" title="" class="btn-default">Reservation</a>
                                                        </div>
                                                    </div><!--card_bod_full end-->
                                                    <a href="{{ route('site.doctor' , ['id' => $doctor->id]) }}" title="" class="ext-link"></a>
                                                </div><!--card end-->
                                            @endif
                                        @endforeach
                                    </div><!-- list-products end-->
                                </div>
                            </div><!--tab-content end-->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav><!--pagination end-->
                        </div><!--listing-directs end-->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar layout2">
                            <div class="widget widget-property-search">
                                <h3 class="widget-title">Property Search</h3>
                                <form action="#" class="row banner-search">
                                    <div class="form_field">
                                        <input type="text" class="form-control" placeholder="Enter Address, City or State">
                                    </div>
                                    <div class="form_field">
                                        <div class="form-group">
                                            <div class="drop-menu">
                                                <div class="select">
                                                    <span>Any type</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <input type="hidden" name="gender">
                                                <ul class="dropeddown">
                                                    <li>For Urgent</li>
                                                    <li>For Booking</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_field">
                                        <div class="form-group">
                                            <div class="drop-menu">
                                                <div class="select">
                                                    <span>Specialization</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <input type="hidden" name="gender">
                                                <ul class="dropeddown">
                                                    <li>Cardiology</li>
                                                    <li>Gastroenterology</li>
                                                    <li>Pulmonology</li>
                                                    <li>Ophthalmology</li>
                                                    <li>Gynecology</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_field tpmax">
                                        <input type="text" class="form-control" placeholder="Doctor Name">
                                    </div>
                                    <div class="form_field">
                                        <h4>More Features</h4>
                                        <ul>
                                            <li class="input-field">
                                                <input type="checkbox" name="cc" id="c1">
                                                <label for="c1">
                                                    <span></span>
                                                    <small>Name</small>
                                                </label>
                                            </li>
                                            <li class="input-field">
                                                <input type="checkbox" name="cc" id="c2">
                                                <label for="c2">
                                                    <span></span>
                                                    <small>area</small>
                                                </label>
                                            </li>
                                            <li class="input-field">
                                                <input type="checkbox" name="cc" id="c3">
                                                <label for="c3">
                                                    <span></span>
                                                    <small>Specialization</small>
                                                </label>
                                            </li>
                                            <li class="input-field">
                                                <input type="checkbox" name="cc" id="c4">
                                                <label for="c4">
                                                    <span></span>
                                                    <small>filter</small>
                                                </label>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li class="input-field">
                                                <input type="checkbox" name="cc" id="c5">
                                                <label for="c5">
                                                    <span></span>
                                                    <small>filter</small>
                                                </label>
                                            </li>
                                            <li class="input-field">
                                                <input type="checkbox" name="cc" id="c6">
                                                <label for="c6">
                                                    <span></span>
                                                    <small>filter</small>
                                                </label>
                                            </li>
                                            <li class="input-field">
                                                <input type="checkbox" name="cc" id="c7">
                                                <label for="c7">
                                                    <span></span>
                                                    <small>filter</small>
                                                </label>
                                            </li>
                                            <li class="input-field">
                                                <input type="checkbox" name="cc" id="c8">
                                                <label for="c8">
                                                    <span></span>
                                                    <small>filter</small>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form_field">
                                        <a href="#" class="btn btn-outline-primary ">
                                            <span>Search</span>
                                        </a>
                                    </div>
                                </form>
                            </div><!--widget-property-search end-->
                            <div class="widget widget-featured-property">
                                <h3 class="widget-title">Featured Property</h3>
                                <div class="card">
                                    <a href="" title="">
                                        <div class="img-block">
                                            <div class="overlay"></div>
                                            <img src="{{asset('vendors/site/EN/images/post-img1.jpg')}}" alt="" class="img-fluid">
                                            <div class="rate-info">
                                                <h5>$550.000</h5>
                                                <span>For Booking</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <a href="" title="">
                                            <h3>Dr/ Mohammed El-Mazen</h3>
                                            <p><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</p>
                                        </a>
                                    </div>
                                </div>
                            </div><!--widget-featured-property end-->
                            <div class="widget widget-catgs">
                                <h3 class="widget-title">Categories</h3>
                                <ul>
                                    <li>
                                        <a href="#" title=""><i class="la la-angle-right"></i><span>Medical</span></a>
                                        <span>7</span>
                                    </li>
                                    <li>
                                        <a href="#" title=""><i class="la la-angle-right"></i><span>DOCTORS</span></a>
                                        <span>15</span>
                                    </li>
                                    <li>
                                        <a href="#" title=""><i class="la la-angle-right"></i><span>Medicine</span></a>
                                        <span>4</span>
                                    </li>
                                    <li>
                                        <a href="#" title=""><i class="la la-angle-right"></i><span>Hospital</span></a>
                                        <span>1</span>
                                    </li>
                                </ul>
                            </div><!--widget-catgs end-->
                            <div class="widget widget-posts">
                                <h3 class="widget-title">Popular Posts</h3>
                                <ul>
                                    <li>
                                        <div class="wd-posts">
                                            <div class="ps-img">
                                                <a href="blog_open.html" title="">
                                                    <img src="{{asset('vendors/site/EN/images/p-img1.png')}}" alt="">
                                                </a>
                                            </div><!--ps-img end-->
                                            <div class="ps-info">
                                                <h3><a href="blog_open.html" title="">Dr/ Doctor Name</a></h3>
                                                <strong>$125.700</strong>
                                                <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                            </div><!--ps-info end-->
                                        </div><!--wd-posts end-->
                                    </li>
                                    <li>
                                        <div class="wd-posts">
                                            <div class="ps-img">
                                                <a href="blog_open.html" title="">
                                                    <img src="{{asset('vendors/site/EN/images/p-img2.png')}}" alt="">
                                                </a>
                                            </div><!--ps-img end-->
                                            <div class="ps-info">
                                                <h3><a href="blog_open.html" title="">Luxury Home</a></h3>
                                                <strong>$125.700</strong>
                                                <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                            </div><!--ps-info end-->
                                        </div><!--wd-posts end-->
                                    </li>
                                    <li>
                                        <div class="wd-posts">
                                            <div class="ps-img">
                                                <a href="blog_open.html" title="">
                                                    <img src="{{asset('vendors/site/EN/images/p-img3.png')}}" alt="">
                                                </a>
                                            </div><!--ps-img end-->
                                            <div class="ps-info">
                                                <h3><a href="blog_open.html" title="">Medical Industry</a></h3>
                                                <strong>$125.700</strong>
                                                <span><i class="la la-map-marker"></i>Qasr El-Ainy hospital, Egypt</span>
                                            </div><!--ps-info end-->
                                        </div><!--wd-posts end-->
                                    </li>
                                </ul>
                            </div><!--widget-posts end-->
                        </div><!--sidebar end-->
                    </div>
                </div>
            </div><!--listing-main-sec-details end-->
        </div>    
    </section><!--listing-main-sec end-->
@endsection
@include('site.pages.search.scripts')