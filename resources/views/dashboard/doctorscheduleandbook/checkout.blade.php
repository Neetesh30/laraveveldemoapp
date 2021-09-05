@foreach ($adminappdatas as $item)
@php
    $appname = $item['appname'];
    $logoimagepath = $item['applogoimagepath'];
    $faviconimagepath = $item['applogofaviconimagepath'];
    $app_contact = $item['app_contactno'];
@endphp
@endforeach

@extends('layouts.DoctorScheduleAndBooking.master')

@section('favicon-logo',$faviconimagepath)
@section('headerlogo')
<img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo">
@endsection
@section('menu-logo')
<img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo">
@endsection
@section('contact-info-header')
{{$app_contact}}
@endsection

@section('title','Checkout')
@section('breadcrumb','Checkout')
@section('content')
    <!-- Page Content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
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
						@foreach ($errors->all() as $message)
						<div class="alert alert-danger">
								{{$message}}
							</div>
						@endforeach
						</div>
					</div>

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form action="{{route('patient.payment')}}" method="POST"  autocomplete="off">
										@csrf
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="form-group card-label">
														<label>Full Name</label>
														<input class="form-control" type="text" name="fullname" value="{{auth::guard('patient')->user()->name}}">
														<input type="hidden" name="bookingslot" readonly  value="{{$_GET['bookingslot']}}">
														@foreach ($checkoutdata as $item)
															@for ($day = 0; $day < 7; $day++)
                                                                @php
																	$date = strtotime("+$day day");
                                                                   	if (strtolower(date('l', $date)) == $item['dayoftheweek']) {
																		echo "<input type='hidden' name='bookingdate' readonly  value=".date('Y-m-d', $date).">";
																	}
                                                                @endphp
                                                            @endfor	
														@endforeach
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Email</label>
														<input class="form-control" type="email" name="email" value="{{auth::guard('patient')->user()->email}}">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Phone</label>
														<input class="form-control" type="text" name="phoneno" value="{{auth::guard('patient')->user()->phoneno}}">
													</div>
												</div>
											</div>
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<h4 class="card-title">Payment Method</h4>
											
											<!-- Credit Card Payment -->
											<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="radio" checked="">
													<span class="checkmark"></span>
													Credit card
												</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control" id="card_number" placeholder="1234  5678  9876  5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" id="expiry_month" placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" id="expiry_year" placeholder="YY" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input class="form-control" id="cvv" type="text">
														</div>
													</div>
												</div>
											</div>
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment -->
											<div class="payment-list">
												<label class="payment-radio paypal-option">
													<input type="radio" name="radio">
													<span class="checkmark"></span>
													Paypal
												</label>
											</div>
											<!-- /Paypal Payment -->
											
											<!-- Terms Accept -->
											<div class="terms-accept">
												<div class="custom-checkbox">
												   <input type="checkbox" name="agreetnc" id="terms_accept">
												   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
												</div>
											</div>
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
											</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking Doctor Info -->
									@foreach ($checkoutdata as $item)
									<div class="booking-doc-info">
										<a href="#" class="booking-doc-img">
											<img src="\assets\img\doctors\{{$item['imagepath'] == NULL ? 'dummy-profile.png': $item['imagepath']}}" alt="Dr.{{$item['name']}}">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html">Dr. {{$item['name']}}</a></h4>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">dummy 35</span>
											</div>
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> dummy Newyork, USA</p>
											</div>
										</div>
									</div>
									<!-- Booking Doctor Info -->
									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<li>Date <span> 
												@for ($day = 0; $day < 7; $day++)
													@php
														$date = strtotime("+$day day");
														if (strtolower(date('l', $date)) == $item['dayoftheweek']) {
															echo date('d-M-Y', $date);
														}
													@endphp
												@endfor
												</span></li>
												<li>Week Day <span>{{$item['dayoftheweek']}}</span></li>
												<li>Time <span>{{$item['starttime']}}</span></li>
											</ul>
											<ul class="booking-fee">
												<li>Consulting Fee <span>Rs {{$item['doctor_fees']}}.00</span></li>
												<li>Booking Fee <span>Rs 10.00</span></li>
												<li>Video Call <span>Rs 50.00</span></li>
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">{{$item['doctor_fees'] + 10 + 50}}.00</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
										
									@endforeach
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection