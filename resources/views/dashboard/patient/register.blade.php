<!DOCTYPE html> 
<html lang="en">
	<head>
		@foreach ($guestdatas as $item)
			@php
				$appname = $item['appname'];
				$logoimagepath = $item['applogoimagepath'];
				$faviconimagepath = $item['applogofaviconimagepath'];
				$app_contact = $item['app_contactno'];
			@endphp
		@endforeach	
		<meta charset="utf-8">
		<title>{{$appname}}- User Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="{{url('')}}\admin\assets\img\{{$faviconimagepath == NULL ? 'dummy-company-logo.jpg': $faviconimagepath}}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\css\bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\plugins\fontawesome\css\fontawesome.min.css">
		<link rel="stylesheet" href="{{url('')}}\assets\plugins\fontawesome\css\all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{url('')}}\assets\css\style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="{{url('')}}\assets/js/html5shiv.min.js"></script>
			<script src="{{url('')}}\assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="account-page">

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
						<a href="#" class="navbar-brand logo">
							<img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="#" class="menu-logo">
								<img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="/">Home</a>
							</li>
                            <li class="active"><a href="register">Register</a></li>
                            <li class=""><a href="login">Login</a></li>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +91 {{$app_contact}}</p>
							</div>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
                            @foreach ($errors->all() as $message)
                                <div class="alert alert-danger">
                                        {{$message}}
                                </div>
                            @endforeach

							@if (Session::get('fail'))
							<div class="alert alert-danger">
								{{Session::get('fail')}}
							</div>
							@endif
							@if (Session::get('success'))
							<div class="alert alert-success">
								{{Session::get('success')}}
							</div>
							@endif
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{url('')}}\assets\img\login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>User Register </h3>
										</div>
										
										<!-- Register Form -->
										<form action="{{route('patient.createPatient')}}" method="post">
                                            @csrf
											<div class="form-group form-focus">
												<input type="text" name="fullname" value="{{old('fullname')}}" class="form-control floating">
												<label class="focus-label">Full Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" name="phoneno" value="{{old('phoneno')}}" class="form-control floating">
												<label class="focus-label">Mobile Number</label>
											</div>
                                            <div class="form-group form-focus">
												<input type="text" name="email" value="{{old('email')}}" class="form-control floating">
												<label class="focus-label">Email Id</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="password" class="form-control floating">
												<label class="focus-label">Create Password</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="cpassword" class="form-control floating">
												<label class="focus-label">Confirm Password</label>
											</div>
                                            <div class="form-check form-check-inline">
                                                <input
                                                  class="form-check-input"
                                                  type="radio"
                                                  name="gender"
                                                  id="inlineRadio1"
                                                  value="male"
                                                />
                                                <label class="form-check-label" for="inlineRadio1">male</label>
                                              </div>
                                              
                                              <div class="form-check form-check-inline">
                                                <input
                                                  class="form-check-input"
                                                  type="radio"
                                                  name="gender"
                                                  id="inlineRadio2"
                                                  value="female"
                                                />
                                                <label class="form-check-label" for="inlineRadio2">female</label>
                                              </div>
                                            
											<div class="terms-and-policy pt-2 pb-2">
												<input type="checkbox" required="" name="agreetnc" value="agreetnc" id="agree"><span class="agree">I agree to these <span class="terms"><a href="#" target="_blank">Terms of Use</a> and <a href="#" target="_blank">Privacy Policy</a></span></span>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="{{route('patient.login')}}">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
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
										<img width="50%" src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" alt="{{$item['appname']}}">
									</div>
									<h2 class="text-white">{{$appname}}</h2>
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
		
		<!-- Custom JS -->
		<script src="{{url('')}}\assets\js\script.js"></script>
		
	</body>
</html>