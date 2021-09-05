@extends('layouts.admin.master')
@section('title','Admin Profile')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">General Settings</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">General Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                
                <div class="col-12">
                    @error('image')
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                @enderror
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
                    <!-- General -->
                    
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.updateSettings')}}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Website Name</label>
                                        <input type="text" name="websiteName" value="{{auth::guard('admin')->user()->appname}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number </label>
                                        <input type="text" name="contactno" value="{{auth::guard('admin')->user()->app_contactno}}" class="form-control">
                                    </div>
                                    <div class="col-auto profile-image">
                                            <img class="" alt="User Image" width="20%"
                                            src="\admin\assets\img\{{auth::guard('admin')->user()->applogoimagepath == NULL ? 'dummy-company-logo.jpg': auth::guard('admin')->user()->applogoimagepath}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Website Logo</label>
                                        <input type="file" name="websiteLogo" class="form-control">
                                        <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
                                    </div>
                                    <div class="col-auto profile-image">
                                        <img class="" alt="User Image"  width="2%"
                                        src="\admin\assets\img\{{auth::guard('admin')->user()->applogofaviconimagepath == NULL ? 'dummy-company-logo.jpg': auth::guard('admin')->user()->applogofaviconimagepath}}">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Favicon</label>
                                        <input type="file" name="faviconLogo" class="form-control">
                                        <small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
                                        <small class="text-secondary">Accepted formats : only png and jpeg</small>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    
                    <!-- /General -->
                        
                </div>
            </div>
            
        </div>			
    </div>
    <!-- /Page Wrapper -->
@endsection