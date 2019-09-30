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
                @if(Config::get('app.locale') == 'ar')
                <div class="col-xl-5 col-sm-6 col-md-5">
                    <div class="bottom-logo">
                        <img src="{{asset('vendors/site/EN/images/logo2.png')}}" alt="" class="img-fluid">
                        <p>{{$data->get('footer_ar')}}</p>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-md-2">
                    <div class="bottom-list">
                        <h3>روابط مختصرة</h3>
                        <ul>
                            <li><a href="{{route('site.home')}}" title="">الرئيسية</a></li>
                            <li><a href="{{route('site.about')}}" title="">من نحن</a></li>
                            <li><a href="{{route('site.bedoctor')}}" title="">كن دكتور</a></li>
                            <li><a href="{{route('site.departments')}}" title="">الأقسام</a></li>
                        </ul>
                    </div><!--bottom-list end-->
                </div>
                <div class="col-xl-2 col-sm-6 col-md-2">
                    <div class="bottom-list">
                        <h3>روابط مختصرة</h3>
                        <ul>
                            <li><a href="{{route('site.blog')}}" title="">المدونة</a></li>
                            @if (Auth::guard('members')->check())
                                @if(Auth::guard('members')->user()->type == "doctor")
                                <li><a href="{{route('site.doctorprofile', ['id' => Auth::guard('members')->user()->user_id])}}" title="">الصفحة الشخصية</a></li>
                                @elseif(Auth::guard('members')->user()->type == "patient")
                                <li><a href="{{route('site.patientprofile', ['id' => Auth::guard('members')->user()->user_id])}}" title="">الصفحة الشخصية</a></li>
                                @endif
                            @endif
                            <li><a href="{{route('site.services')}}" title="">الخدمات</a></li>
                            <li><a href="{{route('site.contact')}}" title="">اتصل بنا</a></li>
                        </ul>
                    </div><!--bottom-list end-->
                </div>
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-xl-4 col-sm-6 col-md-4">
                        <div class="bottom-logo">
                            <img src="{{asset('vendors/site/EN/images/logo2.png')}}" alt="" class="img-fluid">
                            <p>{{$data->get('footer_en')}}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-3">
                        <div class="bottom-list">
                            <h3>Helpful Links</h3>
                            <ul>
                                <li><a href="{{route('site.home')}}" title="">Home</a></li>
                                <li><a href="{{route('site.about')}}" title="">About Us</a></li>
                                <li><a href="{{route('site.bedoctor')}}" title="">Be Doctor</a></li>
                                <li><a href="{{route('site.departments')}}" title="">Departments</a></li>
                            </ul>
                        </div><!--bottom-list end-->
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-3">
                        <div class="bottom-list">
                            <h3>Helpful Links</h3>
                            <ul>
                                <li><a href="{{route('site.blog')}}" title="">Blog</a></li>
                                @if (Auth::guard('members')->check())
                                @if(Auth::guard('members')->user()->type == "doctor")
                                <li><a href="{{route('site.doctorprofile', ['id' => Auth::guard('members')->user()->user_id])}}" title="">Profile</a></li>
                                @elseif(Auth::guard('members')->user()->type == "patient")
                                <li><a href="{{route('site.patientprofile', ['id' => Auth::guard('members')->user()->user_id])}}" title="">Profile</a></li>
                                @endif
                                @endif
                                <li><a href="{{route('site.services')}}" title="">Services</a></li>
                                <li><a href="{{route('site.contact')}}" title="">Contact Us</a></li>
                            </ul>
                        </div><!--bottom-list end-->
                    </div>
                @endif
                <div class="col-xl-2 col-sm-6 col-md-2">
                    <div class="bottom-list">
                        <h3>Helpful Links</h3>
                        <ul class="mobile-apps">
                            <li><a href="{{$data->get('ios')}}"><img src="{{asset('vendors/site/EN/images/footer-appstore.svg')}}" class="img-responsive" alt=""></a></li>
                            <li><a href="{{$data->get('android')}}"><img src="{{asset('vendors/site/EN/images/footer-playstore.svg')}}" class="img-responsive" alt=""></a></li>
                        </ul>
                    </div><!--bottom-list end-->
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="footer-content">
                        <div class="row justify-content-between">
                            <div class="col-xl-6 col-md-6">
                                <div class="copyright">
                                    @if(Config::get('app.locale') == 'en')
                                        <p>&copy; All rights reserved 2019, Med Troops.</p>
                                    @elseif(Config::get('app.locale') == 'ar')
                                        <p>&copy; كل الحقوق محفوظة 2019, Med Troops.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="footer-social">
                                    <a href="{{$contact->get('facebook')}}"><i class="fa fa-facebook"></i></a>
                                    <a href="{{$contact->get('twitter')}}"><i class="fa fa-twitter"></i></a>
                                    <a href="{{$contact->get('instagram')}}"><i class="fa fa-instagram"></i></a>
                                    <a href="{{$contact->get('linkedin')}}"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!--footer end-->
    @if (!Auth::guard('members')->check())
    @if(Config::get('app.locale') == 'ar')
    <!--SignUp Popup-->
    <div class="signup_wrapper">
        <div class="signup_inner">
            <div class="signup_details">
                <div class="site_logo">
                    <a href="{{route('site.home')}}"> <img src="{{asset('vendors/site/EN/images/logo_white.png')}}" height="100" alt="image"></a>
                </div>
                <h3>مرحبا بكم!</h3>
                <p>خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد</p>
                <a href="javascript:;" class="btn2 white pop_signin">sign in</a>
                <ul>
                    <li><a href="javascript:;"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                    <li><a href="javascript:;"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
                    <li><a href="javascript:;"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
                    <li><a href="javascript:;"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
                </ul>
            </div>
            <div class="signup_form_section">
                <h4>تسجيل حساب جديد</h4>
                <img src="{{asset('vendors/site/EN/images/clv_underline.png')}}" alt="image">
                <form method="post" action="{{route('site.register')}}">
                    <div class="form_field">
                        <select class="form-control" name="type" required>
                            <option>نوع المستخدم</option>
                            <option value="doctor">دكتور</option>
                            <option value="patient">مريض</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <input type="text" name="username" placeholder="اسم المستخدم" required>
                    </div>
                    <div class="form-field">
                        <input type="text" name="password" placeholder="كلمة السر" required>
                    </div>
                    <div class="form-field">
                        <input type="email" name="email" placeholder="البريد الالكترونى" required>
                    </div>
                    <button type="submit" class="btn2">سجل حساب جديد</button>
                </form>
                <span class="success_close">
                    
                    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                    <g>
                        <path fill="#0f89d1" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                        c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                        l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                        c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                    </g>
                    </svg>
                </span>
            </div>
        </div>
    </div>
    <!--SignIn Popup-->
    <div class="signin_wrapper">
        <div class="signup_inner">
            <div class="signup_details">
                <div class="site_logo">
                    <a href="{{route('site.home')}}"> <img src="{{asset('vendors/site/EN/images/logo_white.png')}}" height="100" alt="image"></a>
                </div>
                <h3>مرحبا بكم!</h3>
                <p>خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد</p>
                <a href="javascript:;" class="btn2 white pop_signup">sign up</a>
                <ul>
                    <li><a href="javascript:;"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                    <li><a href="javascript:;"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
                    <li><a href="javascript:;"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
                    <li><a href="javascript:;"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
                </ul>
            </div>
            <div class="signup_form_section">
                <h4>تسجيل الدخول</h4>
                <img src="{{asset('vendors/site/EN/images/clv_underline.png')}}" alt="image">
                <form action="{{ route('site.login') }}" method="post">
                    <div class="form-field">
                        <input type="text" name="username" placeholder="اسم المستخدم" required>
                    </div>
                    <div class="form-field">
                        <input type="text" name="password" placeholder="كلمة السر" required>
                    </div>
                    <div class="form-cp">
                        <div class="form-field">
                            <div class="input-field">
                                <input type="checkbox" name="ccc" id="cc1">
                                <label for="cc1">
                                    <span></span>
                                    <small>تذكرنى</small>
                                </label>
                            </div>
                        </div>
                        <a href="#" title="">هل نسيت كلمة المرور؟</a>
                    </div><!--form-cp end-->
                    <button type="submit" class="btn2">سجل الدخول</button>
                </form>
                <div class="social_button_section">
                    <div class="alerts-success" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">تم تسجيل الدخول بنجاح</span></div>
                    <div class="alerts-danger" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">حدث خطأ , يرجى اعادة المحاولة</span></div>
                </div>
                <span class="success_close">
                    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                    <g>
                        <path fill="#0f89d1" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                        c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                        l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                        c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                    </g>
                    </svg>
                </span>
            </div>
            @elseif(Config::get('app.locale') == 'en')
            <!--SignUp Popup-->
            <div class="signup_wrapper">
            <div class="signup_inner">
                <div class="signup_details">
                    <div class="site_logo">
                        <a href="{{route('site.home')}}"> <img src="{{asset('vendors/site/EN/images/logo_white.png')}}" height="100" alt="image"></a>
                    </div>
                    <h3>welcome to Med troops!</h3>
                    <p>Consectetur adipisicing elit sed do eiusmod por incididunt uttelabore et dolore magna aliqu.</p>
                    <a href="javascript:;" class="btn2 white pop_signin">sign in</a>
                    <ul>
                        <li><a href="javascript:;"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                        <li><a href="javascript:;"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
                        <li><a href="javascript:;"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
                        <li><a href="javascript:;"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
                    </ul>
                </div>
                <div class="signup_form_section">
                    <h4>create account</h4>
                    <img src="{{asset('vendors/site/EN/images/clv_underline.png')}}" alt="image">
                    <form method="post" action="{{route('site.register')}}">
                        <div class="form_field">
                            <select class="form-control" name="type" required>
                                <option>User Type</option>
                                <option value="doctor">Doctor</option>
                                <option value="patient">Patient</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <input type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-field">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-field">
                            <input type="text" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-cp">
                            <div class="form-field">
                                <div class="input-field">
                                    <input type="checkbox" name="ccc" id="cc2">
                                    <label for="cc2">
                                        <span></span>
                                        <small>I agree with terms</small>
                                    </label>
                                </div>
                            </div>
                            <a href="#" title="" class="signin-op">Have an account?</a>
                        </div><!--form-cp end-->
                        <button type="submit" class="btn2">Register</button>
                    </form>
                    <span class="success_close">
                        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                        <g>
                            <path fill="#0f89d1" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                            c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                            l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                            c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                        </g>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <!--SignIn Popup-->
        <div class="signin_wrapper">
            <div class="signup_inner">
                <div class="signup_details">
                    <div class="site_logo">
                        <a href="{{route('site.home')}}"> <img src="{{asset('vendors/site/EN/images/logo_white.png')}}" height="100" alt="image"></a>
                    </div>
                    <h3>welcome to Med Troops!</h3>
                    <p>Consectetur adipisicing elit sed do eiusmod por incididunt uttelabore et dolore magna aliqu.</p>
                    <a href="javascript:;" class="btn2 white pop_signup">sign up</a>
                    <ul>
                        <li><a href="javascript:;"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                        <li><a href="javascript:;"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
                        <li><a href="javascript:;"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
                        <li><a href="javascript:;"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a></li>
                    </ul>
                </div>
                <div class="signup_form_section">
                    <h4>sign in account</h4>
                    <img src="{{asset('vendors/site/EN/images/clv_underline.png')}}" alt="image">
                    <form class="login-form" action="{{ route('site.login') }}" method="post">
                            {{ csrf_field() }}
                        <div class="form-field">
                            <input type="text" name="username" placeholder="Username" class="user">
                        </div>
                        <div class="form-field">
                            <input type="password" name="password" placeholder="Password" class="pass">
                        </div>
                        <div class="form-cp">
                            <div class="form-field">
                                <div class="input-field">
                                    <input type="checkbox" name="ccc" id="cc1">
                                    <label for="cc1">
                                        <span></span>
                                        <small>Remember me</small>
                                    </label>
                                </div>
                            </div>
                            <a href="#" title="">Forgot Password?</a>
                        </div><!--form-cp end-->
                        <button type="submit" class="btn2">Sign In</button>
                    </form>
                    <div class="social_button_section">
                        <div class="alerts-success" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">Now you are logged in!</span></div>
                        <div class="alerts-danger" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">Error, please enter valid information</span></div>
                    </div>
                    <span class="success_close">
                        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;" xml:space="preserve" width="11px" height="11px" >
                        <g>
                            <path fill="#0f89d1" style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
                            c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
                            l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
                            c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
                        </g>
                        </svg>
                    </span>
                </div>
            @endif
        </div>
    </div>
    <div class="profile_toggle"><a href="javascript:;"><img src="{{asset('vendors/site/EN/images/login.gif')}}" alt=""></a></div>
    @endif