<header>
  <div class="top-header">
      <div class="container">
          <div class="row justify-content-between">
              <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 d-none d-sm-block">
                  <div class="header-address">
                      <a href="#">
                            @if(Config::get('app.locale') == 'ar')
                                <span>{{$data->get('header_ar')}}</span>
                            @elseif(Config::get('app.locale') == 'en')
                                <span>{{$data->get('header_en')}}</span>
                            @endif
                      </a>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 d-none d-sm-block">
                  <div class="header-social">
                      <a href="{{$contact->get('facebook')}}"><i class="fa fa-facebook"></i></a>
                      <a href="{{$contact->get('twitter')}}"><i class="fa fa-twitter"></i></a>
                      <a href="{{$contact->get('instagram')}}"><i class="fa fa-instagram"></i></a>
                      <a href="{{$contact->get('linkedin')}}"><i class="fa fa-linkedin"></i></a>
                  </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="language-selector">
                      <div class="drop-menu">
                          <div class="select">
                              @if (Config::get('app.locale') == 'ar') 
                              <span><a href="{{route('site.lang','en')}}"><img src="{{asset('vendors/site/EN/images/us.png')}}" alt=""></a></span>
                              @elseif(Config::get('app.locale') == 'en')
                              <span><a href="{{route('site.lang','ar')}}"><img src="{{asset('vendors/site/EN/images/sa.png')}}" alt=""></a></span>
                              @endif
                              {{ csrf_field() }}
                          </div>
                      </div>
                  </div><!--language-selector end-->
                  @if (Auth::guard('members')->check())
                  <div class="notification-selector">
                      <div class="drop-menu">
                          <div class="select">
                              <span class="fa fa-bell-o"></span>
                              <span class="alert"></span>
                          </div>
                          <input type="hidden" name="gender">
                          <div class="dropeddown dropdown-menu-header wd-300 pd-0-force">
                              <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                                <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Notifications</label>
                                <a href="" class="tx-11">Mark All as Read</a>
                              </div><!-- d-flex -->
                
                              <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link read">
                                  <div class="media pd-x-20 pd-y-15">
                                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                    <div class="media-body">
                                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                      <span class="tx-12">October 03, 2019 8:45am</span>
                                    </div>
                                  </div><!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <a href="" class="media-list-link read">
                                  <div class="media pd-x-20 pd-y-15">
                                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                    <div class="media-body">
                                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                                      <span class="tx-12">October 02, 2019 12:44am</span>
                                    </div>
                                  </div><!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                  <div class="media pd-x-20 pd-y-15">
                                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                    <div class="media-body">
                                      <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                                      <span class="tx-12">October 01, 2019 10:20pm</span>
                                    </div>
                                  </div><!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                  <div class="media pd-x-20 pd-y-15">
                                    <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                    <div class="media-body">
                                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                      <span class="tx-12">October 01, 2019 6:08pm</span>
                                    </div>
                                  </div><!-- media -->
                                </a>
                                <div class="pd-y-10 tx-center bd-t">
                                  <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                                </div>
                              </div><!-- media-list -->
                            </div><!-- dropdown-menu -->
                      </div>
                  </div><!--language-selector end-->
                  @if(Config::get('app.locale') == 'ar')
                  <div class="user-selector">
                      <div class="drop-menu">
                          <div class="select">
                              @if(Auth::guard('members')->user()->type == "doctor")
                              <img src="{{asset('storage/uploads/doctor').'/'.Auth::guard('members')->user()->image}}" class="wd-32 rounded-circle" alt="">
                              @elseif(Auth::guard('members')->user()->type == "patient")
                              <img src="{{asset('storage/uploads/patient').'/'.Auth::guard('members')->user()->image}}" class="wd-32 rounded-circle" alt="">
                              @endif
                              <span class="logged-name">{{Auth::guard('members')->user()->name_ar}}</span>
                              <span class="alertsuccess"></span>
                          </div>
                          <input type="hidden" name="gender">
                          <ul class="dropeddown">
                              @if(Auth::guard('members')->user()->type == "doctor")
                              <li class="eng-select"><span class="fa fa-user"></span><a href="{{route('site.doctorprofile', ['id' => Auth::guard('members')->user()->user_id])}}"> الصفحة الشخصية</a></li>
                              @elseif(Auth::guard('members')->user()->type == "patient")
                              <li class="eng-select"><span class="fa fa-user"></span><a href="{{route('site.patientprofile', ['id' => Auth::guard('members')->user()->user_id])}}"> الصفحة الشخصية</a></li>
                              @endif
                              <li class="rtl-select"><span class="fa fa-credit-card-alt"></span> المحفظة</li>
                              <li class="rtl-select"><span class="fa fa-history"></span> الأرشيف</li>
                              <li class="rtl-select"><span class="fa fa-power-off"></span><a href="{{route('site.logout')}}"> تسجيل الخروج</a></li>
                          </ul>
                      </div>
                  </div><!--language-selector end-->
                  @elseif(Config::get('app.locale') == 'en')
                  <div class="user-selector">
                      <div class="drop-menu">
                          <div class="select">
                              @if(Auth::guard('members')->user()->type == "doctor")
                              <img src="{{asset('storage/uploads/doctor').'/'.Auth::guard('members')->user()->image}}" class="wd-32 rounded-circle" alt="">
                              @elseif(Auth::guard('members')->user()->type == "patient")
                              <img src="{{asset('storage/uploads/patient').'/'.Auth::guard('members')->user()->image}}" class="wd-32 rounded-circle" alt="">
                              @endif
                              <span class="logged-name">{{Auth::guard('members')->user()->name_en}}</span>
                              <span class="alertsuccess"></span>
                          </div>
                          <input type="hidden" name="gender">
                          <ul class="dropeddown">
                              @if(Auth::guard('members')->user()->type == "doctor")
                              <li class="eng-select"><span class="fa fa-user"></span><a href="{{route('site.doctorprofile', ['id' => Auth::guard('members')->user()->user_id])}}"> Profile</a></li>
                              @elseif(Auth::guard('members')->user()->type == "patient")
                              <li class="eng-select"><span class="fa fa-user"></span><a href="{{route('site.patientprofile', ['id' => Auth::guard('members')->user()->user_id])}}"> Profile</a></li>
                              @endif
                              <li class="switcher"><span class="fa fa-check-square-o"></span> Active
                                  <label class="switch">
                                      <input type="checkbox">
                                      <span class="slider"></span>
                                  </label>
                              </li>
                              <li><span class="fa fa-history"></span> History</li>
                              <li><span class="fa fa-power-off"></span><a href="{{route('site.logout')}}"> Sign Out</a></li>
                          </ul>
                      </div>
                  </div><!--language-selector end-->
                  @endif
                  @endif
              </div>
          </div>
      </div>
  </div>