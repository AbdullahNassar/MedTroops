<!DOCTYPE html>
<html>
  <head>
    <!-- Meta Tags -->
    @yield('mata')
    <!-- Site Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('vendors/img/favicon.png')}}">
    @yield('styles')
  </head>

  <body>
        @include('admin.layouts.sidebar')
        @include('admin.layouts.header')
        @include('admin.layouts.sideright')
        <div class="br-mainpanel @if(Route::currentRouteName()=='admin.profile') br-profile-page @endif">
          @yield('content')
          @include('admin.layouts.footer')
        </div>
      @yield('scripts')
  </body>

</html>