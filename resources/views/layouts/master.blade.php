
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="author" content="Jthemes"/>	
		<meta name="description" content="ImmiEx - Immigration and Visa Consulting Website Template"/>
		<meta name="keywords" content="Responsive, Jthemes, One Page, Landing, Business, Coaching, Consulting, Creative, Immigration, Visa">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				
  		<!-- SITE TITLE -->
		<title>ImmiEx - Immigration and Visa Consulting Website Template</title>
							
		<!-- FAVICON AND TOUCH ICONS  -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="apple-touch-icon.html" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 	
		<link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900&amp;display=swap" rel="stylesheet">
		{{-- {{asset('')}} --}}
		<!-- BOOTSTRAP CSS -->
		<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet" crossorigin="anonymous">		
		<link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="{{asset('assets/css/menu.css')}}" rel="stylesheet">	
		<link id="effect" href="{{asset('assets/css/dropdown-effects/fade-down.css')}}" media="all" rel="stylesheet">
		<link href="{{asset('assets/css/tweenmax.css')}}" rel="stylesheet">	
		<link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet">	
		<link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
	
		<!-- TEMPLATE CSS -->
		<link href="{{asset('assets/css/red.css')}}" rel="stylesheet">

		<!-- RESPONSIVE CSS -->
		<link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet"> 
		@livewireStyles
	</head>
	<body>
		<!-- PRELOADER SPINNER
		============================================= -->		
		<div id="loader-wrapper">
			<div id="loader"><div class="cssload-box-loading"></div></div>
		</div>
		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">

			<!-- HEADER
			============================================= -->
			<header id="header-2" class="header white-menu">
				<div class="header-wrapper">
					<!-- MOBILE HEADER -->
					<div class="wsmobileheader clearfix">	
						<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>	    	
						<span class="smllogo"><img src="{{asset('assets/images/logo-black.png')}}" width="200" height="50" alt="mobile-logo"/></span>
						<a href="tel:123456789" class="callusbtn"><i class="fas fa-phone"></i></a>
					 </div>
		
		
					 <!-- HEADER STRIP -->
					 <div class="headtoppart bg-white clearfix">
						<div class="headerwp clearfix">
		
							<!-- Infotmation -->
							 <div class="headertopleft">			     			
								<div class="header-info clearfix">
									<span class="txt-400"><i class="fas fa-map-marker-alt"></i>121 King St, Melbourne, Victoria 3000</span> 
								</div>
							 </div>
		
							 <!-- Contacts -->
							<div class="headertopright header-contacts">						    	
								<a href="tel:123456789" class="callusbtn txt-400"><i class="fas fa-phone"></i>+61-2 3456 7890,</a>
								<a href="tel:123456789" class="callusbtn b-right txt-400">&#8194;+61-2 7890 3456</a>
								<a href="mailto:yourdomain@mail.com" class="txt-400"><i class="far fa-envelope-open"></i>hello@domain.com</a>
							  </div>
		
						</div>
					  </div>	<!-- END HEADER STRIP -->
		
		
					  <!-- NAVIGATION MENU -->
					  <div class="wsmainfull menu clearfix">
						<div class="wsmainwp clearfix">
		
		
							<!-- LOGO IMAGE -->
							<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 90 pixels) -->
							<div class="desktoplogo"><a href="#hero-8" class="logo-black"><img src="{{asset('assets/images/logo-black.png')}}" width="180" height="45" alt="header-logo"></a></div>
							<div class="desktoplogo"><a href="#hero-8" class="logo-white"><img src="{{asset('assets/images/logo-white.png')}}" width="180" height="45" alt="header-logo"></a></div>
		
		
							<!-- MAIN MENU -->
							  <nav class="wsmenu clearfix blue-header">
								<ul class="wsmenu-list">
		
									<!-- SIMPLE NAVIGATION LINK -->
									<li class="nl-simple" aria-haspopup="true"><a href="{{route('index')}}">Visa</a></li>
									<li class="nl-simple" aria-haspopup="true"><a href="{{route('travelinsurance')}}">Travel Insurance</a></li>
									<li class="nl-simple" aria-haspopup="true"><a href="#">Blog</a></li>
									<li class="nl-simple" aria-haspopup="true"><a href="#">Offers</a></li>
									  
									
								   @if(Route::has('login'))
								   
										@auth
		
										@if(Auth::user()->utype === 'ADM')
											<li aria-haspopup="true"><span class="wsmenu-click"><i class="wsmenu-arrow"></i></span><a href="#" style="color: brown">{{Auth::user()->name}} <span class="wsarrow"></span></a>
												<ul class="sub-menu">
													<li aria-haspopup="true"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
													<li aria-haspopup="true"><a href="{{route('admin.categories')}}">Categories</a></li>
													<li aria-haspopup="true"><a href="demo-3.html">My Booking</a></li>
		
													<li aria-haspopup="true">
														<a href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
															<i class="fe-log-out"></i>
															<span>{{ __('Logout') }}</span>
														</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
															@csrf
														</form>
													</li>
		
												</ul>
											</li>
		
										@else
											<li aria-haspopup="true"><span class="wsmenu-click"><i class="wsmenu-arrow"></i></span><a href="#" style="color: brown">{{Auth::user()->name}} <span class="wsarrow"></span></a>
												<ul class="sub-menu">
													<li aria-haspopup="true"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
													<li aria-haspopup="true"><a href="demo-2.html">My Profile</a></li>
													<li aria-haspopup="true"><a href="demo-3.html">My Booking</a></li>
													<li aria-haspopup="true">
														<a href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
															<i class="fe-log-out"></i>
															<span>{{ __('Logout') }}</span>
														</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
															@csrf
														</form>
													</li>
												</ul>
											</li>
										
										@endif
											
										@else
											<li class="nl-simple" aria-haspopup="true"><a href="{{route('register')}}" class="header-btn btn-primary tra-black-hover last-link">Sign Up</a></li>
											<li class="nl-simple" aria-haspopup="true"><a href="{{route('login')}}" class="header-btn btn-primary tra-black-hover last-link">Login</a></li>
										@endif
		
								   @endif
		
								</ul>
							</nav>	<!-- END MAIN MENU -->
		
						</div>
					</div>	<!-- END NAVIGATION MENU -->
		
		
				</div>     <!-- End header-wrapper -->
			</header>	
			<!-- END HEADER -->
		{{$slot}}
		<!-- END PAGE CONTENT -->
		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		</div>
		<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>	
		<script src="{{asset('assets/js/modernizr.custom.js')}}"></script>
		<script src="{{asset('assets/js/jquery.easing.js')}}"></script>
		<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
		<script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>	
		<script src="{{asset('assets/js/menu.js')}}"></script>
		<script src="{{asset('assets/js/materialize.js')}}"></script>	
		<script src="{{asset('assets/js/jquery.scrollto.js')}}"></script>
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
		<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>	
		<script src="{{asset('assets/js/hero-request-form.js')}}"></script>
		<script src="{{asset('assets/js/hero-register-form.js')}}"></script>
		<script src="{{asset('assets/js/request-form.js')}}"></script>	
		<script src="{{asset('assets/js/contact-form.js')}}"></script>
		<script src="{{asset('assets/js/comment-form.js')}}"></script>
		<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>	
		<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>	

		<!-- Custom Script -->		
		<script src="{{asset('assets/js/custom.js')}}"></script>

		
		<script src="{{asset('assets/js/changer.js')}}"></script>
		<script defer src="{{asset('assets/js/styleswitch.js')}}"></script>	
		@livewireScripts

	</body>
</html>	