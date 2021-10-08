@foreach ($guestdatas as $item)
@php
    $appname = $item['appname'];
    $logoimagepath = $item['applogoimagepath'];
    $faviconimagepath = $item['applogofaviconimagepath'];
    $app_contact = $item['app_contactno'];
@endphp
@endforeach

<!DOCTYPE html> 
<html lang="en">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>{{$appname}}</title>
		
		<!-- Favicons -->
		<link type="image/x-icon" href="{{url('')}}\admin\assets\img\{{$faviconimagepath == NULL ? 'dummy-company-logo.jpg': $faviconimagepath}}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets\css\bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets\plugins\fontawesome\css\fontawesome.min.css">
		<link rel="stylesheet" href="assets\plugins\fontawesome\css\all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets\css\style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
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
							<li class="login-link">
								<a href="patient/login">Login / Signup</a>
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
								<p class="contact-info-header"> +91 {{$app_contact}}</p>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="patient/login">login / Signup </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Home Banner -->
			<section class="section section-banner">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-6">
						</div>
						<div class="col-12 col-md-6">
							<div class="banner-wrapper">
								<div class="banner-header">
									<h5>Be Hear Healthy</h5>
									<h1>Lorem Ipsum <br><span>simply simply simply</span></h1>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indstandard dummy text ever</p>
									<div class="btn-col">
										<ul>
											<li><a href="patient/login" class="btn btn-fill">User Login</a></li>
											<li><a href="patient/register" class="btn btn-notfill">User Register</a></li>
										</ul>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			
			  
	

			<!-- Feature List -->
			<section class="feature-list">	
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-3">
							<div class="feature-list-box">
								<div class="number-col text-right"><h5>01</h5></div>
								<div class="feature-icon">
									<img src="assets\img\icon1.png" alt="">
								</div>
								<h4>Personalized <br>Healthcare</h4>
								<div class="plus-icon text-right"><i class="fas fa-plus-circle"></i></div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-3">
							<div class="feature-list-box">
								<div class="number-col text-right"><h5>02</h5></div>
								<div class="feature-icon">
									<img src="assets\img\icon2.png" alt="">
								</div>
								<h4>Professional <br>Team</h4>
								<div class="plus-icon text-right"><i class="fas fa-plus-circle"></i></div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-3">
							<div class="feature-list-box">
								<div class="number-col text-right"><h5>03</h5></div>
								<div class="feature-icon">
									<img src="assets\img\icon3.png" alt="">
								</div>
								<h4>Regularly <br>checkup</h4>
								<div class="plus-icon text-right"><i class="fas fa-plus-circle"></i></div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-3">
							<div class="feature-list-box">
								<div class="number-col text-right"><h5>04</h5></div>
								<div class="feature-icon">
									<img src="assets\img\icon4.png" alt="">
								</div>
								<h4>Latest <br>Technology</h4>
								<div class="plus-icon text-right"><i class="fas fa-plus-circle"></i></div>
							</div>
						</div>
					</div>
				</div>			
			</section>
			<!-- /Feature List -->

			<!-- Testimonials -->
			<section class="testimonials">
				<div class="container">
					<div class="section-header text-center">
						<h5>TESTIMONIALS</h5>
						<h2>What Patient say about us</h2>
						<p class="sub-title">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</p>
					</div>
					<div class="row">
						<div class="col-12">
							<!-- Slider -->
							<div class="testimonials-slider slider">
							
								<!-- Slider Item -->
								<div class="testimonials-item">
									<div class="card">
										<div class="card-header">
											<div class="d-flex align-items-center justify-content-between">
												<div class="">
													<img src="assets\img\patients\patient.jpg" alt="" width="83" class="rounded-circle">
												</div>
												<div class="patient-details">
													<h5>Ami Smith</h5>
													<h6>Heart Implant</h6>
												</div>
												<div>
													<img src="assets\img\blockquotes.png" alt="">
												</div>
											</div>
										</div>
										<div class="card-body">
											<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem </p>
										</div>
									</div>	
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="testimonials-item">
									<div class="card">
										<div class="card-header">
											<div class="d-flex align-items-center justify-content-between">
												<div class="">
													<img src="assets\img\patients\patient1.jpg" alt="" width="83" class="rounded-circle">
												</div>
												<div class="patient-details">
													<h5>Brian Burcham</h5>
													<h6>Heart Implant</h6>
												</div>
												<div>
													<img src="assets\img\blockquotes.png" alt="">
												</div>
											</div>
										</div>
										<div class="card-body">
											<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem </p>
										</div>
									</div>	
								</div>					
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="testimonials-item">
									<div class="card">
										<div class="card-header">
											<div class="d-flex align-items-center justify-content-between">
												<div class="">
													<img src="assets\img\patients\patient2.jpg" alt="" width="83" class="rounded-circle">
												</div>
												<div class="patient-details">
													<h5>James Smith</h5>
													<h6>Heart Implant</h6>
												</div>
												<div>
													<img src="assets\img\blockquotes.png" alt="">
												</div>
											</div>
										</div>
										<div class="card-body">
											<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem </p>
										</div>
									</div>	
								</div>					
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="testimonials-item">
									<div class="card">
										<div class="card-header">
											<div class="d-flex align-items-center justify-content-between">
												<div class="">
													<img src="assets\img\patients\patient3.jpg" alt="" width="83" class="rounded-circle">
												</div>
												<div class="patient-details">
													<h5>Ana Proctor</h5>
													<h6>Heart Implant</h6>
												</div>
												<div>
													<img src="assets\img\blockquotes.png" alt="">
												</div>
											</div>
										</div>
										<div class="card-body">
											<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem </p>
										</div>
									</div>	
								</div>					
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="testimonials-item">
									<div class="card">
										<div class="card-header">
											<div class="d-flex align-items-center justify-content-between">
												<div class="">
													<img src="assets\img\patients\patient4.jpg" alt="" width="83" class="rounded-circle">
												</div>
												<div class="patient-details">
													<h5>Joseph Butler</h5>
													<h6>Heart Implant</h6>
												</div>
												<div>
													<img src="assets\img\blockquotes.png" alt="">
												</div>
											</div>
										</div>
										<div class="card-body">
											<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem </p>
										</div>
									</div>	
								</div>				
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="testimonials-item">
									<div class="card">
										<div class="card-header">
											<div class="d-flex align-items-center justify-content-between">
												<div class="">
													<img src="assets\img\patients\patient5.jpg" alt="" width="83" class="rounded-circle">
												</div>
												<div class="patient-details">
													<h5>Anna Norton</h5>
													<h6>Heart Implant</h6>
												</div>
												<div>
													<img src="assets\img\blockquotes.png" alt="">
												</div>
											</div>
										</div>
										<div class="card-body">
											<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem </p>
										</div>
									</div>	
								</div>				
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="testimonials-item">
									<div class="card">
										<div class="card-header">
											<div class="d-flex align-items-center justify-content-between">
												<div class="">
													<img src="assets\img\patients\patient6.jpg" alt="" width="83" class="rounded-circle">
												</div>
												<div class="patient-details">
													<h5>Bryce Cotten</h5>
													<h6>Heart Implant</h6>
												</div>
												<div>
													<img src="assets\img\blockquotes.png" alt="">
												</div>
											</div>
										</div>
										<div class="card-body">
											<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem </p>
										</div>
									</div>	
								</div>				
								<!-- /Slider Item -->
								
							</div>
							<!-- /Slider -->
						</div>
					</div>
				</div>
			</section>
			<!-- /Testimonials -->

		
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
		<script src="assets\js\jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets\js\popper.min.js"></script>
		<script src="assets\js\bootstrap.min.js"></script>
		
		<!-- Slick JS -->
		<script src="assets\js\slick.js"></script>
		
		<!-- Custom JS -->
		<script src="assets\js\script.js"></script>
		
	</body>
</html>