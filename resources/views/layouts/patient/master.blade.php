<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>@yield('head-title') - @yield('title')</title>
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
							@yield('headerlogo')
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.html" class="menu-logo">
								<img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo">
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
			
			<!--Normal Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('patient.home')}}">Home</a></li>
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
                    
                        <!-- Profile Sidebar -->
                        <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                            <div class="profile-sidebar">
                                <div class="widget-profile pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="#" class="booking-doc-img">
                                            <img src="\assets\img\patients\{{auth::guard('patient')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('patient')->user()->imagepath}}" alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h3>{{auth::guard('patient')->user()->name}}</h3>
                                            <div class="patient-details">
                                                <h5><i class="fas fa-birthday-cake"></i>@php
                                                    if(auth::guard('patient')->user()->dateofbirth == NULL){    
                                                                echo '-';
                                                    }else{
                                                        $mydob =  auth::guard('patient')->user()->dateofbirth;
                                                           $mydob = date("d M Y", strtotime($mydob));
                                                        echo  $mydob;
      
                                                        $secondDate = now();
      
                                                        $dateDifference = abs(strtotime($secondDate) - strtotime($mydob));
      
                                                        $years  = floor($dateDifference / (365 * 60 * 60 * 24));
      
                                                        echo ", ".$years." Years";
                                                    }
                                                    @endphp
                                                </h5>
                                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{auth::guard('patient')->user()->address }}, {{auth::guard('patient')->user()->country }} </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-widget">
                                    <nav class="dashboard-menu">
                                        <ul>
                                            <li class="{{ 'patient/home' == request()->path() ? 'active':''}} ">
                                                <a href="{{route('patient.home')}}">
                                                    <i class="fas fa-columns"></i>
                                                    <span>Dashboard</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-bookmark"></i>
                                                    <span>Favourites</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-comments"></i>
                                                    <span>Message</span>
                                                    <small class="unread-msg">23</small>
                                                </a>
                                            </li>
                                            <li class="{{ 'patient/profile' == request()->path() ? 'active':''}} ">
                                                <a href="{{route('patient.profile')}}">
                                                    <i class="fas fa-user-cog"></i>
                                                    <span>Profile Settings</span>
                                                </a>
                                            </li>
                                            <li class="{{ 'patient/changepassword' == request()->path() ? 'active':''}} ">
                                                <a href="{{route('patient.changepassword')}}">
                                                    <i class="fas fa-lock"></i>
                                                    <span>Change Password</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patient.logout') }}" onclick="event.preventDefault();document.getElementById('patientlogoutsidebar-form').submit();">
                                                    <form action="{{ route('patient.logout') }}" id="patientlogoutsidebar-form" method="post">@csrf</form>
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
            
                            </div>
                        </div>
                        <!-- / Profile Sidebar -->
                        @yield('content')
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

               <!--Patient Profile Update Modal -->
		<div class="modal fade custom-modal" id="appt_details">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Profile Image </h5>
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
                                            <img src="\assets\img\patients\{{auth::guard('patient')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('patient')->user()->imagepath}}" alt="{{auth::guard('patient')->user()->name}}">
                                        </div>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Allowed JPG,JPEG, or PNG. Max size of .5MB</small>
                        
                            </div>
                        </div> 
                        <form action="{{ route('patient.imageupdate')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Image Input</label>
                                        <input class="form-control" name="image" type="file">
                                        <input type="hidden" name="adminid" value="{{Auth::guard('patient')->user()->id}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
				</div>
			</div>
		</div>
		<!-- /Patient Profile Update Details Modal -->

		@if ('patient/profile' == request()->path())
 
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyD_RXgmDthEF06cqpaLFKWC0PKqbIWj-34&libraries=places&callback=initAutocomplete&v=weekly" type="text/javascript"></script>
 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_RXgmDthEF06cqpaLFKWC0PKqbIWj-34&libraries=places&callback=initAutocomplete&v=weekly" async></script>

		<script>
			function initAutocomplete() {
			address1Field = document.querySelector("#ship-address");
			// Create the autocomplete object, restricting the search predictions to
			// addresses in the US and Canada.
			autocomplete = new google.maps.places.Autocomplete(address1Field, {
				componentRestrictions: { country: ["in"] },
				fields: ["address_components", "geometry"],
				types: ["address"],
			});
			address1Field.focus();
			// When the user selects an address from the drop-down, populate the
			// address fields in the form.
			autocomplete.addListener("place_changed", fillInAddress);
			}

			function fillInAddress() {
			// Get the place details from the autocomplete object.
			const place = autocomplete.getPlace();
			let address1 = "";
			let postcode = "";

			// Get each component of the address from the place details,
			// and then fill-in the corresponding field on the form.
			// place.address_components are google.maps.GeocoderAddressComponent objects
			// which are documented at http://goo.gle/3l5i5Mr
			for (const component of place.address_components) {
				const componentType = component.types[0];

				switch (componentType) {
				case "street_number": {
					address1 = `${component.long_name} ${address1}`;
					break;
				}

				case "route": {
					address1 += component.short_name;
					break;
				}

				case "postal_code": {
					//postcode = `${component.long_name}${postcode}`;
					document.querySelector("#pincode").value = component.long_name;
					break;
				}

				case "postal_code_suffix": {
					postcode = `${postcode}-${component.long_name}`;
					
					break;
				}
				case "locality":
					document.querySelector("#city").value = component.long_name;
					break;

				case "administrative_area_level_1": {
					document.querySelector("#state").value = component.long_name;
					break;
				}
				case "country":
					document.querySelector("#country").value = component.long_name;
					break;
				}
			}
			address1Field.value = address1;
			// After filling the form with address components from the Autocomplete
			// prediction, set cursor focus on the second address line to encourage
			// entry of subpremise information such as apartment, unit, or floor number.

			}

		</script>
		
		@endif

	
	  
		<!-- jQuery -->
		<script src="{{url('')}}\assets\js\jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{url('')}}\assets\js\popper.min.js"></script>
		<script src="{{url('')}}\assets\js\bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{url('')}}\assets\plugins\theia-sticky-sidebar\ResizeSensor.js"></script>
        <script src="{{url('')}}\assets\plugins\theia-sticky-sidebar\theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="{{url('')}}\assets\js\script.js"></script>
		
		<script>
			$(document).ready(function() {
				$(".show_hide_password a").on('click', function(event) {
					event.preventDefault();
					if($('.show_hide_password input').attr("type") == "text"){
						$('.show_hide_password input').attr('type', 'password');
						$('.show_hide_password i').addClass( "fa-eye-slash" );
						$('.show_hide_password i').removeClass( "fa-eye" );
					}else if($('.show_hide_password input').attr("type") == "password"){
						$('.show_hide_password input').attr('type', 'text');
						$('.show_hide_password i').removeClass( "fa-eye-slash" );
						$('.show_hide_password i').addClass( "fa-eye" );
					}
				});
			});
		</script>


	</body>
</html>