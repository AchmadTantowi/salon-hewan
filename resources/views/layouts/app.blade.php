<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Happy Pet</title>
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    @yield('css')
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<style>
	.dropbtn {
		/* background-color: #4CAF50; */
		color: grey;
		padding: 10px;
		font-size: 14px;
		border: none;
		cursor: pointer;
	}
	
	.dropdown {
		position: relative;
		display: inline-block;
	}
	
	.dropdown-content {
		display: none;
		position: absolute;
		right: 0;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}
	
	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}
	
	.dropdown-content a:hover {background-color: #FE980F;}
	
	.dropdown:hover .dropdown-content {
		display: block;
	}
	
	.dropdown:hover .dropbtn {
		/* background-color: #FE980F; */
	}
</style>
<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/images/home/logo.png') }}" width="139px" height="39" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if(Auth::check())
									@if (Auth::user()->verified == 0)
									<li><a href="{{ url('/unverified') }}">Order</a></li>
									<li><a href="{{ url('/unverified') }}">Cart</a></li>
									<li><a href="{{ url('/unverified') }}">Payment Confirmation</a></li>
									<li><a href="{{ url('/unverified') }}">Testimoni</a></li>
									@else
									<div class="dropdown" style="float:left;">
										<button class="dropbtn">{{ Auth::user()->name }} <span class="caret"></span></button>
										<div class="dropdown-content">
											<a href="{{ url('/edit-profile') }}">Edit Profile</a>
											<a href="{{ url('change-password') }}">Change Password</a>
										</div>	
									</div>
									<li><a href="{{ url('/order') }}">Order</a></li>
									<li><a href="{{ url('/cart') }}">Cart</a></li>
									<li><a href="{{ url('/payment-confirmation') }}">Payment Confirmation</a></li>
									<li><a href="{{ url('/testimoni') }}">Testimoni</a></li>
									@endif
									<li><a href="{{ url('/logout') }}">Logout</a></li>
								@endif
								@if(!Auth::check())
									<li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ url('/') }}" {{ (Request::is('/') ? 'class=active' : '') }}>Home</a></li>
								<li><a href="{{ url('/contact') }}" {{ (Request::is('contact') ? 'class=active' : '') }}>Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	@include('sweetalert::alert')
    @yield('content')
	
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 Happy Pet. All rights reserved.</p>
				</div>
			</div>
		</div>
    </footer><!--/Footer-->
    
    <script src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @yield('script')
</body>
</html>