@foreach ($adminappdatas as $item)
@php
    $appname = $item['appname'];
    $logoimagepath = $item['applogoimagepath'];
    $faviconimagepath = $item['applogofaviconimagepath'];
    $app_contact = $item['app_contactno'];
@endphp
@endforeach

@extends('layouts.DoctorScheduleAndBooking.master')

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


@section('title','Book Doctor Slot')
@section('breadcrumb','Book Doctor Slot')
@section('content')
<div class="content">
    <div class="container">
    
        <div class="row">
            <div class="col-12">
            
                <div class="card">
                    <div class="card-body">
                        <div class="booking-doc-info">
                            @foreach ($bookingdoctordatas as $item)
                                <a href="#" class="booking-doc-img">
                                    <img src="\assets\img\doctors\{{$item['imagepath'] == NULL ? 'dummy-profile.png': $item['imagepath']}}" alt="Dr.{{$item['name']}}">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="doctor-profile.html">Dr. {{$item['name']}}</a></h4>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">Dummy 35</span>
                                    </div>
                                    <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{$item['city']}}, {{$item['country']}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Schedule Widget -->
                <div class="card booking-schedule schedule-widget">
                
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
                                
                                <!-- Sunday Slot -->
                                <div id="slot-sunday" class="tab-pane fade show active {{ 'doctor/schedule-timings/slot-sunday' == request()->path() ? 'show active':''}} {{ 'doctor/schedule-timings' == request()->path() ? 'show active':''}}  ">
                                    
                                    <!-- Schedule Header -->
                                        <div class="schedule-header">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- Day Slot -->
                                                    <div class="day-slot">
                                                        <ul>
                                                            @for ($day = 0; $day < 7; $day++)
                                                                @php
                                                                    $date = strtotime("+$day day");
                                                                    date('D M d, Y', $date);
                                                                @endphp
                                                                <li>
                                                                    <span>{{date('D', $date)}}</span>
                                                                    <span class="slot-date"> {{date('d M Y', $date)}}</span>
                                                                </li>
                                                            @endfor
{{-- 
                                                            @if ($mondayCount != 0)
                                                            <li>
                                                                <span>Mon</span>
                                                                <span class="slot-date">11 Nov <small class="slot-year">2019</small></span>
                                                            </li>
                                                            @endif
                                                            @if ($tuesdayCount != 0)
                                                            <li>
                                                                <span>Tue</span>
                                                            </li>
                                                            @endif
                                                            @if ($wednesdayCount != 0)
                                                            <li>
                                                                <span>Wed</span>
                                                            </li>
                                                            @endif
                                                            @if ($thursdayCount != 0)
                                                            <li>
                                                                <span>Thu</span>
                                                            </li>
                                                            @endif
                                                            @if ($fridayCount != 0)
                                                            <li>
                                                                <span>Fri</span>
                                                            </li>
                                                            @endif
                                                            @if ($saturdayCount != 0)
                                                            <li>
                                                                <span>Sat</span>
                                                            </li>
                                                            @endif
                                                            @if ($sundayCount != 0)
                                                            <li>
                                                                <span>Sun</span>
                                                            </li>
                                                            @endif --}}
                                                        </ul>
                                                    </div>
                                                    <!-- /Day Slot -->
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Schedule Header -->
                                        
                                        <!-- Schedule Content -->
                                        <div class="schedule-cont">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route(('patient.checkout'))}}" method="get">
                                                        
                                                        <!-- Time Slot -->
                                                    <div class="time-slot">
                                                        <ul class="clearfix">   
                                                            @for ($day = 0; $day < 7; $day++)
                                                                @php
                                                                    $date = strtotime("+$day day");
                                                                    date('D M d, Y', $date);
                                                                @endphp

                                                                @if (date('D', $date) == 'Sun' )
                                                                    <li>
                                                                        @foreach ($sundaybookingslots as $row)
                                                                                    @php
                                                                                    date_default_timezone_set('Asia/Kolkata');
                                                                                    date('h:i a', $date);
                                                                                    $decreasecurrentslots = explode('-',$row['starttime']);
                                                                                @endphp

                                                                                @if (date('y-m-d', $date) == date('y-m-d'))
                                                                                    @if (strtotime($decreasecurrentslots[0]) <= strtotime(date('h:i a', $date)))
                                                                                        -
                                                                                        @else
                                                                                        @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                            <label class=" timing selected ">
                                                                                                <span>{{$row['starttime']}}</span>  
                                                                                            </label>
                                                                                            @else
                                                                                                <label class="timing ">
                                                                                                    <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                                </label>
                                                                                        @endif
                                                                                    @endif
                                                                                @else
                                                                                    @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                    <label class=" timing selected ">
                                                                                        <span>{{$row['starttime']}}</span>  
                                                                                    </label>
                                                                                    @else
                                                                                        <label class="timing ">
                                                                                            <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                            <span>{{$row['starttime']}}</span>  
                                                                                        </label>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach     
                                                                    </li>
                                                                @endif
                                                                
                                                                @if (date('D', $date) == 'Mon' )
                                                                    <li>
                                                                        @foreach ($mondaybookingslots as $row)
                                                                            @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                <label class=" timing selected ">
                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                </label>
                                                                                @else
                                                                                <label class="timing ">
                                                                                    <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                </label>
                                                                                @endif
                                                                        @endforeach     
                                                                    </li>
                                                                @endif
                                                                
                                                                @if (date('D', $date) == 'Tue' )
                                                                    <li>
                                                                        @foreach ($tuesdaybookingslots as $row)
                                                                            @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                <label class=" timing selected ">
                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                </label>
                                                                                @else
                                                                                <label class="timing ">
                                                                                    <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                </label>
                                                                                @endif
                                                                        @endforeach     
                                                                    </li>
                                                                @endif
                                                               
                                                                @if (date('D', $date) == 'Wed' )
                                                                    <li>
                                                                        @foreach ($wednesdaybookingslots as $row)
                                                                            @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                <label class=" timing selected ">
                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                </label>
                                                                                @else
                                                                                <label class="timing ">
                                                                                    <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                </label>
                                                                            @endif
                                                                        @endforeach     
                                                                    </li>
                                                                @endif
                                                                
                                                                @if (date('D', $date) == 'Thu' )
                                                                    <li>
                                                                        @foreach ($thursdaybookingslots as $row)
                                                                            @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                <label class=" timing selected ">
                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                </label>
                                                                                @else
                                                                                <label class="timing ">
                                                                                    <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                </label>
                                                                            @endif
                                                                        @endforeach     
                                                                    </li>
                                                                @endif
                                                                
                                                                @if (date('D', $date) == 'Fri' )
                                                                    <li>
                                                                        @foreach ($fridaybookingslots as $row)
                                                                                    @php
                                                                                    date_default_timezone_set('Asia/Kolkata');
                                                                                    date('h:i a', $date);
                                                                                    $decreasecurrentslots = explode('-',$row['starttime']);
                                                                                @endphp

                                                                                @if (date('y-m-d', $date) == date('y-m-d'))
                                                                                    @if (strtotime($decreasecurrentslots[0]) <= strtotime(date('h:i a', $date)))
                                                                                        -
                                                                                        @else
                                                                                        @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                            <label class=" timing selected ">
                                                                                                <span>{{$row['starttime']}}</span>  
                                                                                            </label>
                                                                                            @else
                                                                                                <label class="timing ">
                                                                                                    <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                                </label>
                                                                                        @endif
                                                                                    @endif
                                                                                @else
                                                                                    @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                    <label class=" timing selected ">
                                                                                        <span>{{$row['starttime']}}</span>  
                                                                                    </label>
                                                                                    @else
                                                                                        <label class="timing ">
                                                                                            <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                            <span>{{$row['starttime']}}</span>  
                                                                                        </label>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach     
                                                                    </li>
                                                                @endif
                                                               
                                                                @if (date('D', $date) == 'Sat' )
                                                                    <li>
                                                                        @foreach ($saturdaybookingslots as $row)
                                                                                @php
                                                                                    date_default_timezone_set('Asia/Kolkata');
                                                                                    date('h:i a', $date);
                                                                                    $decreasecurrentslots = explode('-',$row['starttime']);
                                                                                @endphp

                                                                                @if (date('y-m-d', $date) == date('y-m-d'))
                                                                                    @if (strtotime($decreasecurrentslots[0]) <= strtotime(date('h:i a', $date)))
                                                                                        -
                                                                                        @else
                                                                                        @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                            <label class=" timing selected ">
                                                                                                <span>{{$row['starttime']}}</span>  
                                                                                            </label>
                                                                                            @else
                                                                                                <label class="timing ">
                                                                                                    <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                                    <span>{{$row['starttime']}}</span>  
                                                                                                </label>
                                                                                        @endif
                                                                                    @endif
                                                                                @else
                                                                                    @if(strtotime($row['booking_date']) == strtotime(date('y-m-d', $date)))
                                                                                    <label class=" timing selected ">
                                                                                        <span>{{$row['starttime']}}</span>  
                                                                                    </label>
                                                                                    @else
                                                                                        <label class="timing ">
                                                                                            <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                            <span>{{$row['starttime']}}</span>  
                                                                                        </label>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach      
                                                                    </li>
                                                                @endif

                                                            @endfor
                                                                
                                                        </ul>
                                                        {{-- <ul class="clearfix">
                                                            @if ($mondayCount != 0 )
                                                                <li>
                                                                    @foreach ($mondaybookingslots as $row)
                                                                    <label class=" timing {{ $row['booking_status'] == 'booked' ? 'selected':''}}">
                                                                        @if ($row['booking_status'] == 'booked')
                                                                            
                                                                        @else
                                                                        <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                            
                                                                        @endif
                                                                        <span>{{$row['starttime']}}</span>  
                                                                    </label>
                                                                    @endforeach     
                                                                </li>
                                                                @else
                                                            @endif
                                                            
                                                            @if ($tuesdayCount != 0 )
                                                                <li>
                                                                    @foreach ($tuesdaybookingslots as $row)
                                                                    <label class=" timing {{ $row['booking_status'] == 'booked' ? 'selected':''}}">
                                                                        @if ($row['booking_status'] == 'booked')
                                                                            
                                                                        @else
                                                                        <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                            
                                                                        @endif
                                                                        <span>{{$row['starttime']}}</span>  
                                                                    </label>
                                                                    @endforeach     
                                                                </li>
                                                                @else
                                                            @endif
                                                            
                                                            @if ($wednesdayCount != 0 )
                                                                <li>
                                                                    @foreach ($wednesdaybookingslots as $row)
                                                                    <label class=" timing {{ $row['booking_status'] == 'booked' ? 'selected':''}}">
                                                                        @if ($row['booking_status'] == 'booked')
                                                                            
                                                                        @else
                                                                        <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                            
                                                                        @endif
                                                                        <span>{{$row['starttime']}}</span>  
                                                                    </label>
                                                                    @endforeach     
                                                                </li>
                                                                @else
                                                            @endif
                                                            
                                                            @if ($thursdayCount != 0 )
                                                                <li>
                                                                    @foreach ($thursdaybookingslots as $row)
                                                                    <label class=" timing {{ $row['booking_status'] == 'booked' ? 'selected':''}}">
                                                                        @if ($row['booking_status'] == 'booked')
                                                                            
                                                                        @else
                                                                        <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                            
                                                                        @endif
                                                                        <span>{{$row['starttime']}}</span>  
                                                                    </label>     
                                                                    @endforeach     
                                                                </li>
                                                                @else
                                                            @endif
                                                            
                                                            @if ($fridayCount != 0 )
                                                                <li>
                                                                    @foreach ($fridaybookingslots as $row)
                                                                    <label class=" timing {{ $row['booking_status'] == 'booked' ? 'selected':''}}">
                                                                        @if ($row['booking_status'] == 'booked')
                                                                            
                                                                        @else
                                                                        <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                            
                                                                        @endif
                                                                        <span>{{$row['starttime']}}</span>  
                                                                    </label>  
                                                                    @endforeach     
                                                                </li>
                                                                @else
                                                            @endif
                                                            
                                                            @if ($saturdayCount != 0 )
                                                                <li>
                                                                    @foreach ($saturdaybookingslots as $row)
                                                                        <label class=" timing {{ $row['booking_status'] == 'booked' ? 'selected':''}}">
                                                                            @if ($row['booking_status'] == 'booked')
                                                                                
                                                                            @else
                                                                            <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                                
                                                                            @endif
                                                                            <span>{{$row['starttime']}}</span>  
                                                                        </label>     
                                                                    @endforeach     
                                                                </li>
                                                                @else
                                                            @endif
                                                            
                                                            @if ($sundayCount != 0 )
                                                                <li>
                                                                    @foreach ($sundaybookingslots as $row)
                                                                    <label class=" timing {{ $row['booking_status'] == 'booked' ? 'selected':''}}">
                                                                        @if ($row['booking_status'] == 'booked')
                                                                            
                                                                        @else
                                                                        <input type="radio" class="" name="bookingslot" value="{{$row['id']}}">
                                                                            
                                                                        @endif
                                                                        <span>{{$row['starttime']}}</span>  
                                                                    </label>     
                                                                    @endforeach     
                                                                </li>
                                                                @else
                                                                <p class="text-muted mb-0">Not Available</p>
                                                            @endif
                                                        </ul> --}}
                                                    </div>
                                                    <!-- /Time Slot -->
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Schedule Content -->
                                </div>
                                <!-- /Sunday Slot -->
                            </div>
                        </div>
                    </div>
                 <!-- /Day Slot -->
                </div>
                <!-- /Schedule Widget -->
                
                <!-- Submit Section -->
                <div class="submit-section proceed-btn text-right">
                    <button class="btn btn-primary submit-btn" type="submit">Proceed to Pay</button>
                </div>
                <!-- /Submit Section -->
            </form>
            </div>
        </div>
    </div>

</div>	
@endsection