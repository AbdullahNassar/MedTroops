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
    <div class="wrapper">
      @include('site.layouts.header')
      @yield('content')
      @include('site.layouts.footer')
    </div>
      @yield('scripts')
      <script src="{{asset('vendors/login/js/jquery.validate.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('vendors/login/js/login.js')}}" type="text/javascript"></script>
  </body>

</html>