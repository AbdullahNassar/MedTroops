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
                <h3>المدونة</h3>
                <ul>
                    <li><a href="{{route('site.home')}}" title="">الرئيسية</a></li>
                    <li><span>المدونة</span></li>
                </ul>
                @elseif(Config::get('app.locale') == 'en')
                <h3>Blog</h3>
                <ul>
                    <li><a href="{{route('site.home')}}" title="">Home</a></li>
                    <li><span>Blog</span></li>
                </ul>
                @endif
            </div><!--pager-sec-details end-->
        </div>
    </section>
    @if(Config::get('app.locale') == 'ar')
    <section class="blog-single-sec section-padding">
        <div class="container">
            <div class="blog-single-details">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-single-post single">
                            <ul class="post-nfo">
                                <li><i class="la la-calendar"></i>{{(new DateTime($post->updated_at))->format('M')}} {{(new DateTime($post->updated_at))->format('j')}}, {{(new DateTime($post->updated_at))->format('Y')}}</li>
                                <li><i class="la la-comment-o"></i><a href="#" title="">4 Comments</a></li>
                                <li><i class="la la-bookmark-o"></i><a href="#" title="">Apartments</a></li>
                            </ul>
                            <h3>Medical near ocean</h3>
                            <div class="blog-img">
                                <img src="images/blog-img.jpg" alt="">
                            </div><!--blog-img end-->
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat nec purus eget porta. Aliquam ebendum erat. Donec dui eros, tincidunt at felis non, tristique aliquet ex. Aenean luctus, orci condimentum cursus, quam lorem vulputate ligula, ac pretium risus metus non est. Cras rutrum dolor in tortor ultrices, ullamcorper finibus magna sollicitudin. Vivamus sed massa sit amet diam porta dignissim at in lorem. In facilisis quis erat at tempus. Aliquam semper diam mollis mollis. Mauris dictum, ante ac interdum.</p>
                            <p> Astibulum, nibh ipsum condimentum felis, quis luctus nisi nisl sed orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tempus puet rutrum ultrces. Cras pretium pretium odio aliquam tortor interduma. Morbi commodo egestas mauris, et porttitor ipsum iaculis fermentum. Phasellus ante nibh, posuere gravida odio mattis cursus. </p>
                            <blockquote>Donec sapien odio, mollis ut phaliquet hendrerit erat. Etiam mollis odio ac libero ultrices cursus. Mauris massa felis, rutrum vitae velit et. Aliquam ac neque in dui eleifend elementum vitae mi.</blockquote>
                            <p>Praesent bibendum eget justo ac volutpat. Proin laoreet hendrerit porttitor. Praesent ac lobortis urna. Nam vi ligula nec posuere ornare. Integer aliquet libero at lectus scelerisque fermentum. Sed dapibus massa ut ex semper porttitor. Donec blandit dui sit amet nunc sagittis, ut convallis ligula tempor. Vestibulum at tincidunt mi. Proin venenatis dui et ex lobortis ultricies. </p>
                            <div class="blg-dv">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blg-sm">
                                            <img src="images/blog-sm1.jpg" alt="">
                                        </div><!--blg-sm end-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="blg-info">
                                            <p>Orci varius natoque penatibus et magnis disa parturient montes, nascetur ridiculus mus. Vestibulum scelerisque commodo ultricies. Phasellus vite ipsum eget diam feme ntum tempor quis nec diam. Nulla at lacus consequat.</p>
                                            <p> Turpis elementum luctus. Fusce viver erat eget mi conse ctetur pretium. Praesent tellus nulla, placerat at elit into, aliquet hendrit est. Phasellus tellus dui, scelerisque eget tortor molestie, dignissim bibendum enim. Nunc ut ante a nunc sollicitudin venenatis. Integer vehicula mi digsim.</p>
                                            <p> Nunc imperdiet, non sollicitudi lus facilisis. Morbi egestas nisi a interdum eleum. Ut sit amet rhoncus ligula. Integer massa orci, laoreet hendrerit aliquet ne congue eu nibh. </p>
                                        </div><!--blg-info end-->
                                    </div>
                                </div>
                            </div><!--blg-dv end-->
                            <p>Ut egestas fringilla commodo. Phasellus ac mi vel massa mattis elementum non et quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent at nibh eros. Curabitur rutrum fermentum augue, ut auctor elit tempor scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus sed ante eu justo feugiat fringilla sit amet quis arcu. Vivamus eget cursus ligula, condimentum feugiat velit, a viverra urna placerat et.</p>
                            <ul class="bg-links">
                                <li>Nunc varius varius dolor, sit amet dignissim ligula placerat ullamcorper quam a magna tempus ornare. </li>
                                <li>Aliquam sapien lorem, aliquet consequat neque vel, placerat euismod isl vitae velit elementum aliquet.</li>
                                <li>Sed id orci laoreet, lacinia ligula eget, fringilla metus. Quisque nec or condimentum accumsan neque. </li>
                            </ul><!--bg-links end-->
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat nec purus eget porta. Aliquam ebendum erat. Donec dui eros, tincidunt at felis non, tristique aliquet ex. Aenean luctus, orci condimentum cursus, quam lorem vulputate ligula, ac pretium risus metus non est. Cras rutrum dolor in tortor ultrices, ullamcorper finibus magna sollicitudin. Vivamus sed massa sit amet diam porta dignissim at in lorem. In facilisis quis erat at tempus. Aliquam semper diam mollis mollis. Mauris dictum, ante ac interdum.</p>
                            <p> Astibulum, nibh ipsum condimentum felis, quis luctus nisi nisl sed orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tempus puet rutrum ultrces. Cras pretium pretium odio aliquam tortor interduma. Morbi commodo egestas mauris, et porttitor ipsum iaculis fermentum. Phasellus ante nibh, posuere gravida odio cursus risus. </p>
                            <div class="post-share">
                                <ul class="social-links">
                                    <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <a href="#comment-sec" title="">Write A Comment <i class="la la-arrow-right"></i></a>
                            </div><!--post-share end-->
                            <div class="cm-info-sec">
                                <div class="cm-img">
                                    <img src="images/cm-img.png" alt="">
                                </div><!--author-img end-->
                                <div class="cm-info">
                                    <h3>Mohammed El-Mazen</h3>
                                    <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                    <ul class="social-links">
                                        <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" title=""><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div><!--cm-info-sec end-->
                        </div><!--blog-single-post end-->
                        <div class="comment-section">
                            <h3 class="p-title">Comments</h3>
                            <ul>
                                <li>
                                    <div class="cm-info-sec">
                                        <div class="cm-img">
                                            <img src="images/cm-img.png" alt="">
                                        </div><!--author-img end-->
                                        <div class="cm-info">
                                            <h3>Mohammed El-Mazen</h3>
                                            <h4>April 25, 2019</h4>
                                        </div>
                                    </div><!--cm-info-sec end-->
                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                    <a href="#" title="" class="cm-reply">Reply</a>
                                </li>
                                <li>
                                    <div class="cm-info-sec">
                                        <div class="cm-img">
                                            <img src="images/cm-img.png" alt="">
                                        </div><!--author-img end-->
                                        <div class="cm-info">
                                            <h3>Mohammed El-Mazen</h3>
                                            <h4>April 25, 2019</h4>
                                        </div>
                                    </div><!--cm-info-sec end-->
                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                    <a href="#" title="" class="cm-reply">Reply</a>
                                </li>
                                <li>
                                    <div class="cm-info-sec">
                                        <div class="cm-img">
                                            <img src="images/cm-img.png" alt="">
                                        </div><!--author-img end-->
                                        <div class="cm-info">
                                            <h3>Mohammed El-Mazen</h3>
                                            <h4>April 25, 2019</h4>
                                        </div>
                                    </div><!--cm-info-sec end-->
                                    <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                    <a href="#" title="" class="cm-reply">Reply</a>
                                </li>
                            </ul>
                        </div><!--comment-section end-->
                        <div class="post-comment-sec" id="comment-sec">
                            <h3 class="p-title">Leave a reply</h3>
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
                                </div>
                            </form>
                        </div><!--post-comment-sec end-->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar pl-15">
                            <div class="widget widget-search">
                                <form>
                                    <input type="text" name="search" placeholder="Search here ...">
                                    <button type="submit"><i class="la la-search"></i></button>
                                </form>
                            </div><!--widget-search end-->
                            <div class="widget widget-catgs">
                                <h3 class="widget-title">Categories</h3>
                                <ul>
                                    <li>
                                        <a href="#" title=""><i class="la la-angle-right"></i><span>Apartments</span></a>
                                        <span>7</span>
                                    </li>
                                    <li>
                                        <a href="#" title=""><i class="la la-angle-right"></i><span>Doctors</span></a>
                                        <span>15</span>
                                    </li>
                                    <li>
                                        <a href="#" title=""><i class="la la-angle-right"></i><span>Medicine</span></a>
                                        <span>4</span>
                                    </li>
                                    <li>
                                        <a href="#" title=""><i class="la la-angle-right"></i><span>Location</span></a>
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
                                                    <img src="images/p-img1.png" alt="">
                                                </a>
                                            </div><!--ps-img end-->
                                            <div class="ps-info">
                                                <h3><a href="blog_open.html" title="">Traditional Apartments</a></h3>
                                                <span><i class="la la-calendar"></i>April 25, 2019</span>
                                            </div><!--ps-info end-->
                                        </div><!--wd-posts end-->
                                    </li>
                                    <li>
                                        <div class="wd-posts">
                                            <div class="ps-img">
                                                <a href="blog_open.html" title="">
                                                    <img src="images/p-img2.png" alt="">
                                                </a>
                                            </div><!--ps-img end-->
                                            <div class="ps-info">
                                                <h3><a href="blog_open.html" title="">Luxury Home</a></h3>
                                                <span><i class="la la-calendar"></i>April 25, 2019</span>
                                            </div><!--ps-info end-->
                                        </div><!--wd-posts end-->
                                    </li>
                                    <li>
                                        <div class="wd-posts">
                                            <div class="ps-img">
                                                <a href="blog_open.html" title="">
                                                    <img src="images/p-img3.png" alt="">
                                                </a>
                                            </div><!--ps-img end-->
                                            <div class="ps-info">
                                                <h3><a href="blog_open.html" title="">Medical Industry</a></h3>
                                                <span><i class="la la-calendar"></i>April 25, 2019</span>
                                            </div><!--ps-info end-->
                                        </div><!--wd-posts end-->
                                    </li>
                                </ul>
                            </div><!--widget-posts end-->
                            <div class="widget widget-adver">
                                <a href="#" title="">
                                    <img src="images/apart-img.jpg" alt="">
                                </a>
                            </div><!--widget-adver end-->
                            <div class="widget widget-tags">
                                <h3 class="widget-title">Popular Tags</h3>
                                <ul>
                                    <li><a href="#" title="">Medical</a></li>
                                    <li><a href="#" title="">Doctors</a></li>
                                    <li><a href="#" title="">Medicine</a></li>
                                    <li><a href="#" title="">Apartment</a></li>
                                    <li><a href="#" title="">Houzez</a></li>
                                    <li><a href="#" title="">Location</a></li>
                                    <li><a href="#" title="">Alignment</a></li>
                                    <li><a href="#" title="">Blog</a></li>
                                    <li><a href="#" title="">Doctors Development</a></li>
                                </ul>
                            </div><!--widget-tags end-->
                        </div><!--sidebar end-->
                    </div>
                </div>
            </div><!--blog-single-details end-->
        </div>
    </section><!--blog-single-sec end-->
    @elseif(Config::get('app.locale') == 'en')
    <section class="blog-single-sec section-padding">
            <div class="container">
                <div class="blog-single-details">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-single-post single">
                                <ul class="post-nfo">
                                    <li><i class="la la-calendar"></i>{{(new DateTime($post->updated_at))->format('M')}} {{(new DateTime($post->updated_at))->format('j')}}, {{(new DateTime($post->updated_at))->format('Y')}}</li>
                                    <li><i class="la la-comment-o"></i><a href="#" title="">4 Comments</a></li>
                                    <li><i class="la la-bookmark-o"></i><a href="#" title="">Apartments</a></li>
                                </ul>
                                <h3>{{$post->title_en}}</h3>
                                <div class="blog-img">
                                    <img src="{{asset('storage/uploads/post/'.$post->image)}}" alt="">
                                </div><!--blog-img end-->
                                {!! html_entity_decode($post->content_en) !!}
                                <div class="post-share">
                                    <ul class="social-links a2a_kit a2a_kit_size_32 a2a_default_style"> 
                                        <script async src="https://static.addtoany.com/menu/page.js"></script> 
                                        <li> <a class="a2a_button_facebook"> <i class="fa fa-facebook"></i> </a></li>
                                        <li> <a class="a2a_button_twitter"> <i class="fa fa-twitter"></i> </a></li>
                                        <li> <a class="a2a_button_google_plus"> <i class="fa fa-google-plus"></i> </a></li>
                                        <li> <a class="a2a_dd" href="https://www.addtoany.com/share"> <i class="fa fa-plus-square"></i> </a></li>
                                    </ul>
                                    <a href="#comment-sec" title="">Write A Comment <i class="la la-arrow-right"></i></a>
                                </div><!--post-share end-->
                                <div class="cm-info-sec">
                                    <div class="cm-img">
                                        <img src="{{asset('vendors/site/EN/images/cm-img.png')}}" alt="">
                                    </div><!--author-img end-->
                                    <div class="cm-info">
                                        <h3>Mohammed El-Mazen</h3>
                                        <p>Etiam euismod iaculis urna vel venenatis. Morbi rutrum commodo enim. Vivamus tinci dunt leo vel arcu elnd euismodtis purus in, pulvinar tellus nisl aliquam pretium ac.</p>
                                        <ul class="social-links">
                                            <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" title=""><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div><!--cm-info-sec end-->
                            </div><!--blog-single-post end-->
                            <div class="comment-section">
                                <h3 class="p-title">Comments</h3>
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
                                        </div><!--cm-info-sec end-->
                                        <p>Nam placerat facilisis placerat. Morbi elit nibh, auctor sit amet sodales id, porttitor eu quam. Aenean dui libero, laoreet quis con sequat vitae, posuere ut sapien. Etiam pharetra nulla vel diam eleifend, eu placerat nunc molestie. </p>
                                        <a href="#" title="" class="cm-reply">Reply</a>
                                    </li>
                                </ul>
                            </div><!--comment-section end-->
                            <div class="post-comment-sec" id="comment-sec">
                                <h3 class="p-title">Leave a reply</h3>
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
                                    </div>
                                </form>
                            </div><!--post-comment-sec end-->
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar pl-15">
                                <div class="widget widget-search">
                                    <form>
                                        <input type="text" name="search" placeholder="Search here ...">
                                        <button type="submit"><i class="la la-search"></i></button>
                                    </form>
                                </div><!--widget-search end-->
                                <div class="widget widget-catgs">
                                    <h3 class="widget-title">Categories</h3>
                                    <ul>
                                        @foreach($cats as $c)
                                        <li>
                                            <a href="{{ route('site.cat' , ['id' => $c->cat_id]) }}" title=""><i class="la la-angle-right"></i><span>{{$c->name_en}}</span></a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div><!--widget-catgs end-->
                                <div class="widget widget-posts">
                                    <h3 class="widget-title">Popular Posts</h3>
                                    <ul>
                                        @foreach($posts as $p)
                                        @if($loop->index <= 3)
                                        <li>
                                            <div class="wd-posts">
                                                <div class="ps-img">
                                                    <a href="{{ route('site.post' , ['id' => $post->id]) }}" title="">
                                                        <img src="{{asset('storage/uploads/post/'.$p->image)}}" style="max-width: 150px;">
                                                    </a>
                                                </div><!--ps-img end-->
                                                <div class="ps-info">
                                                    <h3><a href="{{ route('site.post' , ['id' => $post->id]) }}" title="">{{$p->title_en}}</a></h3>
                                                    <span><i class="la la-calendar"></i>{{(new DateTime($p->updated_at))->format('M')}} {{(new DateTime($p->updated_at))->format('j')}}, {{(new DateTime($p->updated_at))->format('Y')}}</span>
                                                </div><!--ps-info end-->
                                            </div><!--wd-posts end-->
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div><!--widget-posts end-->
                                <div class="widget widget-adver">
                                    <a href="#" title="">
                                        <img src="{{asset('vendors/site/EN/images/apart-img.jpg')}}" alt="">
                                    </a>
                                </div><!--widget-adver end-->
                                <div class="widget widget-tags">
                                    <h3 class="widget-title">Popular Tags</h3>
                                    <ul>
                                        @foreach($cats as $c)
                                        <li><a href="{{ route('site.cat' , ['id' => $c->cat_id]) }}" title="">{{$c->name_en}}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!--widget-tags end-->
                            </div><!--sidebar end-->
                        </div>
                    </div>
                </div><!--blog-single-details end-->
            </div>
        </section><!--blog-single-sec end-->
    @endif
@endsection
@include('site.pages.post.scripts')