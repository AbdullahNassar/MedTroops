<!DOCTYPE>
<html>
<head>
<title>خطأ 404</title>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
	<!-- Favicon -->   
	<link href="{{asset('assets/admin/login/img/favicon.ico')}}" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin/login/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('assets/admin/login/css/style.css')}}"/>


</head>
<body>



	<!-- ==== Intro Section Start ==== -->
	<section class="intro-section fix" id="home">
		<div class="intro-bg bg-cms"></div>
		<div class="intro-inner">
			<div class="intro-content">
				<div id="round"></div>
                <div id="lock-box2">
                  <div class="lockscreen-wrapper">
                    <div class="lockscreen-logo">
                      <a href="{{route('admin.home')}}"><img src="{{asset('assets/admin/login/img/logo.png')}}" alt=""></a>
                    </div>
				            <h3>خطأ 404 , هذه الصفحة غير متوفرة</h3>
                    <a class="element2" href="{{route('admin.home')}}">الرئيسية</a>
                  </div>
                </div><!-- login-box -->
			</div>
		</div>
	</section>
	<!-- ==== Intro Section End ==== -->



	<!--====== Javascripts & Jquery ======-->	
	<script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
	<script src="{{asset('assets/admin/login/js/plugin.js')}}"></script>
    <script src="{{asset('assets/admin/login/js/login.js')}}"></script>
	<script src="{{asset('assets/admin/login/js/main.js')}}"></script>
    <script src="{{asset('assets/admin/login/js/jquery.fullscreen.js')}}"></script>
    <script type="text/javascript">
    
    $(function() {
        $('#body').click(function() {
            $('body').fullscreen();
        })
    });
    </script>
</body>
</html>
