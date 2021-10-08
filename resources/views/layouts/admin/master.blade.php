<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>{{auth::guard('admin')->user()->appname}} |  @yield('title')</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\{{auth::guard('admin')->user()->applogofaviconimagepath}}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets\css\bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets\css\font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets\css\feathericon.min.css">
		
		<link rel="stylesheet" href="assets\plugins\morris\morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets\css\style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
        <!-- Main Wrapper -->
        <div class="main-wrapper">

            <!-- Header -->
            <div class="header">
            
                <!-- Logo -->
                <div class="header-left">
                    <a href="{{route('admin.home')}}" class="logo">
                        <img src="{{url('')}}\admin\assets\img\{{auth::guard('admin')->user()->applogoimagepath}}" 
                        alt="{{auth::guard('admin')->user()->appname}}">
                    </a>
                    <a href="{{route('admin.home')}}" class="logo logo-small">
                        <img src="{{url('')}}\admin\assets\img\{{auth::guard('admin')->user()->applogoimagepath}}" alt="{{auth::guard('admin')->user()->appname}}" width="30" height="30">
                    </a>
                </div>
                <!-- /Logo -->
                
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fe fe-text-align-left"></i>
                </a>
                
                
                <!-- Mobile Menu Toggle -->
                <a class="mobile_btn" id="mobile_btn">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- /Mobile Menu Toggle -->
                
                <!-- Header Right Menu -->
                <ul class="nav user-menu">
    
                   
                    
                    <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img"><img class="rounded-circle" src="{{url('')}}\admin\assets\img\admin\{{auth::guard('admin')->user()->imagepath}}" width="31" alt="Donald Niles"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="{{url('')}}\admin\assets\img\admin\{{auth::guard('admin')->user()->imagepath}}" alt="User Image" class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>{{ Auth::guard('admin')->user()->name }}</h6>
                                    <p class="text-muted mb-0">Administrator</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">My Profile</a>
                            <a class="dropdown-item" href="settings.html">Settings</a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form></a>
                                     
                        </div>
                    </li>
                    <!-- /User Menu -->
                    
                </ul>
                <!-- /Header Right Menu -->
                
            </div>
            <!-- /Header -->
            
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="{{ 'admin/home' == request()->path() ? 'active':''}}">
                                <a href="{{route('admin.home')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                            </li>
                            <li class="{{ 'admin/doctors' == request()->path() ? 'active':''}}">
                                <a href="{{route('admin.doctors')}}"><i class="fe fe-user-plus"></i> <span>Users</span></a>
                            </li>
                            <li> 
                                <a href="{{route('admin.settings')}}"><i class="fe fe-vector"></i> <span>Settings</span></a>
                            </li>
                            <li class="{{ 'admin/profile' == request()->path() ? 'active':''}}">  
                                <a href="{{ route('admin.profile') }}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Sidebar -->
            
            @yield('content')
            
        </div>
         <!-- /Main Wrapper -->
        


<script src="assets\js\jquery-3.2.1.min.js"></script>
		
<!-- Bootstrap Core JS -->
<script src="assets\js\popper.min.js"></script>
<script src="assets\js\bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets\plugins\slimscroll\jquery.slimscroll.min.js"></script>

<script src="assets\plugins\raphael\raphael.min.js"></script>    
<script src="assets\plugins\morris\morris.min.js"></script>  
<script src="assets\js\chart.morris.js"></script>

<!-- Custom JS -->
<script src="assets\js\script.js"></script>

<script>
    printme(){
        window.print();
    }
</script>
</body>
</html>