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

@section('title','Doctor Dashboard')
@section('breadcrumb','Doctor Dashboard')
@section('content')
<!-- Page Content -->
            <div class="col-md-7 col-lg-8 col-xl-9">
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
                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar1">
                                                <div class="circle-graph1" data-percent="75">
                                                    <img src="{{url('')}}\assets\img\icon-01.png" class="img-fluid" alt="patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Total Patient</h6>
                                                <h3>{{$totalAppointmentCount}}</h3>
                                                <p class="text-muted">Till Today</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar2">
                                                <div class="circle-graph2" data-percent="65">
                                                    <img src="{{url('')}}\assets\img\icon-02.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Today Patient</h6>
                                                <h3>{{$todayAppointmentCount}}</h3>
                                                <p class="text-muted">{{date('D d, M Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="circle-bar circle-bar3">
                                                <div class="circle-graph3" data-percent="50">
                                                    <img src="{{url('')}}\assets\img\icon-03.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Appoinments</h6>
                                                <h3>{{$totalAppointmentCount}}</h3>
                                                <p class="text-muted">{{date('D d, M Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Patient Appoinment</h4>
                        <div class="appointment-tab">
                        
                            <!-- Appointment Tab -->
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                                </li> 
                            </ul>
                            <!-- /Appointment Tab -->
                            
                            <div class="tab-content">
                            
                                <!-- Upcoming Appointment Tab -->
                                <div class="tab-pane show active" id="upcoming-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <th>Purpose</th>
                                                            <th>Type</th>
                                                            <th class="text-center">Paid Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($Booked_Appointments->count() == 0)
                                                        <tr>
                                                            <td>You have no appointments</td>
                                                        </tr>
                                                        @endif
                                                        @foreach ($Booked_Appointments as $item)

                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="..\assets\img\patients\{{$item['imagepath'] == NULL ? 'dummy-profile.png': $item['imagepath']}}" alt="User Image"></a>
                                                                    <a href="#">{{$item['patientname']}}<span>#PT000{{$item['patiennt_id']}}</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>{{date('D d M Y', strtotime($item['appointment_date']))}} <span class="d-block text-info">{{$item['appointment_time']}}</span></td>
                                                            <td> {{$item['appointment_purpose']}}</td>
                                                            <td>Dummy Old Patient</td>
                                                            <td class="text-center">Rs {{$item['payment_amount']}}</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>		
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Upcoming Appointment Tab -->
                           
                                <!-- Today Appointment Tab -->
                                <div class="tab-pane" id="today-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <th>Purpose</th>
                                                            <th>Type</th>
                                                            <th class="text-center">Paid Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($today_booked_appointments->count() == 0)
                                                        <tr>
                                                            <td>You have no appointments</td>
                                                        </tr>
                                                        @endif
                                                        @foreach ($today_booked_appointments as $item)

                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="..\assets\img\patients\{{$item['imagepath'] == NULL ? 'dummy-profile.png': $item['imagepath']}}" alt="User Image"></a>
                                                                    <a href="#">{{$item['patientname']}}<span>#PT000{{$item['patiennt_id']}}</span></a>
                                                                </h2>
                                                            </td>
                                                            <td>{{date('D d M Y', strtotime($item['appointment_date']))}} <span class="d-block text-info">{{$item['appointment_time']}}</span></td>
                                                            <td> {{$item['appointment_purpose']}}</td>
                                                            <td>Dummy Old Patient</td>
                                                            <td class="text-center">Rs {{$item['payment_amount']}}</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>
                                                                    
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accept
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>		
                                            </div>	
                                        </div>	
                                    </div>	
                                </div>
                                <!-- /Today Appointment Tab -->
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<!-- /Page Content -->    
@endsection