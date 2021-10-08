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


@section('title','Patient Profile')
@section('breadcrumb','Patient Profile')
@section('content')
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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Patient Information</h4>
            <div class="row form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="change-avatar">
                            <div class="profile-img">
                                <img src="\assets\img\patients\{{auth::guard('patient')->user()->imagepath == NULL ? 'dummy-profile.png': auth::guard('patient')->user()->imagepath}}" alt="User Image">
                            </div>
                        </div>
                    </div>
                    <a href="#appt_details" data-toggle="modal"  data-target="#appt_details" class="btn btn-primary">
                        <span><i class="fa fa-upload"></i> Edit Photo</span>
                    </a>
                    <small class="form-text text-muted">Allowed JPG,JPEG, or PNG. Max size of .5MB</small>
                </div>
                    <form action="{{route('patient.updateBasicInformation')}}" method="post">
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" readonly="" value="{{auth::guard('patient')->user()->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{auth::guard('patient')->user()->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phoneno" class="form-control" value="{{auth::guard('patient')->user()->phoneno}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <div class="submit-section submit-btn-bottom  float-left">
                                    <button type="submit" class="btn btn-primary float-right submit-btn ">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header bg-primary">
            <h5 class="card-title text-white"> Address</h5>
        </div>

        <div class="card-body">
            <form action="{{route('patient.updateAddressInformation')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="autocomplete"> Location/Address </label>
                    <input type="text"  id="ship-address" name="shipaddress"  class="form-control" placeholder="Type your location " value="{{auth::guard('patient')->user()->address}}" >
                </div>
    
                <div class="form-group" id="lat_area">
                    <label for="state"> State </label>
                    <input type="text" id="state" name="state" class="form-control" value="{{auth::guard('patient')->user()->state}}">
                </div>
    
                <div class="form-group" id="long_area">
                    <label for="locality"> City </label>
                    <input type="text" id="city" name="city"  class="form-control" value="{{auth::guard('patient')->user()->city}}">
                </div>
                
                <div class="form-group" id="">
                    <label for="pincode"> Pincode </label>
                    <input type="text" id="pincode" name="pincode"  class="form-control" value="{{auth::guard('patient')->user()->zipcode}}">
                </div>
                
                <div class="form-group" id="">
                    <label for="country"> Country </label>
                    <input type="text" id="country" name="country"  class="form-control" value="{{auth::guard('patient')->user()->country}}">
                </div>
            </div>
    
            <div class="card-footer">
                <button type="submit" class="btn btn-primary submit-btn"> Save Changes </button>
            </div>
            </form>
    </div>

    
</div>
@endsection
