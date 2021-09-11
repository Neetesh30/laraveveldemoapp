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
											<li><a href="patient/login" class="btn btn-fill">Patient Register</a></li>
											<li><a href="patient/register" class="btn btn-notfill">Patient Sign In</a></li>
										</ul>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			<!-- Search Section -->
			<section class="search-section">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-6 col-xl-8">
							<div class="search-box">
								<h2>Search Doctor, <br>Make an Appointment !</h2>
								<div class="form-col">
									<form method="post" action="search.html">
										<ul class="d-flex flex-wrap">
											<li>
												<input type="text" placeholder="Location" class="form-control">
											</li>
											<li>
												<input type="text" placeholder="Gender" class="form-control">
											</li>
											<li>
												<input type="text" placeholder="Phone Number" class="form-control">
											</li>
											<li>
												<input type="submit" value="Search" class="btn-submit form-control">
											</li>
										</ul>
									</form>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6 col-xl-4">
						</div>
					</div>
				</div>
				<div class="search-right-img">
					<img src="assets\img\search-img.png" alt="">
				</div>
			</section>
			<!-- Search Section -->
			  
			<!-- Popular Section -->
			<section class="section popular-section">
				<div class="container">
					<div class="section-header text-center">
						<h5>WHAT WE HAVE</h5>
						<h2>Heart Care based Solutions</h2>
						<p class="sub-title">We merge two services consulting and brilliant client Services for the patient healthcare. Used latest technology in hospital.</p>
					</div>
				   <div class="row">
						<div class="col-12">
							<div class="solution-slider slider">
							
								<!-- Solution Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets\img\solution1.png">
										</a>
									</div>
									<div class="pro-content">
										<div class="specialities-img">
											<img src="assets\img\specialities\specialities-01.png" alt="">
										</div>
										<h5>SURGERY</h5>
										<h3 class="title">
											Heart Surgery
										</h3>
										<p class="speciality">Lorem Ipsum is simply dummy text  the printing and typesetting industry. </p>
										<a href="doctor-profile.html" class="readmore-btn"><i class="fas fa-chevron-circle-right"></i> Read more</a>
									</div>
								</div>
								<!-- /Solution Widget -->
						
								<!-- Solution Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets\img\solution2.png">
										</a>
									</div>
									<div class="pro-content">
										<div class="specialities-img">
											<img src="assets\img\specialities\specialities-02.png" alt="">
										</div>
										<h5>SAVING LIVES</h5>
										<h3 class="title">
											Valve Diseases
										</h3>
										<p class="speciality">Lorem Ipsum is simply dummy text  the printing and typesetting industry. </p>
										<a href="doctor-profile.html" class="readmore-btn"><i class="fas fa-chevron-circle-right"></i> Read more</a>
									</div>
								</div>
								<!-- /Solution Widget -->
						
								<!-- Solution Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets\img\solution3.png">
										</a>
									</div>
									<div class="pro-content">
										<div class="specialities-img">
											<img src="assets\img\specialities\specialities-03.png" alt="">
										</div>
										<h5>GREAT CARE</h5>
										<h3 class="title">
											Children’s services
										</h3>
										<p class="speciality">Lorem Ipsum is simply dummy text  the printing and typesetting industry. </p>
										<a href="doctor-profile.html" class="readmore-btn"><i class="fas fa-chevron-circle-right"></i> Read more</a>
									</div>
								</div>
								<!-- /Solution Widget -->

								<!-- Solution Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets\img\solution1.png">
										</a>
									</div>
									<div class="pro-content">
										<div class="specialities-img">
											<img src="assets\img\specialities\specialities-01.png" alt="">
										</div>
										<h5>SURGERY</h5>
										<h3 class="title">
											Heart Surgery
										</h3>
										<p class="speciality">Lorem Ipsum is simply dummy text  the printing and typesetting industry. </p>
										<a href="doctor-profile.html" class="readmore-btn"><i class="fas fa-chevron-circle-right"></i> Read more</a>
									</div>
								</div>
								<!-- /Solution Widget -->
						
								<!-- Solution Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets\img\solution2.png">
										</a>
									</div>
									<div class="pro-content">
										<div class="specialities-img">
											<img src="assets\img\specialities\specialities-02.png" alt="">
										</div>
										<h5>SAVING LIVES</h5>
										<h3 class="title">
											Valve Diseases
										</h3>
										<p class="speciality">Lorem Ipsum is simply dummy text  the printing and typesetting industry. </p>
										<a href="doctor-profile.html" class="readmore-btn"><i class="fas fa-chevron-circle-right"></i> Read more</a>
									</div>
								</div>
								<!-- /Solution Widget -->
						
								<!-- Solution Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets\img\solution3.png">
										</a>
									</div>
									<div class="pro-content">
										<div class="specialities-img">
											<img src="assets\img\specialities\specialities-03.png" alt="">
										</div>
										<h5>GREAT CARE</h5>
										<h3 class="title">
											Children’s services
										</h3>
										<p class="speciality">Lorem Ipsum is simply dummy text  the printing and typesetting industry. </p>
										<a href="doctor-profile.html" class="readmore-btn"><i class="fas fa-chevron-circle-right"></i> Read more</a>
									</div>
								</div>
								<!-- /Solution Widget -->
								
							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->

			<!-- About Us -->
			<section class="section aboutus-section">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="left">
								<div class="section-header">
									<h5>WHY CHOOSE US</h5>
									<h2>We are Achieve the Success of <span>Heart Surgery</span></h2>
								</div>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								<div class="feature-col row">
									<div class="col-12 col-md-6">
										<div class="feature-box">
											<div class="corner-img"><img src="assets\img\feature1.png" alt=""></div>
											<h2>870+</h2>
											<h6>Satisfied Patients</h6>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="feature-box">
											<div class="corner-img"><img src="assets\img\feature2.png" alt=""></div>
											<h2>1500+</h2>
											<h6>Patient/Year</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="right">
								<img src="assets\img\about-us.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /About Us -->

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

			<!--  Choose Us -->
			<section class="choose-us">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="left">
								<div class="section-header">
									<h5>OUR BENEFITS</h5>
									<h2>Choose Our Cardiology <br>Healthcare Solutions</h2>
								</div>
								<div class="row">
									<div class="col-12 col-lg-6">
										<div class="choose-col">
											<div class="top-title d-flex align-items-center">
												<span><img src="assets\img\check-mark.png" alt=""></span>
												<span>Expert Nursing</span>
											</div>
											<p>Lorem Ipsum has been the industry's standard dummy text ever since the 500s, when an unknown printer took a galley of type</p>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="choose-col">
											<div class="top-title d-flex align-items-center">
												<span><img src="assets\img\check-mark.png" alt=""></span>
												<span>Heath care Expert</span>
											</div>
											<p>Lorem Ipsum has been the industry's standard dummy text ever since the 500s, when an unknown printer took a galley of type</p>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="choose-col">
											<div class="top-title d-flex align-items-center">
												<span><img src="assets\img\check-mark.png" alt=""></span>
												<span>Individual Approach</span>
											</div>
											<p>Lorem Ipsum has been the industry's standard dummy text ever since the 500s, when an unknown printer took a galley of type</p>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="choose-col">
											<div class="top-title d-flex align-items-center">
												<span><img src="assets\img\check-mark.png" alt=""></span>
												<span>Emergency Help</span>
											</div>
											<p>Lorem Ipsum has been the industry's standard dummy text ever since the 500s, when an unknown printer took a galley of type</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="right">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--  /Choose Us -->

			<!-- Blog -->
			<section class="blog-section">
				<div class="container">
					<div class="section-header text-center">
						<h5>READ OUR BLOG</h5>
						<h2>Featured News and Advices</h2>
						<p class="sub-title">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-6 col-lg-4">
							<div class="blog-widget">
								<a href="blog-list.html" class="blog-img">
									<img src="assets\img\blog1.png" alt="">
								</a>
								<div class="date-col">
									<span>14 Aug 2020</span>
								</div>
								<div class="blog-content text-center">
									<h6>Expert Nursing</h6>
									<h5>Is Running Really Good for the Heart?</h5>
									<p>There are lorem ipsum is simply free many variations of Ipsum the majority suffered.</p>
									<a href="blog-list.html" class="readmore-btn" tabindex="-1"><i class="fas fa-chevron-circle-right"></i> Read more</a>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="blog-widget">
								<a href="blog-list.html" class="blog-img">
									<img src="assets\img\blog2.png" alt="">
								</a>
								<div class="date-col">
									<span>12 Aug 2020</span>
								</div>
								<div class="blog-content text-center">
									<h6>Heath care Expert</h6>
									<h5>Modeling data increase to endovascular therapy</h5>
									<p>There are lorem ipsum is simply free many variations of Ipsum the majority suffered.</p>
									<a href="blog-list.html" class="readmore-btn" tabindex="-1"><i class="fas fa-chevron-circle-right"></i> Read more</a>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="blog-widget">
								<a href="blog-list.html" class="blog-img">
									<img src="assets\img\blog3.png" alt="">
								</a>
								<div class="date-col">
									<span>10 Aug 2020</span>
								</div>
								<div class="blog-content text-center">
									<h6>Individual Approach</h6>
									<h5>Get the Exercise Tips for Limited Mobility</h5>
									<p>There are lorem ipsum is simply free many variations of Ipsum the majority suffered.</p>
									<a href="blog-list.html" class="readmore-btn" tabindex="-1"><i class="fas fa-chevron-circle-right"></i> Read more</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Blog -->
			
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
										<img src="assets\img\footer-logo.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="search.html">Search for Doctors</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="booking.html">Booking</a></li>
										<li><a href="patient-dashboard.html">Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="appointments.html">Appointments</a></li>
										<li><a href="chat.html">Chat</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="doctor-register.html">Register</a></li>
										<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-mobile-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
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
										<p class="mb-0">&copy; 2020 Doccure. All rights reserved.</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
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