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


@section('title','Doctor Schedule Timing')
@section('breadcrumb','Schedule Timings')

@section('content')
	<!-- Page Content -->
        <div class="col-md-7 col-lg-8 col-xl-9">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Schedule Timings </h4>
                            <div class="profile-box">
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
                                        <div class="card schedule-widget mb-0">
                                            <!-- Schedule Header -->
                                            <div class="schedule-header">

                                                <!-- Schedule Nav -->
                                                <div class="schedule-nav">
                                                    <ul class="nav nav-tabs nav-justified">
                                                        <li class="nav-item">
                                                            <a class="nav-link  {{ 'doctor/schedule-timings/slot-sunday' == request()->path() ? 'active':''}} {{ 'doctor/schedule-timings' == request()->path() ? 'active':''}} "  href="/doctor/schedule-timings/slot-sunday">Sunday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link {{ 'doctor/schedule-timings/slot-monday' == request()->path() ? 'active':''}} "  href="/doctor/schedule-timings/slot-monday">Monday </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link {{ 'doctor/schedule-timings/slot-tuesday' == request()->path() ? 'active':''}} "  href="/doctor/schedule-timings/slot-tuesday">Tuesday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link {{ 'doctor/schedule-timings/slot-wednesday' == request()->path() ? 'active':''}}"  href="/doctor/schedule-timings/slot-wednesday">Wednesday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link {{ 'doctor/schedule-timings/slot-thursday' == request()->path() ? 'active':''}}"  href="/doctor/schedule-timings/slot-thursday">Thursday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link {{ 'doctor/schedule-timings/slot-friday' == request()->path() ? 'active':''}}"  href="/doctor/schedule-timings/slot-friday">Friday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link {{ 'doctor/schedule-timings/slot-saturday' == request()->path() ? 'active':''}}"  href="/doctor/schedule-timings/slot-saturday">Saturday</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /Schedule Nav -->
                                                
                                            </div>
                                            <!-- /Schedule Header -->
                                            
                                            <!-- Schedule Content -->
                                            <div class="tab-content schedule-cont">
                                            
                                                <!-- Sunday Slot -->
                                                <div id="slot-sunday" class="tab-pane fade {{ 'doctor/schedule-timings/slot-sunday' == request()->path() ? 'show active':''}} {{ 'doctor/schedule-timings' == request()->path() ? 'show active':''}}  ">
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span> 
                                                        
                                                        @forelse ($schedulecollections as $isempty)

                                                        @empty
                                                            <a class="edit-link" data-toggle="modal" href="#add_time_slot_sun"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                        @endforelse

                                                    </h4>
                                                    
                                                    <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE -->
                                                    
                                                    @foreach ($schedulecollections as $row)
                                                        <div class="doc-times">
                                                            @if ($schedulecollections != NULL )
                                                            @foreach(explode(',',$row['starttime']) as $slottiming)
                                                                    <div class="doc-slot-list">
                                                                        {{$row['starttime']}}
                                                                        <a href="{{ route('doctor.removeSchedule') }}" onclick="event.preventDefault();document.getElementById('{{$slottiming}}-form-{{$row['id']}}').submit();">
                                                                            <form action="{{ route('doctor.removeSchedule') }}" id="{{$slottiming}}-form-{{$row['id']}}" method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="scheduleid"  value="{{$row['id']}}" id="">
                                                                                @if ($loop->count == $loop->iteration )
                                                                                <input type="hidden" name="rmvlastcount" value="{{$loop->count .'-'. $loop->iteration}}" id="">
                                                                                <input type="hidden" name="rmvlastslottime" value="{{$slottiming}}" id="">
                                                                                @else 
                                                                                <input type="hidden" name="rmvslottime" value="{{$slottiming}}," id="">
                                                                                @endif
                                                                                </form>
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                @endforeach
                                                            @else
                                                                <p class="text-muted mb-0">Not Available</p>
                                                            @endif
                                                        </div>
                                                    @endforeach

                                                    <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE -->
                                                    
                                                    <!-- Add Time Slot Modal -->
                                                        <div class="modal fade custom-modal" id="add_time_slot_sun">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Add Time Slots</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{route('doctor.createSchedule')}}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="dayoftheweek" value="sunday">
                                                                            <div class="hours-info">
                                                                                <div class="row form-row hours-cont">
                                                                                    <div class="col-12 col-md-10">
                                                                                        <div class="row form-row">
                                                                                            <div class="col-lg-4">
                                                                                                <div class="form-group">               
                                                                                                    <label>Timing Slot Duration </label>
                                                                                                    <select name="slotduration" class="select form-control">
                                                                                                        <option>-</option>
                                                                                                        <option selected="selected" value="10">10 mins</option>
                                                                                                        <option value="15">15 mins</option>
                                                                                                        <option value="30">30 mins</option>  
                                                                                                        <option value="45">45 mins</option>
                                                                                                        <option value="60">1 Hour</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row form-row">
                                                                                            
                                                                                            <div class="col-12 col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label>Start Time</label>
                                                                                                    <input type="time" name="starttime"  name="" id="">
                                                                                                </div> 
                                                                                            </div>
                                                                                            <div class="col-12 col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label>End Time</label>
                                                                                                    <input type="time" name="endtime"  name="" id="">
                                                                                                </div> 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="submit-section text-center">
                                                                                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Add Time Slot Modal -->
                                                        
                                                </div>
                                                <!-- /Sunday Slot -->

                                                <!-- Monday Slot -->
                                                <div id="slot-monday" class="tab-pane fade {{ 'doctor/schedule-timings/slot-monday' == request()->path() ? 'show active':''}}">
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span> 
                                                        
                                                        @forelse ($schedulecollections as $isempty)

                                                        @empty
                                                            <a class="edit-link" data-toggle="modal" href="#add_time_slot_mon"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                        @endforelse

                                                    </h4>
                                                    
                                                    <!-- Slot List -->
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE -->
                                                       @foreach ($schedulecollections as $row)
                                                       <div class="doc-times">
                                                           @if ($schedulecollections != NULL )
                                                                   <div class="doc-slot-list">
                                                                       {{$row['starttime']}}
                                                                       <a href="{{ route('doctor.removeSchedule') }}" onclick="event.preventDefault();document.getElementById('{{$slottiming}}-form-{{$row['id']}}').submit();">
                                                                           <form action="{{ route('doctor.removeSchedule') }}" id="{{$slottiming}}-form-{{$row['id']}}" method="post">
                                                                               @csrf
                                                                               <input type="hidden" name="scheduleid"  value="{{$row['id']}}" id="">
                                                                               @if ($loop->count == $loop->iteration )
                                                                               <input type="hidden" name="rmvlastcount" value="{{$loop->count .'-'. $loop->iteration}}" id="">
                                                                               <input type="hidden" name="rmvlastslottime" value="{{$slottiming}}" id="">
                                                                               @else 
                                                                               <input type="hidden" name="rmvslottime" value="{{$slottiming}}," id="">
                                                                               @endif
                                                                               </form>
                                                                               <i class="fa fa-times"></i>
                                                                           </a>
                                                                   </div>
                                                           @else
                                                               <p class="text-muted mb-0">Not Available</p>
                                                           @endif
                                                       </div>
                                                   @endforeach
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE for monday -->
                                                    <!-- /Slot List -->

                                                        <!-- Add Time Slot Modal -->
                                                        <div class="modal fade custom-modal" id="add_time_slot_mon">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add Time Slots</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('doctor.createSchedule')}}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="dayoftheweek" value="monday">
                                                                        <div class="hours-info">
                                                                            <div class="row form-row hours-cont">
                                                                                <div class="col-12 col-md-10">
                                                                                    <div class="row form-row">
                                                                                        <div class="col-lg-4">
                                                                                            <div class="form-group">               
                                                                                                <label>Timing Slot Duration </label>
                                                                                                <select name="slotduration" class="select form-control">
                                                                                                    <option>-</option>
                                                                                                    <option selected="selected" value="10">10 mins</option>
                                                                                                    <option value="15">15 mins</option>
                                                                                                    <option value="30">30 mins</option>  
                                                                                                    <option value="45">45 mins</option>
                                                                                                    <option value="60">1 Hour</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-row">
                                                                                        
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>Start Time</label>
                                                                                                <input type="time" name="starttime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>End Time</label>
                                                                                                <input type="time" name="endtime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="submit-section text-center">
                                                                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Add Time Slot Modal -->
                                                </div>
                                                <!-- /Monday Slot -->

                                                <!-- Tuesday Slot -->
                                                <div id="slot-tuesday" class="tab-pane fade {{ 'doctor/schedule-timings/slot-tuesday' == request()->path() ? 'show active':''}}">
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span> 
                                                        
                                                        @forelse ($schedulecollections as $isempty)

                                                        @empty
                                                            <a class="edit-link" data-toggle="modal" href="#add_time_slot_tue"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                        @endforelse

                                                    </h4>
                                                    
                                                    <!-- Slot List -->
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE -->
                                                       @foreach ($schedulecollections as $row)
                                                       <div class="doc-times">
                                                           @if ($schedulecollections != NULL )
                                                                   <div class="doc-slot-list">
                                                                       {{$row['starttime']}}
                                                                       <a href="{{ route('doctor.removeSchedule') }}" onclick="event.preventDefault();document.getElementById('{{$slottiming}}-form-{{$row['id']}}').submit();">
                                                                           <form action="{{ route('doctor.removeSchedule') }}" id="{{$slottiming}}-form-{{$row['id']}}" method="post">
                                                                               @csrf
                                                                               <input type="hidden" name="scheduleid"  value="{{$row['id']}}" id="">
                                                                               @if ($loop->count == $loop->iteration )
                                                                               <input type="hidden" name="rmvlastcount" value="{{$loop->count .'-'. $loop->iteration}}" id="">
                                                                               <input type="hidden" name="rmvlastslottime" value="{{$slottiming}}" id="">
                                                                               @else 
                                                                               <input type="hidden" name="rmvslottime" value="{{$slottiming}}," id="">
                                                                               @endif
                                                                               </form>
                                                                               <i class="fa fa-times"></i>
                                                                           </a>
                                                                   </div>
                                                           @else
                                                               <p class="text-muted mb-0">Not Available</p>
                                                           @endif
                                                       </div>
                                                   @endforeach
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE for tuesdsay -->
                                                    <!-- /Slot List -->

                                                        <!-- Add Time Slot Modal -->
                                                        <div class="modal fade custom-modal" id="add_time_slot_tue">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add Time Slots</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('doctor.createSchedule')}}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="dayoftheweek" value="tuesday">
                                                                        <div class="hours-info">
                                                                            <div class="row form-row hours-cont">
                                                                                <div class="col-12 col-md-10">
                                                                                    <div class="row form-row">
                                                                                        <div class="col-lg-4">
                                                                                            <div class="form-group">               
                                                                                                <label>Timing Slot Duration </label>
                                                                                                <select name="slotduration" class="select form-control">
                                                                                                    <option>-</option>
                                                                                                    <option selected="selected" value="10">10 mins</option>
                                                                                                    <option value="15">15 mins</option>
                                                                                                    <option value="30">30 mins</option>  
                                                                                                    <option value="45">45 mins</option>
                                                                                                    <option value="60">1 Hour</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-row">
                                                                                        
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>Start Time</label>
                                                                                                <input type="time" name="starttime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>End Time</label>
                                                                                                <input type="time" name="endtime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="submit-section text-center">
                                                                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Add Time Slot Modal -->
                                                </div>
                                                <!-- /Tuesday Slot -->

                                                <!-- Wednesday Slot -->
                                                <div id="slot-wednesday" class="tab-pane fade {{ 'doctor/schedule-timings/slot-wednesday' == request()->path() ? 'show active':''}}">
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span> 
                                                        
                                                        @forelse ($schedulecollections as $isempty)

                                                        @empty
                                                            <a class="edit-link" data-toggle="modal" href="#add_time_slot_wed"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                        @endforelse

                                                    </h4>
                                                    
                                                    <!-- Slot List -->
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE -->
                                                       @foreach ($schedulecollections as $row)
                                                       <div class="doc-times">
                                                           @if ($schedulecollections != NULL )
                                                                   <div class="doc-slot-list">
                                                                    {{$row['starttime']}}
                                                                       <a href="{{ route('doctor.removeSchedule') }}" onclick="event.preventDefault();document.getElementById('{{$slottiming}}-form-{{$row['id']}}').submit();">
                                                                           <form action="{{ route('doctor.removeSchedule') }}" id="{{$slottiming}}-form-{{$row['id']}}" method="post">
                                                                               @csrf
                                                                               <input type="hidden" name="scheduleid"  value="{{$row['id']}}" id="">
                                                                               @if ($loop->count == $loop->iteration )
                                                                               <input type="hidden" name="rmvlastcount" value="{{$loop->count .'-'. $loop->iteration}}" id="">
                                                                               <input type="hidden" name="rmvlastslottime" value="{{$slottiming}}" id="">
                                                                               @else 
                                                                               <input type="hidden" name="rmvslottime" value="{{$slottiming}}," id="">
                                                                               @endif
                                                                               </form>
                                                                               <i class="fa fa-times"></i>
                                                                           </a>
                                                                   </div>
                                                           @else
                                                               <p class="text-muted mb-0">Not Available</p>
                                                           @endif
                                                       </div>
                                                   @endforeach
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE for tuesdsay -->
                                                    <!-- /Slot List -->

                                                        <!-- Add Time Slot Modal -->
                                                        <div class="modal fade custom-modal" id="add_time_slot_wed">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add Time Slots</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('doctor.createSchedule')}}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="dayoftheweek" value="wednesday">
                                                                        <div class="hours-info">
                                                                            <div class="row form-row hours-cont">
                                                                                <div class="col-12 col-md-10">
                                                                                    <div class="row form-row">
                                                                                        <div class="col-lg-4">
                                                                                            <div class="form-group">               
                                                                                                <label>Timing Slot Duration </label>
                                                                                                <select name="slotduration" class="select form-control">
                                                                                                    <option>-</option>
                                                                                                    <option selected="selected" value="10">10 mins</option>
                                                                                                    <option value="15">15 mins</option>
                                                                                                    <option value="30">30 mins</option>  
                                                                                                    <option value="45">45 mins</option>
                                                                                                    <option value="60">1 Hour</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-row">
                                                                                        
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>Start Time</label>
                                                                                                <input type="time" name="starttime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>End Time</label>
                                                                                                <input type="time" name="endtime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="submit-section text-center">
                                                                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Add Time Slot Modal -->
                                                </div>
                                                <!-- /Wednesday Slot -->

                                                <!-- Thursday Slot -->
                                                <div id="slot-thursday" class="tab-pane fade {{ 'doctor/schedule-timings/slot-thursday' == request()->path() ? 'show active':''}}">
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span> 
                                                        
                                                        @forelse ($schedulecollections as $isempty)

                                                        @empty
                                                            <a class="edit-link" data-toggle="modal" href="#add_time_slot_thu"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                        @endforelse

                                                    </h4>
                                                    
                                                    <!-- Slot List -->
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE -->
                                                       @foreach ($schedulecollections as $row)
                                                       <div class="doc-times">
                                                           @if ($schedulecollections != NULL )
                                                                   <div class="doc-slot-list">
                                                                    {{$row['starttime']}}
                                                                       <a href="{{ route('doctor.removeSchedule') }}" onclick="event.preventDefault();document.getElementById('{{$slottiming}}-form-{{$row['id']}}').submit();">
                                                                           <form action="{{ route('doctor.removeSchedule') }}" id="{{$slottiming}}-form-{{$row['id']}}" method="post">
                                                                               @csrf
                                                                               <input type="hidden" name="scheduleid"  value="{{$row['id']}}" id="">
                                                                               @if ($loop->count == $loop->iteration )
                                                                               <input type="hidden" name="rmvlastcount" value="{{$loop->count .'-'. $loop->iteration}}" id="">
                                                                               <input type="hidden" name="rmvlastslottime" value="{{$slottiming}}" id="">
                                                                               @else 
                                                                               <input type="hidden" name="rmvslottime" value="{{$slottiming}}," id="">
                                                                               @endif
                                                                               </form>
                                                                               <i class="fa fa-times"></i>
                                                                           </a>
                                                                   </div>
                                                           @else
                                                               <p class="text-muted mb-0">Not Available</p>
                                                           @endif
                                                       </div>
                                                   @endforeach
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE for tuesdsay -->
                                                    <!-- /Slot List -->

                                                        <!-- Add Time Slot Modal -->
                                                        <div class="modal fade custom-modal" id="add_time_slot_thu">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add Time Slots</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('doctor.createSchedule')}}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="dayoftheweek" value="thursday">
                                                                        <div class="hours-info">
                                                                            <div class="row form-row hours-cont">
                                                                                <div class="col-12 col-md-10">
                                                                                    <div class="row form-row">
                                                                                        <div class="col-lg-4">
                                                                                            <div class="form-group">               
                                                                                                <label>Timing Slot Duration </label>
                                                                                                <select name="slotduration" class="select form-control">
                                                                                                    <option>-</option>
                                                                                                    <option selected="selected" value="10">10 mins</option>
                                                                                                    <option value="15">15 mins</option>
                                                                                                    <option value="30">30 mins</option>  
                                                                                                    <option value="45">45 mins</option>
                                                                                                    <option value="60">1 Hour</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-row">
                                                                                        
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>Start Time</label>
                                                                                                <input type="time" name="starttime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>End Time</label>
                                                                                                <input type="time" name="endtime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="submit-section text-center">
                                                                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Add Time Slot Modal -->
                                                </div>
                                                <!-- /Thursday Slot -->

                                                <!-- Friday Slot -->
                                                <div id="slot-friday" class="tab-pane fade {{ 'doctor/schedule-timings/slot-friday' == request()->path() ? 'show active':''}}">
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span> 
                                                        
                                                        @forelse ($schedulecollections as $isempty)

                                                        @empty
                                                            <a class="edit-link" data-toggle="modal" href="#add_time_slot_fri"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                        @endforelse

                                                    </h4>
                                                    
                                                    <!-- Slot List -->
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE -->
                                                       @foreach ($schedulecollections as $row)
                                                       <div class="doc-times">
                                                           @if ($schedulecollections != NULL )
                                                                   <div class="doc-slot-list">
                                                                    {{$row['starttime']}}
                                                                       <a href="{{ route('doctor.removeSchedule') }}" onclick="event.preventDefault();document.getElementById('{{$slottiming}}-form-{{$row['id']}}').submit();">
                                                                           <form action="{{ route('doctor.removeSchedule') }}" id="{{$slottiming}}-form-{{$row['id']}}" method="post">
                                                                               @csrf
                                                                               <input type="hidden" name="scheduleid"  value="{{$row['id']}}" id="">
                                                                               @if ($loop->count == $loop->iteration )
                                                                               <input type="hidden" name="rmvlastcount" value="{{$loop->count .'-'. $loop->iteration}}" id="">
                                                                               <input type="hidden" name="rmvlastslottime" value="{{$slottiming}}" id="">
                                                                               @else 
                                                                               <input type="hidden" name="rmvslottime" value="{{$slottiming}}," id="">
                                                                               @endif
                                                                               </form>
                                                                               <i class="fa fa-times"></i>
                                                                           </a>
                                                                   </div>
                                                           @else
                                                               <p class="text-muted mb-0">Not Available</p>
                                                           @endif
                                                       </div>
                                                   @endforeach
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE for tuesdsay -->
                                                    <!-- /Slot List -->

                                                        <!-- Add Time Slot Modal -->
                                                        <div class="modal fade custom-modal" id="add_time_slot_fri">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add Time Slots</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('doctor.createSchedule')}}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="dayoftheweek" value="friday">
                                                                        <div class="hours-info">
                                                                            <div class="row form-row hours-cont">
                                                                                <div class="col-12 col-md-10">
                                                                                    <div class="row form-row">
                                                                                        <div class="col-lg-4">
                                                                                            <div class="form-group">               
                                                                                                <label>Timing Slot Duration </label>
                                                                                                <select name="slotduration" class="select form-control">
                                                                                                    <option>-</option>
                                                                                                    <option selected="selected" value="10">10 mins</option>
                                                                                                    <option value="15">15 mins</option>
                                                                                                    <option value="30">30 mins</option>  
                                                                                                    <option value="45">45 mins</option>
                                                                                                    <option value="60">1 Hour</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-row">
                                                                                        
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>Start Time</label>
                                                                                                <input type="time" name="starttime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>End Time</label>
                                                                                                <input type="time" name="endtime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="submit-section text-center">
                                                                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Add Time Slot Modal -->
                                                </div>
                                                <!-- /Friday Slot -->

                                                <!-- Saturday Slot -->
                                                <div id="slot-saturday" class="tab-pane fade {{ 'doctor/schedule-timings/slot-saturday' == request()->path() ? 'show active':''}}">
                                                    <h4 class="card-title d-flex justify-content-between">
                                                        <span>Time Slots</span> 
                                                        
                                                        @forelse ($schedulecollections as $isempty)

                                                        @empty
                                                            <a class="edit-link" data-toggle="modal" href="#add_time_slot_sat"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                                        @endforelse

                                                    </h4>
                                                    
                                                    <!-- Slot List -->
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE -->
                                                       @foreach ($schedulecollections as $row)
                                                       <div class="doc-times">
                                                           @if ($schedulecollections != NULL )
                                                                   <div class="doc-slot-list">
                                                                    {{$row['starttime']}}
                                                                       <a href="{{ route('doctor.removeSchedule') }}" onclick="event.preventDefault();document.getElementById('{{$slottiming}}-form-{{$row['id']}}').submit();">
                                                                           <form action="{{ route('doctor.removeSchedule') }}" id="{{$slottiming}}-form-{{$row['id']}}" method="post">
                                                                               @csrf
                                                                               <input type="hidden" name="scheduleid"  value="{{$row['id']}}" id="">
                                                                               @if ($loop->count == $loop->iteration )
                                                                               <input type="hidden" name="rmvlastcount" value="{{$loop->count .'-'. $loop->iteration}}" id="">
                                                                               <input type="hidden" name="rmvlastslottime" value="{{$slottiming}}" id="">
                                                                               @else 
                                                                               <input type="hidden" name="rmvslottime" value="{{$slottiming}}," id="">
                                                                               @endif
                                                                               </form>
                                                                               <i class="fa fa-times"></i>
                                                                           </a>
                                                                   </div>
                                                           @else
                                                               <p class="text-muted mb-0">Not Available</p>
                                                           @endif
                                                       </div>
                                                   @endforeach
                                                       <!-- DB DATA SLOT LIST OF DOCTOR SCHEDULE for tuesdsay -->
                                                    <!-- /Slot List -->

                                                        <!-- Add Time Slot Modal -->
                                                        <div class="modal fade custom-modal" id="add_time_slot_sat">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add Time Slots</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('doctor.createSchedule')}}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="dayoftheweek" value="saturday">
                                                                        <div class="hours-info">
                                                                            <div class="row form-row hours-cont">
                                                                                <div class="col-12 col-md-10">
                                                                                    <div class="row form-row">
                                                                                        <div class="col-lg-4">
                                                                                            <div class="form-group">               
                                                                                                <label>Timing Slot Duration </label>
                                                                                                <select name="slotduration" class="select form-control">
                                                                                                    <option>-</option>
                                                                                                    <option selected="selected" value="10">10 mins</option>
                                                                                                    <option value="15">15 mins</option>
                                                                                                    <option value="30">30 mins</option>  
                                                                                                    <option value="45">45 mins</option>
                                                                                                    <option value="60">1 Hour</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-row">
                                                                                        
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>Start Time</label>
                                                                                                <input type="time" name="starttime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label>End Time</label>
                                                                                                <input type="time" name="endtime"  name="" id="">
                                                                                            </div> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="submit-section text-center">
                                                                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Add Time Slot Modal -->
                                                </div>
                                                <!-- /Saturday Slot -->

                                            </div>
                                            <!-- /Schedule Content -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    <!-- /Page Content -->


@endsection