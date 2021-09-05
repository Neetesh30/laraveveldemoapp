@foreach ($adminappdatas as $item)
@php
    $appname = $item['appname'];
    $logoimagepath = $item['applogoimagepath'];
    $faviconimagepath = $item['applogofaviconimagepath'];
    $app_contact = $item['app_contactno'];
@endphp
@endforeach


@extends('layouts.doctor.master')

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

@section('title','Doctor Profile')
@section('breadcrumb','Profile')

@section('content')
    	<!-- Page Content -->
						<div class="col-md-7 col-lg-8 col-xl-9">
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
							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
														<img src="\assets\img\doctors\{{auth::guard('doctor')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('doctor')->user()->imagepath}}" alt="User Image">
													</div>
												</div>
											</div>
                                            <a href="#appt_details" data-toggle="modal"  data-target="#appt_details" class="btn btn-primary">
                                                <span><i class="fa fa-upload"></i> Edit Photo</span>
                                            </a>
                                            <small class="form-text text-muted">Allowed JPG,JPEG, or PNG. Max size of .5MB</small>
                                    	</div>
                                            <form action="{{route('doctor.updateBasicInformation')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" readonly="" value="{{auth::guard('doctor')->user()->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Full Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control" value="{{auth::guard('doctor')->user()->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" name="phoneno" class="form-control" value="{{auth::guard('doctor')->user()->phoneno}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Gender : <span class="text text:primary">{{auth::guard('doctor')->user()->gender}}</span></label>
                                                        <select class="form-control select" name="gender" >
                                                            <option value="{{auth::guard('doctor')->user()->gender}}">Selected Option :  {{auth::guard('doctor')->user()->gender}}</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-0">
                                                        <label>Date of Birth</label>
                                                        <input type="date" class="form-control" value="{{auth::guard('doctor')->user()->dateofbirth}}" name="dateofbirth">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-0">
                                                        <div class="submit-section submit-btn-bottom ">
                                                            <button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </form>
									</div>
								</div>
							</div>
							<!-- /Basic Information -->
							
							<!-- About Me -->
							<div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">About Me</h4>
                                    <form action="{{route('doctor.updateAboutMe')}}" method="post">
                                        @csrf
                                        <div class="form-group mb-0">
                                            <label>Biography</label>
                                            <textarea name="aboutme" class="form-control"  rows="5">{{auth::guard('doctor')->user()->aboutme}}</textarea>
                                            <div class="form-group mb-0">
                                                <div class="submit-section submit-btn-bottom ">
                                                    <button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
							<!-- /About Me -->
							
							<!-- Clinic Info -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Clinic Info</h4>
									<form action="{{route('doctor.updateClinicinfo')}}" method="post">
										@csrf
										<div class="row form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Clinic Name</label>
													<input type="text" name="clinic_name" value="{{auth::guard('doctor')->user()->clinic_name}}" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Clinic Address</label>
													<input type="text" name="clinic_addr" value="{{auth::guard('doctor')->user()->clinic_addr}}" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group mb-0">
													<div class="submit-section submit-btn-bottom ">
														<button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
													</div>
												</div>
											</div>
										</div>

									</form>

									<div class="col-md-12">
										<div class="form-group">
											<label>Clinic Images</label>
										</div>
										<div class="upload-wrap">
											@php
												$clinicimage = explode(',',auth::guard('doctor')->user()->clinic_imagepath);
												$clinicimageid = 0;
											@endphp
											@foreach ($clinicimage as $image)
												<div class="upload-images">
													<img src="\assets\img\features\{{$image}}" alt="Upload Image">
													<a href="{{ route('doctor.removeclinicImage') }}" onclick="event.preventDefault();document.getElementById('{{$clinicimageid}}-form').submit();" class="btn btn-icon btn-danger btn-sm">
														<form action="{{ route('doctor.removeclinicImage') }}" id="{{$clinicimageid}}-form" method="post">
															@csrf
															<input type="hidden" name="removeimage"  value="{{$image}}" id="">
															</form>
															<i class="far fa-trash-alt"></i>
														</a>
												</div>
												@php
													$clinicimageid++;
												@endphp
											@endforeach
										</div>
										<br>
										<a href="#appt_details" data-toggle="modal"  data-target="#clinic_photodetail" class="btn btn-primary">
											<span><i class="fa fa-upload"></i> Add Clinic Photos</span>
										</a>
										<small class="form-text text-muted">Allowed JPG,JPEG, or PNG. Max size of 2MB</small>
									</div>
								</div>
							</div>
							<!-- /Clinic Info -->

							<!-- Contact Details -->
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Contact Details</h4>
									<form action="{{route('doctor.updateAddress')}}" method="post">
										@csrf
										<div class="row form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address Line </label>
													<input type="text" name="address" value="{{auth::guard('doctor')->user()->address}}" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">City</label>
													<input type="text" name="city" value="{{auth::guard('doctor')->user()->city}}" class="form-control">
												</div>
											</div>
	
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">State / Province</label>
													<input type="text" name="state" value="{{auth::guard('doctor')->user()->state}}" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Country</label>
													<input type="text" name="country" value="{{auth::guard('doctor')->user()->country}}" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Postal/ Pincode</label>
													<input type="text" name="pincode" value="{{auth::guard('doctor')->user()->zipcode}}" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group mb-0">
													<div class="submit-section submit-btn-bottom ">
														<button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Contact Details -->
							
							<!-- Pricing -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Pricing / Fees</h4>
									<form action="{{route('doctor.updateFees')}}" method="post">
										@csrf
										<div class="form-group mb-0">
											<div class="row custom_price_cont" id="custom_price_cont" >
												<div class="col-md-4">
													<input type="text" class="form-control" id="custom_rating_input" name="fees" value="{{auth::guard('doctor')->user()->doctor_fees}}" placeholder="500">
													<small class="form-text text-muted">Custom price you can add between Rs.100 and Rs.5000</small>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group mb-0">
													<div class="submit-section submit-btn-bottom ">
														<button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Pricing -->
							
							<!-- Services and Specialization -->
							<div class="card services-card">
								<div class="card-body">
									<h4 class="card-title">Services and Specialization</h4>
									<form action="{{route('doctor.serviceSpecializationupdate')}}" method="post">
										@csrf
										<div class="form-group">
											<label>Services</label>
											<input type="text" data-role="tagsinput" name="services" class="input-tags form-control" placeholder="Enter Services Eg : Tooth Service, Gastronology" value="{{auth::guard('doctor')->user()->services}}"   id="services">
											<small class="form-text text-muted">Note : Type and add new services separeted with, (comma) </small>
										</div> 
										<div class="form-group mb-0">
											<label>Specialization </label>
											<input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization Eg : Children Care,Cardiologist Care" name="specialization" value="{{auth::guard('doctor')->user()->specialization}}" id="specialist">
											<small class="form-text text-muted">Note : Type and add new specialization separeted with, (comma)</small>
										</div>
										<div class="col-md-12">
											<div class="form-group mb-0">
												<div class="submit-section submit-btn-bottom ">
													<button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
												</div>
											</div>
										</div> 
									</form>
								</div>              
							</div>
							<!-- /Services and Specialization -->
						 
							<!-- Education -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Education</h4>
									<form action="{{route('doctor.eduUpdate')}}" method="post">
										@csrf
										<div class="education-info">
											<div class="row form-row education-cont">
												<div class="col-12 col-md-10 col-lg-11">
													<div class="row form-row">
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Degree</label>
																<input type="text" class="form-control" name="degree" value="{{auth::guard('doctor')->user()->edu_degree}}">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>College/Institute</label>
																<input type="text" class="form-control" name="college" value="{{auth::guard('doctor')->user()->edu_college}}">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Year of Completion</label>
																<input type="text" class="form-control" name="YearOfCompletion" value="{{auth::guard('doctor')->user()->edu_yearcompleted}}">
															</div> 
														</div>
														<div class="col-md-12">
															<div class="form-group mb-0">
																<div class="submit-section submit-btn-bottom ">
																	<button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Education -->
						
							<!-- Experience -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Experience</h4>
									<form action="{{route('doctor.ExperienceUpdate')}}" method="post">
										@csrf
										<div class="experience-info">
											<div class="row form-row experience-cont">
												<div class="col-12 col-md-10 col-lg-11">
													<div class="row form-row">
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Hospital Name</label>
																<input type="text" name="hospital" class="form-control" value="{{auth::guard('doctor')->user()->exp_hospitalname}}">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>From</label>
																<input type="date" name="fromyear"  class="form-control" value="{{auth::guard('doctor')->user()->exp_fromtime}}">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>To</label>
																<input type="date" name="toyear"  class="form-control" value="{{auth::guard('doctor')->user()->exp_totime}}">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Designation</label>
																<input type="text" class="form-control" name="designation" placeholder="Your Designation" value="{{auth::guard('doctor')->user()->exp_designation}}">
															</div> 
														</div>
														<div class="col-md-12">
															<div class="form-group mb-0">
																<div class="submit-section submit-btn-bottom ">
																	<button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Experience -->
							
							<!-- Awards -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Awards</h4>
									<form action="{{route('doctor.updateAward')}}" method="post">
										@csrf
										<div class="awards-info">
											<div class="row form-row awards-cont">
												<div class="col-12 col-md-5">
													<div class="form-group">
														<label>Awards</label>
														<input type="text" name="awards" class="form-control" value="{{auth::guard('doctor')->user()->awards_name}}">
													</div> 
												</div>
												<div class="col-12 col-md-5">
													<div class="form-group">
														<label>Year</label>
														<input type="text" name="awardsYear" class="form-control" value="{{auth::guard('doctor')->user()->awards_year}}">
													</div> 
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group mb-0">
												<div class="submit-section submit-btn-bottom ">
													<button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Awards -->
							
							<!-- Memberships -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Memberships</h4>
									<form action="{{route('doctor.membershipUpdate')}}" method="post">
										@csrf
										<div class="membership-info">
											<div class="row form-row membership-cont">
												<div class="col-12 col-md-10 col-lg-5">
													<div class="form-group">
														<label>Memberships</label>
														<input type="text" name="membership" class="form-control" value="{{auth::guard('doctor')->user()->membership_name}}">
													</div> 
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group mb-0">
												<div class="submit-section submit-btn-bottom ">
													<button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- /Memberships -->
						</div>
			<!-- /Page Content -->
	  
  
@endsection