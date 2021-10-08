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
                            <h3 class="page-title">List of Users in Grid</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ul>
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
                         <div class="row">
                            <a class="btn btn-primary" href="{{ URL::to('/admin/pdf') }}">Print to PDF</a>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title  justify-content-between">
                                            <a href="/admin/usersgrid" class="pull-right   text-danger" ><i class="fa fa-th ml-1 mr-1"></i></a>
                                            <a href="{{route('admin.home')}}" class="pull-right " ><i class="fa fa-list mr-1"></i></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>   
                         <div class="row">
                               @foreach ($DoctorsList as $item)
                               <div class="col-md-3">
                                <div class="card">
                                   <div class="card-body">
                                       <div class="profile-sidebar">
                                           <!-- SIDEBAR USERPIC -->
                                           <div class="profile-userpic">
                                               <img class="avatar-img img-fluid rounded-square" 
                                               src="..\assets\img\patients\{{$item['imagepath'] == NULL ? 'dummy-profile.png': $item['imagepath']}}" alt="User Image">
                                           </div>
                                           <!-- END SIDEBAR USERPIC -->
                                           <!-- SIDEBAR USER TITLE -->
                                           <div class="profile-usertitle">
                                               <div class="profile-usertitle-name">
                                                   <label >Name : </label>{{ $item['name']}}
                                               </div>
                                               <div class="profile-usertitle-job">
                                                <label >Email : </label> {{ $item['email']}}
                                               </div>
                                           </div>
                                           <!-- END SIDEBAR USER TITLE -->
                                           <!-- SIDEBAR BUTTONS -->
                                           <div class="profile-userbuttons">
                                            <button data-toggle="modal" href="#view_user_id_{{$item['id']}}" class="btn btn-success btn-sm">View</button>
                                            <button data-toggle="modal" href="#edit_specialities_details_id_{{$item['id']}}" class="btn btn-dark">Edit</button>
                                            <button data-toggle="modal" href="#delete_modal_id_{{$item['id']}}" class="btn btn-sm bg-danger-light" class="btn btn-danger">Delete</button>   
                                           </div>
                                           <!-- END SIDEBAR BUTTONS -->
                                           <!-- SIDEBAR MENU -->
                                           <div class="profile-usermenu">
                                               <ul class="nav">
                                                   <li class="active">
                                                       <a href="#">
                                                       <i class="glyphicon glyphicon-home"></i>
                                                       Overview </a>
                                                   </li>
                                                   <li>
                                                       <a href="#">
                                                       <i class="glyphicon glyphicon-user"></i>
                                                       Account Settings </a>
                                                   </li>
                                                   <li>
                                                       <a href="#" target="_blank">
                                                       <i class="glyphicon glyphicon-ok"></i>
                                                       Tasks </a>
                                                   </li>
                                                   <li>
                                                       <a href="#">
                                                       <i class="glyphicon glyphicon-flag"></i>
                                                       Help </a>
                                                   </li>
                                               </ul>
                                           </div>
                                           <!-- END MENU -->
                                       </div>       
                                   </div>
                               </div>   
                            </div>
                                    <!-- View Details Modal -->
			<div class="modal fade" id="view_user_id_{{$item['id']}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">View User ID : #SS00{{$item['id']}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							    <div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>User Details </label>
                                            <label>Name :  {{$item['address']}}</label>
                                            <br>
                                            <label>Email :  {{$item['email']}}</label>
                                            <br>
                                            <label>Contact No :  {{$item['phoneno']}}</label>
                                           
										</div>
									</div>
									<div class="col-12 col-sm-6">
                                        <div class="form-group">
											<label>Address </label>
                                            <label>Address :  {{$item['address']}}</label>
                                            <br>
                                            <label>City :  {{$item['city']}}</label>
                                            <br>
                                            <label>State :  {{$item['state']}}</label>
                                            <br>
                                            <label>Country :  {{$item['country']}}</label>
                                            <br>
                                            <label>Pincode :  {{$item['zipcode']}}</label>
                                        </div>
									</div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <a class="btn btn-primary" href="{{ URL::to('/admin/singleuserpdf/') }}/{{$item['id']}}">Print to PDF</a>
                                    </div>
								</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /View Details Modal -->


           <!-- Edit Details Modal -->
           <div class="modal fade" id="edit_specialities_details_id_{{$item['id']}}" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User ID : #00{{$item['id']}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.updateuser')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Update User : {{$item['name']}}  </label>
                                        <input type="text" class="form-control" readonly name="name" value="{{$item['name']}}">
                                        <input type="text" class="form-control" name="phoneno" value="{{$item['phoneno']}}">
                                        <input type="hidden" class="form-control" name="id" value="{{$item['id']}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Address </label>
                                        <input type="text" class="form-control" name="shipaddress" value="{{$item['address']}}">
                                        <input type="text" class="form-control" name="city" value="{{$item['city']}}">
                                        <input type="text" class="form-control" name="state" value="{{$item['state']}}">
                                        <input type="text" class="form-control" name="country" value="{{$item['country']}}">
                                        <input type="text" class="form-control" name="pincode" value="{{$item['zipcode']}}">
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Details Modal -->

                <!-- Delete Modal -->
        <div class="modal fade" id="delete_modal_id_{{$item['id']}}" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                
                                            <div class="modal-body">
                                                <div class="form-content p-2">
                                                    <h4 class="modal-title">Delete Id : #SS00{{$item['id']}}</h4>
                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <form action="{{route('admin.deleteuser')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$item['id']}}">
                                                                <button type="submit" class="btn btn-primary">Confirm </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6 col">
                                                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Delete Modal -->
                               @endforeach 

                            
                         </div>
                    </div>			
                </div>
            </div>
        </div>

        
        <!-- /Page Wrapper -->

      
			
@endsection