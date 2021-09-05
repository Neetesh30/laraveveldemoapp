@extends('layouts.admin.master')
@section('title','Admin Speciality')

@section('content')
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Specialities</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
									<li class="breadcrumb-item active">Specialities</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
                                <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">

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


                                    
                                    
                                    
									<div class="table-responsive">
                                        
                                        <table class="datatable table table-hover table-center mb-0">
											<thead>
                                                <tr>
                                                    <th>#</th>
													<th>Specialities</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($collections as $item)
                                                    <tr>
                                                        <td>#SS00{{$item['id']}}</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#" class="avatar avatar-sm mr-2">
                                                                    <img class="avatar-img" src="{{url('')}}\admin\assets\img\speciality\{{$item['imagepath']}}" alt="Speciality">
                                                                </a>
                                                                <a href="#">{{$item['name']}}</a>
                                                            </h2>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details_id_{{$item['id']}}">
                                                                    <i class="fe fe-pencil"></i> Edit
                                                                </a>
                                                                <a data-toggle="modal" href="#delete_modal_id_{{$item['id']}}" class="btn btn-sm bg-danger-light">
                                                                    <i class="fe fe-trash"></i> Delete
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
            <!-- Edit Details Modal -->
			<div class="modal fade" id="edit_specialities_details_id_{{$item['id']}}" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Specialities ID : #SS00{{$item['id']}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('admin.updatespeciality')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Specialities</label>
											<input type="text" class="form-control" name="name" value="{{$item['name']}}">
											<input type="hidden" class="form-control" name="id" value="{{$item['id']}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Image</label>
                                            <img class="avatar-img" src="{{url('')}}\admin\assets\img\speciality\{{$item['imagepath']}}" height="90" alt="Speciality">
                                            <input type="file" name="image" class="form-control">
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
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete Id : #SS00{{$item['id']}}</h4>
								<p class="mb-4">Are you sure want to delete?</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{route('admin.deletespeciality')}}" method="post">
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
							<h5 class="modal-title">Add Specialities</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('admin.createspeciality')}}" method="POST" enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Specialities</label>
											<input type="text" name="name" class="form-control">
											{{-- <input type="hidden" name="adminid" value="{{auth::guard('admin')->user()->id}}" class="form-control"> --}}
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Image</label>
											<input type="file" name="image" class="form-control">
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