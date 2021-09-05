@extends('layouts.admin.master')
@section('title','Doctors List')

@section('content')
    	<!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">List of Doctors</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Doctor</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add Doctor</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                    
                        @if (Session::get('danger'))
                        <div class="alert alert-danger">
                            {{Session::get('danger')}}
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
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Speciality</th>
                                                <th>Member Since</th>
                                                <th>Earned</th>
                                                <th>Account Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($DoctorsList as $item)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img rounded-circle" 
                                                            src="..\assets\img\doctors\{{$item['imagepath'] == NULL ? 'dummy-profile.png': $item['imagepath']}}" alt="User Image">
                                                        </a>
                                                        <a href="#">{{$item['aliasdoctorname']}}</a>
                                                    </h2>
                                                </td>
                                                <td>{{$item['name']}}</td>
                                                
                                                <td>Dummy - 14 Jan 2019 <br><small>Dummy - 02.59 AM</small></td>
                                                
                                                <td>Dummy -  $3100.00</td>
                                                
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" {{ $item['status'] == 'active' ? 'checked' : '' }} >
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                            </tr>    
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets\img\doctors\doctor-thumb-01.jpg" alt="User Image"></a>
                                                        <a href="profile.html">Dr. Ruby Perrin</a>
                                                    </h2>
                                                </td>
                                                <td>Dummy Cardiologist</td>
                                                
                                                <td>Dummy - 14 Jan 2019 <br><small>Dummy - 02.59 AM</small></td>
                                                
                                                <td>Dummy -  $3100.00</td>
                                                
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked="">
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                            </tr>
                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>			
                </div>
                
            </div>			
        </div>

        
        <!-- /Page Wrapper -->

        <!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Doctor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('admin.createdoctor')}}" method="POST" >
                                @csrf
								<div class="row form-row">
                                    <div class="col-md-12">
                                        <label>Speciality</label>
                                        <select name="speciality" class="form-control">
                                            <option>-- Select --</option>
                                            @foreach ($SpecialityList as $item)
                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
									<div class="col-md-12 ">
										<div class="form-group">
											<label>Doctor Full Name</label>
											<input type="text" name="name" class="form-control" value={{old('name')}}>
											{{-- <input type="hidden" name="adminid" value="{{auth::guard('admin')->user()->id}}" class="form-control"> --}}
										</div>
									</div>
									<div class="col-md-12 ">
										<div class="form-group">
											<label>Doctor Email</label>
											<input type="text" name="email" class="form-control" value={{old('email')}}>
											{{-- <input type="hidden" name="adminid" value="{{auth::guard('admin')->user()->id}}" class="form-control"> --}}
										</div>
									</div>
									<div class="col-md-12 ">
										<div class="form-group">
											<label>Doctor Phone No</label>
											<input type="text" name="phoneno" maxlength="10" class="form-control" value={{old('phoneno')}}>
											{{-- <input type="hidden" name="adminid" value="{{auth::guard('admin')->user()->id}}" class="form-control"> --}}
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
@endsection