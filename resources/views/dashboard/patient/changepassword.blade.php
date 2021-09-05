@foreach ($adminappdatas as $item)
@php
    $appname = $item['appname'];
    $logoimagepath = $item['applogoimagepath'];
    $faviconimagepath = $item['applogofaviconimagepath'];
    $app_contact = $item['app_contactno'];
@endphp
@endforeach


@extends('layouts.patient.master')

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


@section('title','Patient Change Password')
@section('breadcrumb','Change Password')
@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12 col-lg-6">
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
					<!-- Change Password Form -->
					<form action="{{route('patient.updatepassword')}}"  method="POST">
						@csrf
						<div class="form-group">
                            <label>Old Password</label>
							<div class="input-group mb-3 show_hide_password" id="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> </span>
                                </div>
                                <input type="password" class="form-control" name="oldpassword" placeholder="Old Password" aria-label="Old Password" aria-describedby="basic-addon1">
                            </div>
						</div>
						
						<div class="form-group">
                            <label>New Password</label>
							<div class="input-group mb-3 show_hide_password" id="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> </span>
                                </div>
                                <input type="password" class="form-control" name="newpassword" placeholder="New Password" aria-label="New Password" aria-describedby="basic-addon1">
                            </div>
						</div>
						
						<div class="form-group">
                            <label>Confirm Password</label>
							<div class="input-group mb-3 show_hide_password" id="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> </span>
                                </div>
                                <input type="password" class="form-control" name="cnfpassword" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1">
                            </div>
						</div>

						<div class="submit-section">
							<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
						</div>
					</form>
					<!-- /Change Password Form -->
				</div>
			</div>
		</div>
	</div>
</div>

@endsection