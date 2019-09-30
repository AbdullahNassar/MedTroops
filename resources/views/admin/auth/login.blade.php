<!DOCTYPE>
<html>
<head>
	<title>MedTroops Admin</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="{{asset('vendors/login/img/favicon.png')}}" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('vendors/login/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('vendors/login/css/style.css')}}"/>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>


	<!-- Audio 
	<div class="play active" id="btn1"></div>
    <audio id="sound1" autoplay loop><source src="{{asset('vendors/login/piano.mp3')}}"></audio>-->
	
    
	<!--====== Header Section Start ======
    <div class="logo">
        <img src="{{asset('vendors/login/img/logo.png')}}" alt="">
    </div>
    
    <div class="copyright">
        <p>Designed & Developed By <img src="{{asset('vendors/login/img/elmeya.png')}}" alt=""> <a href="#">elmeyasoft</a></p>
    </div>-->


	<!-- ==== Intro Section Start ==== -->
	<section class="intro-section fix" id="home">
		<div class="intro-bg bg-cms"></div>
		<div class="intro-inner">
			<div class="intro-content">
				<div id="round"></div>
                <div id="login-box2">
                    <div class="profile-img">
                        <img src="{{asset('vendors/img/avatar.png')}}" alt="">
                    </div>
                    <h2><span class="element"></span></h2>
                    <form class="login-form" action="{{ route('admin.login') }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit"><span class="entypo-lock submit"></span></button>
                        <span class="entypo-user inputUserIcon"></span>
                        <input type="text" class="user" placeholder="ursername" name="username">
                        <span class="entypo-key inputPassIcon"></span>
                        <input type="password" class="pass" placeholder="password" name="password">
                        <div class="alerts-success" style="display: none; color: #ffffff;"><span style="color: #ffffff;" class="element2" role="alert">Now you are logged in!</span></div>
                        <div class="alerts-danger" style="display: none; color: #ffffff;"><span style="color: #ffffff;" class="element2" role="alert">Error, please enter valid information</span></div>
                    </form>
                </div><!-- login-box -->
			</div>
		</div>
	</section>
	<!-- ==== Intro Section End ==== -->



	<!--====== Javascripts & Jquery ======-->	
    
    <script src="{{asset('vendors/login/js/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendors/login/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendors/login/js/jquery.validate.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('vendors/login/js/plugin.js')}}" type="text/javascript"></script>
    <script src="{{asset('vendors/login/js/login.js')}}" type="text/javascript"></script>
	<script src="{{asset('vendors/login/js/main.js')}}" type="text/javascript"></script>
</body>
</html>
