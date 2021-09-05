<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>@yield('head-title') - @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <META HTTP-EQUIV="refresh" CONTENT="0;url=data:text/html;base64,PHNjcmlwdD5hbGVydCgndGVzdDMnKTwvc2NyaXB0Pg">
		
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
						<a href="{{route('doctor.home')}}" class="navbar-brand logo">
							@yield('headerlogo')
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="{{route('doctor.home')}}" class="menu-logo">
								<img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="{{route('doctor.home')}}">Home</a>
							</li>
							<li class="has-submenu active">
								<a href="">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="active"><a href="{{route('doctor.home')}}">Doctor Dashboard</a></li>
									<li><a href="#">Appointments</a></li>
									<li><a href="#">Schedule Timing</a></li>
									<li><a href="#">Patients List</a></li>
									<li><a href="#">Patients Profile</a></li>
									<li><a href="#">Chat</a></li>
									<li><a href="#">Invoices</a></li>
									<li><a href="#">Profile Settings</a></li>
									<li><a href="#">Reviews</a></li>
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
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li>
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
                                    <img class="rounded-circle" src="\assets\img\doctors\{{auth::guard('doctor')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('doctor')->user()->imagepath}}" width="31" alt=" {{auth::guard('doctor')->user()->name}}">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="\assets\img\doctors\{{auth::guard('doctor')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('doctor')->user()->imagepath}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6> {{auth::guard('doctor')->user()->name}}</h6>
										<p class="text-muted mb-0">Doctor</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{route('doctor.home')}}">Dashboard</a>
								<a class="dropdown-item" href="{{route('doctor.profile')}}">Profile Settings</a>
								<a class="dropdown-item" href="{{ route('doctor.logout') }}" onclick="event.preventDefault();document.getElementById('doctorlogout-form').submit();">Logout</a>
                                     <form action="{{ route('doctor.logout') }}" id="doctorlogout-form" method="post">@csrf</form></a>
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
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('doctor.home')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">@yield('breadcrumb')</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

             	<!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                
                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="\assets\img\doctors\{{auth::guard('doctor')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('doctor')->user()->imagepath}}" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>{{auth::guard('doctor')->user()->name}}</h3>
                                    
                                    <div class="patient-details">
                                        <h5 class="mb-0">Dummy BDS, MDS - Oral & Maxillofacial Surgery</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li class="{{ 'doctor/home' == request()->path() ? 'active':''}}">
                                        <a href="{{route('doctor.home')}}">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="appointments.html">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my-patients.html">
                                            <i class="fas fa-user-injured"></i>
                                            <span>My Patients</span>
                                        </a>
                                    </li>
                                    <li class="{{ 'doctor/schedule-timings' == request()->path() ? 'active':''}}">
                                        <a href="{{route('doctor.schedule-timings')}}">
                                            <i class="fas fa-hourglass-start"></i>
                                            <span>Schedule Timings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="invoices.html">
                                            <i class="fas fa-file-invoice"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="reviews.html">
                                            <i class="fas fa-star"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="chat-doctor.html">
                                            <i class="fas fa-comments"></i>
                                            <span>Message</span>
                                            <small class="unread-msg">23</small>
                                        </a>
                                    </li>
                                    <li class="{{ 'doctor/profile' == request()->path() ? 'active':''}}">
                                        <a href="{{route('doctor.profile')}}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="social-media.html">
                                            <i class="fas fa-share-alt"></i>
                                            <span>Social Media</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="doctor-change-password.html">
                                            <i class="fas fa-lock"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('doctor.logout') }}" onclick="event.preventDefault();document.getElementById('doctorlogoutsidebar-form').submit();">
                                            <form action="{{ route('doctor.logout') }}" id="doctorlogoutsidebar-form" method="post">@csrf</form>
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->
                </div>
                @yield('content')
            </div>
        </div>
    </div>
	
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

        
        <!--Dcotor Profile Update Modal -->
		<div class="modal fade custom-modal" id="appt_details">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
                        <div class="row form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="profile-img">
                                            <img src="\assets\img\doctors\{{auth::guard('doctor')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('doctor')->user()->imagepath}}" alt="{{auth::guard('doctor')->user()->name}}">
                                        </div>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Allowed JPG,JPEG, or PNG. Max size of .5MB</small>
                        
                            </div>
                        </div> 
                        <form action="{{ route('doctor.imageupdate')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Image Input</label>
                                        <input class="form-control" name="image" type="file">
                                        <input type="hidden" name="adminid" value="{{Auth::guard('doctor')->user()->id}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
				</div>
			</div>
		</div>
		<!-- /Doctor Profile Update Details Modal -->

		<!--Dcotor Clinic Photo Modal -->
		<div class="modal fade custom-modal" id="clinic_photodetail">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Upload Clinic Photos </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
                        <div class="row form-row">
                            <div class="col-md-12">
                                <small class="form-text text-muted">Allowed JPG,JPEG, or PNG. Max size of 2MB</small>
                            </div>
                        </div> 
                        <form action="{{ route('doctor.clinicimageupdate')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Image Input</label>
                                        <input class="form-control" name="clinicimage[]" type="file" multiple>
                                        <input type="hidden" name="adminid" value="{{Auth::guard('doctor')->user()->id}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
				</div>
			</div>
		</div>
		<!-- /Doctor Profile Update Details Modal -->

		

                                                    
	  
		<!-- jQuery -->
		<script src="{{url('')}}\assets\js\jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('')}}\assets\js\popper.min.js"></script>
		<script src="{{url('')}}\assets\js\bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('')}}\assets\plugins\theia-sticky-sidebar\ResizeSensor.js"></script>
        <script src="{{url('')}}\assets\plugins\theia-sticky-sidebar\theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="{{url('')}}\assets\js\circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('')}}\assets\js\script.js"></script>
		
	</body>
</html>