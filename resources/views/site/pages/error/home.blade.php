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
                    <form class="appoinment-form left2">
                        <h3><i class="fa fa-user-md"></i> Registration</h3>
                        <div class="form_field full">
                            <div class="form-group">
                                <div class="drop-menu">
                                    <div class="select">
                                        <span>Doctor</span>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <input type="hidden" name="gender">
                                    <ul class="dropeddown">
                                        <li>Doctor</li>
                                        <li>Physiotherapist</li>
                                        <li>Nurse</li>
                                        <li>Patient</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                                                    
                        <div class="form_field half">
                            <input type="text" class="form-control" placeholder="Enter Email Address">
                        </div>
                                                        
                        <div class="form_field half">
                            <input type="text" class="form-control" placeholder="Enter Mobile">
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 no-padding">
                            <input type="checkbox"><span>I agree with terms</span>							
                            <button type="submit" id="btn_submit" class="btn-submit pull-right">
                            <img src="{{asset('vendors/site/EN/images/heart-sm.png')}}" alt="heart-sm">Register</button>
                        </div>
                    </form>
                </div>
                
                <div class="col-md-6 col-sm-6  widget-property-search pl-40">
                    <form class="appoinment-form">
                        <h3><i class="fa fa-search"></i> Search for Doctor</h3>

                        <div class="form_field full">
                            <input type="text" class="form-control" placeholder="Enter Address, City or State">
                        </div>		

                        <div class="form_field third">
                            <div class="form-group">
                                <div class="drop-menu">
                                    <div class="select">
                                        <span>Any Type</span>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <input type="hidden" name="gender">
                                    <ul class="dropeddown">
                                        <li>For Booking</li>
                                        <li>For Urgent</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form_field third">
                            <div class="form-group">
                                <div class="drop-menu">
                                    <div class="select">
                                        <span>Specialization</span>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <input type="hidden" name="gender">
                                    <ul class="dropeddown">
                                        <li>Specialization</li>
                                        <li>Cardiology</li>
                                        <li>Gastroenterology</li>
                                        <li>Pulmonology</li>
                                        <li>Ophthalmology</li>
                                        <li>Gynecology</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form_field third">
                            <div class="form-group">
                                <div class="drop-menu">
                                    <div class="select">
                                        <span>Doctor Name</span>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <input type="hidden" name="gender">
                                    <ul class="dropeddown">
                                        <li>Mr.XYZ</li>
                                        <li>Mr.ABC</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                                                                            
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 no-padding">
                            <input type="checkbox"><span>Advanced Search</span>							
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
                    <div class="section-header">
                        <h3>Centres of Excellence</h3>
                        <p>The best clinical talent and skills</p>
                    </div>
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
                        <a href="#" title="" class="btn2">Download Now <i class="fa fa-android"></i></a>
                    </div><!--support-info end-->
                </div>
                <div class="col-xl-3">
                    <div class="support-info">
                        <a href="#" title="" class="btn2">Download Now <i class="fa fa-apple"></i></a>
                    </div><!--support-info end-->
                </div>
            </div>
        </div>
    </section>


    <section class="bottom section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <form action="#" class="row banner-search">
                        <div class="form_field newsletters">
                            <input type="text" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form_field srch-btn">
                            <a href="#" class="btn btn-outline-primary ">
                                <span>Subscribe</span> <i class="la la-send"></i>  
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="bottom-logo">
                        <img src="{{asset('vendors/site/EN/images/logo2.png')}}" alt="" class="img-fluid">
                        <p>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-2">
                    <div class="bottom-list">
                        <h3>Helpful Links</h3>
                        <ul>
                            <li><a href="index.html" title="">Home</a></li>
                            <li><a href="about.html" title="">About Us</a></li>
                            <li><a href="be-doctor.html" title="">Be Doctor</a></li>
                            <li><a href="departments.html" title="">Departments</a></li>
                        </ul>
                    </div><!--bottom-list end-->
                </div>
                <div class="col-xl-2 col-sm-6 col-md-2">
                    <div class="bottom-list">
                        <h3>Helpful Links</h3>
                        <ul>
                            <li><a href="blog.html" title="">Blog</a></li>
                            <li><a href="blog-details.html" title="">Blog Details</a></li>
                            <li><a href="services.html" title="">Services</a></li>
                            <li><a href="contact.html" title="">Contact Us</a></li>
                        </ul>
                    </div><!--bottom-list end-->
                </div>
                <div class="col-xl-2 col-sm-6 col-md-2">
                    <div class="bottom-list">
                        <h3>Helpful Links</h3>
                        <ul>
                            <li><a href="search-result.html" title="">Search Result</a></li>
                            <li><a href="Single.html" title="">Doctor Profile</a></li>
                            <li><a href="profile.html" title="">User Profile</a></li>
                            <li><a href="faq.html" title="">FAQ</a></li>
                        </ul>
                    </div><!--bottom-list end-->
                </div>
                <div class="col-xl-2 col-sm-6 col-md-2">
                    <div class="bottom-list">
                        <h3>Helpful Links</h3>
                        <ul class="mobile-apps">
                            <li><a href="#"><img src="{{asset('vendors/site/EN/images/footer-appstore.svg')}}" class="img-responsive" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('vendors/site/EN/images/footer-playstore.svg')}}" class="img-responsive" alt=""></a></li>
                        </ul>
                    </div><!--bottom-list end-->
                </div>
            </div>
        </div>
    </section>
@endsection
@include('site.pages.error.scripts')