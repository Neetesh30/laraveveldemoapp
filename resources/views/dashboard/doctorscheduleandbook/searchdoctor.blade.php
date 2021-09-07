{{-- @foreach ($adminappdatas as $item)
@php
    $appname = $item['appname'];
    $logoimagepath = $item['applogoimagepath'];
    $faviconimagepath = $item['applogofaviconimagepath'];
    $app_contact = $item['app_contactno'];
@endphp
@endforeach --}}


@extends('layouts.DoctorScheduleAndBooking.master')

{{-- @section('favicon-logo',$faviconimagepath)
@section('headerlogo')
<img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo">
@endsection
@section('menu-logo')
<img src="\admin\assets\img\{{$logoimagepath == NULL ? 'dummy-company-logo.jpg': $logoimagepath}}" class="img-fluid" alt="Logo">
@endsection
@section('contact-info-header')
{{$app_contact}}
@endsection --}}


@section('title','Search Doctor')
@section('breadcrumb','Search Doctor')
@section('content')    
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
                                <form action="{{route('patient.searchdoctor')}}" method="get">
                                    
                                    <div class="card-body">
                                        <div class="filter-widget">
                                            <h4>Gender</h4>
                                            <div>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="gender_type[]" value="male" >
                                                    <span class="checkmark"></span> Male Doctor
                                                </label>
                                            </div>
                                            <div>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="gender_type[]" value="female">
                                                    <span class="checkmark"></span> Female Doctor
                                                </label>
                                            </div>
                                        </div>
                                        <div class="filter-widget">
                                            <h4>Select Specialist</h4>
											@foreach ($specialitylist as $item)
												<div>
													<label class="custom_check">
														<input type="checkbox" name="select_specialist[]" value="{{$item['specialityid']}}" >
														<span class="checkmark"></span> {{$item['name']}}
													</label>
												</div>
											@endforeach
                                        </div>
                                        <div class="btn-search">
                                            <button type="submit" class="btn btn-block">Search</button>
                                        </div>	
                                    </div>
                                </form>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">

							<!-- Doctor Widget -->
							@if ($DoctorsList->count() == 0)
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="#">
													<img src="..\assets\img\doctors\dummy-profile.png" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="#">No - Doctors to display</a></h4>
												<p class="doc-speciality">Sorry no match found </p>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif

								@foreach ($DoctorsList as $item)
								<div class="card">
									<div class="card-body">
										<div class="doctor-widget">
											<div class="doc-info-left">
												<div class="doctor-img">
													<a href="#">
														<img src="..\assets\img\doctors\{{$item['imagepath'] == NULL ? 'dummy-profile.png': $item['imagepath']}}" class="img-fluid" alt="User Image">
													</a>
												</div>
												<div class="doc-info-cont">
														<h4 class="doc-name"><a href="#">{{$item['aliasdoctorname']}}</a></h4>
														<p class="doc-speciality">Dummy MDS - Periodontology and Oral Implantology, BDS</p>
														<p class="doc-department"><img src="..\admin\assets\img\speciality\{{$item['aliaspecialityimage'] == NULL ? 'dummy-profile.png': $item['aliaspecialityimage']}}" class="img-fluid" alt="{{$item['name']}}">{{$item['name']}}</p>
														<div class="rating">
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star filled"></i>
															<i class="fas fa-star"></i>
															<span class="d-inline-block average-rating">(17)</span>
														</div>
														<div class="clinic-details">
															<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$item['city']}},{{$item['country']}}</p>
															
															@php
																$clinicimages = explode(',',$item['clinic_imagepath']);
															@endphp
															
															<ul class="clinic-gallery">
																@foreach ($clinicimages as $clinicimage)
																<li>
																	<a href="{{url('')}}\assets\img\features\{{$clinicimage}}" data-fancybox="gallery">
																		<img src="{{url('')}}\assets\img\features\{{$clinicimage}}" alt="Feature">
																	</a>
																</li>	
																@endforeach
															</ul>
														</div>
														<div class="clinic-services">
															@php
																$clinicservices = explode(',',$item['services']);
															@endphp

															@foreach ($clinicservices as $clinicservice)
																<span>{{$clinicservice}}</span>	
															@endforeach
														</div>
													</div>
												</div>
												<div class="doc-info-right">
													<div class="clini-infos">
														<ul>
															<li><i class="far fa-thumbs-up"></i>dummy 98%</li>
															<li><i class="far fa-comment"></i>dummy 17 Feedback</li>
															<li><i class="fas fa-map-marker-alt"></i> {{$item['city']}},{{$item['country']}}</li>
															<li><i class="far fa-money-bill-alt"></i> {{$item['doctor_fees']}} <i class="fas fa-info-circle" data-toggle="tooltip" title="Doctor Fees"></i> </li>
														</ul>
													</div>
													<div class="clinic-booking">
														<a class="view-pro-btn" href="#">dummy View Profile</a>
														<a class="apt-btn" href="{{url('patient/bookdoctorslot'.'/'.$item['id'])}}">Book Appointment</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
								<div class="pagination-block">
									{{$DoctorsList->links('layouts.DoctorScheduleAndBooking.paginationlinks')}}
								</div>
							<!-- /Doctor Widget -->
						</div>
					</div>

				</div>

			</div>		
@endsection