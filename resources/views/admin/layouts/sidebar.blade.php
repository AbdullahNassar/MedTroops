<div class="br-logo"><a href=""><span>[</span>Med Troops<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
      <div class="br-sideleft-menu">
        <a href="{{route('admin.home')}}" class="br-menu-link @if(Route::currentRouteName()=='admin.home') active @endif">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="{{route('doctor.get')}}" class="br-menu-link @if(Route::currentRouteName()=='doctor.get') active @endif">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
              <span class="menu-item-label">Doctors</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="{{route('area.get')}}" class="br-menu-link @if(Route::currentRouteName()=='area.get') active @endif">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
            <span class="menu-item-label">Doctor Areas</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="{{route('patient.get')}}" class="br-menu-link @if(Route::currentRouteName()=='patient.get') active @endif">
            <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
              <span class="menu-item-label">Patients</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="{{route('slider.get')}}" class="br-menu-link @if(Route::currentRouteName()=='slider.get') active @endif">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Sliders</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="{{route('special.get')}}" class="br-menu-link @if(Route::currentRouteName()=='special.get') active @endif">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
            <span class="menu-item-label">Specialities</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="{{route('service.get')}}" class="br-menu-link @if(Route::currentRouteName()=='service.get') active @endif">
          <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Services</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="{{route('user.get')}}" class="br-menu-link @if(Route::currentRouteName()=='user.get') active @endif">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Users</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="#" class="br-menu-link @if(Route::currentRouteName()=='post.get' || Route::currentRouteName()=='cat.get') active show-sub @endif">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-book-outline tx-22"></i>
            <span class="menu-item-label">Blog</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('post.get')}}" class="nav-link @if(Route::currentRouteName()=='post.get') active @endif">Posts</a></li>
          <li class="nav-item"><a href="{{route('cat.get')}}" class="nav-link @if(Route::currentRouteName()=='cat.get') active @endif">Categories</a></li>
        </ul>
        <a href="#" class="br-menu-link @if(Route::currentRouteName()=='static.get' || Route::currentRouteName()=='contact.get') active show-sub @endif">
          <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Settings</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('static.get')}}" class="nav-link @if(Route::currentRouteName()=='static.get') active @endif">Static Data</a></li>
          <li class="nav-item"><a href="{{route('contact.get')}}" class="nav-link @if(Route::currentRouteName()=='contact.get') active @endif">Contact Data</a></li>
        </ul>
      </div><!-- br-sideleft-menu -->

      <label class="sidebar-label pd-x-15 mg-t-25 mg-b-20 tx-info op-9">Information Summary</label>

      <div class="info-list">
        <div class="d-flex align-items-center justify-content-between pd-x-15">
          <div>
            <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Memory Usage</p>
            <h5 class="tx-lato tx-white tx-normal mg-b-0">32.3%</h5>
          </div>
          <span class="peity-bar" data-peity='{ "fill": ["#336490"], "height": 35, "width": 60 }'>8,6,5,9,8,4,9,3,5,9</span>
        </div><!-- d-flex -->

        <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
          <div>
            <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">CPU Usage</p>
            <h5 class="tx-lato tx-white tx-normal mg-b-0">140.05</h5>
          </div>
          <span class="peity-bar" data-peity='{ "fill": ["#1C7973"], "height": 35, "width": 60 }'>4,3,5,7,12,10,4,5,11,7</span>
        </div><!-- d-flex -->

        <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
          <div>
            <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Disk Usage</p>
            <h5 class="tx-lato tx-white tx-normal mg-b-0">82.02%</h5>
          </div>
          <span class="peity-bar" data-peity='{ "fill": ["#8E4246"], "height": 35, "width": 60 }'>1,2,1,3,2,10,4,12,7</span>
        </div><!-- d-flex -->

        <div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
          <div>
            <p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Daily Traffic</p>
            <h5 class="tx-lato tx-white tx-normal mg-b-0">62,201</h5>
          </div>
          <span class="peity-bar" data-peity='{ "fill": ["#9C7846"], "height": 35, "width": 60 }'>3,12,7,9,2,3,4,5,2</span>
        </div><!-- d-flex -->
      </div><!-- info-list -->

      <br>
    </div><!-- br-sideleft -->