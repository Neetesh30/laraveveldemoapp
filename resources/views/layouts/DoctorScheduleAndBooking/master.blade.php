<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>- @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		{{-- <link href="{{url('')}}\admin\assets\img\{{$faviconimagepath == NULL ? 'dummy-company-logo.jpg': $faviconimagepath}}" rel="icon"> --}}
						
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\css\bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\plugins\fontawesome\css\fontawesome.min.css">
		<link rel="stylesheet" href="{{url('')}}\assets\plugins\fontawesome\css\all.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\css\bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\plugins\select2\css\select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\plugins\fancybox\jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\css\style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="{{url('')}}\assets/js/html5shiv.min.js"></script>
			<script src="{{url('')}}\assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="{{route('patient.home')}}" class="navbar-brand logo">
							{{-- <img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo"> --}}
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="{{route('patient.home')}}" class="menu-logo">
								{{-- <img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo"> --}}
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="{{route('patient.home')}}">Home</a>
							</li>	
							<li class="has-submenu active">
								<a href="">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu">
										<a href="#">Doctors</a>
										<ul class="submenu">
											<li><a href="#">Map Grid</a></li>
											<li><a href="#">Map List</a></li>
										</ul>
									</li>
									<li class="{{ 'patient/searchdoctor' == request()->path() ? 'active':''}} "><a href="{{route('patient.searchdoctor')}}">Search Doctor</a></li>
									<li><a href="#">Doctor Profile</a></li>
									<li><a href="#">Booking</a></li>
									<li class="{{ 'patient/home' == request()->path() ? 'active':''}} " ><a href="{{route('patient.home')}}">Patient Dashboard</a></li>
									<li><a href="#">Favourites</a></li>
									<li><a href="#">Chat</a></li>
									<li class="{{ 'patient/profile' == request()->path() ? 'active':''}} " ><a href="{{route('patient.profile')}}">Profile Settings</a></li>
									<li class="{{ 'patient/changepassword' == request()->path() ? 'active':''}} "><a href="{{route('patient.changepassword')}}">Change Password</a></li>
								</ul>
							</li>	
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +91 @yield('contact-info-header')</p>
							</div>
						</li>
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="\assets\img\patients\{{auth::guard('patient')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('patient')->user()->imagepath}}" width="31" alt=" {{auth::guard('patient')->user()->name}}">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
                                        <img src="\assets\img\patients\{{auth::guard('patient')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('patient')->user()->imagepath}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{auth::guard('patient')->user()->name}}</h6>
										<p class="text-muted mb-0">Patient</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{route('patient.home')}}">Dashboard</a>
								<a class="dropdown-item" href="{{route('patient.profile')}}">Profile Settings</a>
								<a class="dropdown-item" href="{{ route('patient.logout') }}" onclick="event.preventDefault();document.getElementById('patientlogout-form').submit();">Logout</a>
                                     <form action="{{ route('patient.logout') }}" id="patientlogout-form" method="post">@csrf</form></a>
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('patient.home')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
								</ol>
							</nav>
							@if ('patient/checkout' == request()->path())
							<h2 class="breadcrumb-title">@yield('breadcrumb')</h2>
							@else
							<h2 class="breadcrumb-title">{{@$rowcount}}  matches found for : Doctors </h2>
							@endif
						</div>
						<div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
									</select>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
            <!-- Page Content -->
			@yield('content')
            <!-- /Page Content -->
			<!-- Footer -->
			<footer class="footer">
				
								<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										{{-- <img width="50%" src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" alt="{{$item['appname']}}"> --}}
									</div>
									{{-- <h2 class="text-white">{{$appname}}</h2> --}}
									<div class="footer-about-content">
										
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2021 patient Appointment. All rights reserved.</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="#">Terms and Conditions</a></li>
											<li><a href="#">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
			</footer>
			<!-- /Footer -->

		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{url('')}}\assets\js\jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('')}}\assets\js\popper.min.js"></script>
		<script src="{{url('')}}\assets\js\bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('')}}\assets\plugins\theia-sticky-sidebar\ResizeSensor.js"></script>
        <script src="{{url('')}}\assets\plugins\theia-sticky-sidebar\theia-sticky-sidebar.js"></script>
		
		<!-- Select2 JS -->
		<script src="{{url('')}}\assets\plugins\select2\js\select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{url('')}}\assets\js\moment.min.js"></script>
		<script src="{{url('')}}\assets\js\bootstrap-datetimepicker.min.js"></script>
		
		<!-- Fancybox JS -->
		<script src="{{url('')}}\assets\plugins\fancybox\jquery.fancybox.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('')}}\assets\js\script.js"></script>
		
	</body>
</html>