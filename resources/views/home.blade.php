<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script> 
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    
    <!--Animation css-->
    <link href="css/animate.css" rel="stylesheet">

    <!--Icon-fonts css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="css/morris.css">

    <!-- sweet alerts -->
    <link href="css/sweet-alert.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">

    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.5.1.min.js"></script>
        
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-62751496-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>

<body>
        <!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="{{url('/home')}}" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span class="nav-label">อะไหล่รถยนต์</span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="@yield('home')"><a href="{{url('/home')}}"><i class="zmdi zmdi-view-dashboard"></i> <span class="nav-label">หน้าแรก</span></a></li>
                    <li class="has-submenu @yield('body')">
                        <a href="#"><i class="zmdi zmdi-format-list-bulleted "></i> <span class="nav-label">สินค้า</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('store')}}">คลังสินค้า</a></li>
                            <li><a href="{{url('/outofstock')}}">สินค้าใกล้หมด<span class="badge bg-danger"><?php $amount = DB::table('products')->where('amount','<=',10)->get(); ?> {{count($amount)}} </span></a></li>
                            <li><a href="{{url('/bestproduct')}}">สินค้าขายดี<span class="badge bg-success">10</span></li></a>
                            <!-- <li><a href="ui-panels.html">Panels</a></li>
                            <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-bootstrap.html">BS Elements</a></li>
                            <li><a href="ui-progressbars.html">Progress Bars</a></li>
                            <li><a href="ui-notification.html">Notification</a></li>
                            <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li> -->
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="{{url('buystore')}}"><i class="zmdi zmdi-shopping-cart-plus"></i> <span class="nav-label">สั่งซื้อสินค้า</span></a>
                        <!-- <ul class="list-unstyled">
                            <li><a href="components-grid.html">Grid</a></li>
                            <li><a href="components-portlets.html">Portlets</a></li>
                            <li><a href="components-widgets.html">Widgets</a></li>
                            <li><a href="components-nestable-list.html">Nesteble</a></li>
                            <li><a href="components-calendar.html">Calendar</a></li>
                            <li><a href="components-sliders.html">Range Slider</a></li>
                        </ul> -->
                    </li>
                    <li class="has-submenu"><a href="#"><i class="zmdi zmdi-collection-text"></i> <span class="nav-label">บิลสินค้า</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/transport')}}">บิลทั้งหมด</a></li>
                            <li><a href="{{url('/gettran')}}">บิลส่งแล้ว</a></li>
                            <li><a href="{{url('/posttran')}}">บิลเตรียมส่ง</a></li>
                            <!-- <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                            <li><a href="form-codeeditor.html">Code Editors</a></li>
                            <li><a href="form-uploads.html">Multiple File Upload</a></li>
                            <li><a href="form-imagecrop.html">Image Crop</a></li>
                            <li><a href="form-xeditable.html">X-Editable</a></li> -->
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="fa fa-truck"></i> <span class="nav-label">การขนส่ง</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/regiscustomer')}}">บันทึกข้อมูลลูกค้ารายใหม่</a></li>
                            <li><a href="{{url('/test')}}">ระยะทาง(km)</a></li>
                            <li><a href="tables-editable.html">ค้นหาสถานที่</a></li>
                            <!-- <li><a href="tables-responsive.html">Responsive Table</a></li> -->
                        </ul>
                    </li>
                    <!-- <li class="has-submenu"><a href="#"><i class="zmdi zmdi-chart"></i> <span class="nav-label">Charts</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="charts-morris.html">Morris Chart</a></li>
                            <li><a href="charts-chartjs.html">Chartjs</a></li>
                            <li><a href="charts-flot.html">Flot Chart</a></li>
                            <li><a href="charts-rickshaw.html">Rickshaw Chart</a></li>
                            <li><a href="charts-peity.html">Peity Chart</a></li>
                            <li><a href="charts-c3.html">C3 Chart</a></li>
                            <li><a href="charts-other.html">Other Chart</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu"><a href="#"><i class="zmdi zmdi-email"></i> <span class="nav-label">Mail</span><span class="badge bg-success">7</span></a>
                        <ul class="list-unstyled">
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-compose.html">Compose Mail</a></li>
                            <li><a href="email-read.html">View Mail</a></li>
                            <li><a href="email-templates.html">Email Templates</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu"><a href="#"><i class="zmdi zmdi-map"></i> <span class="nav-label">Maps</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="maps-google.html"> Google Map</a></li>
                            <li><a href="maps-vector.html"> Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="#"><i class="zmdi zmdi-collection-item"></i> <span class="nav-label">Pages</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="pages-profile.html">Profile</a></li>
                            <li><a href="pages-timeline.html">Timeline</a></li>
                            <li><a href="pages-invoice.html">Invoice</a></li>
                            <li><a href="pages-contact.html">Contact-list</a></li>
                            <li><a href="pages-login.html">Login</a></li>
                            <li><a href="pages-register.html">Register</a></li>
                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                            <li><a href="pages-blank.html">Blank Page</a></li>
                            <li><a href="pages-404.html">404 Error</a></li>
                            <li><a href="pages-404_alt.html">404 alt</a></li>
                            <li><a href="pages-500.html">500 Error</a></li>
                        </ul>
                    </li>
                </ul> -->
            </nav>
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- Search -->
                <form role="search" class="navbar-left app-search pull-left hidden-xs" action="{{url('/store')}}" method="post">
                    {{ csrf_field() }}
                  <input type="text" placeholder="ค้นหาชื่อสินค้า" class="form-control" name="data">
                  <a href=""><i class="fa fa-search"></i></a>
                </form>
                
                <!-- Left navbar -->
                <nav class=" navbar-default" role="navigation">
                    <ul class="nav navbar-nav hidden-xs">
                        <!-- <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">ค้นหาสินค้า <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">รายชื่อสินค้า</a></li>
                                <li><a href="#">รายชื่อลูกค้า</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Files</a></li> -->
                    </ul>

                    <!-- Right navbar -->
                    <ul class="nav navbar-nav navbar-right top-menu top-right-menu" >
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <!-- mesages -->  
                        <!-- <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="zmdi zmdi-email-open"></i>
                                <span class="badge badge-sm up bg-purple count">4</span>
                            </a>
                            <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5001">
                                <li>
                                    <p>Messages</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><img src="img/avatar-2.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                        <span class="block"><strong>John smith</strong></span>
                                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 seconds ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><img src="img/avatar-3.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                        <span class="block"><strong>John smith</strong></span>
                                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">3 minutes ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><img src="img/avatar-4.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                        <span class="block"><strong>John smith</strong></span>
                                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 minutes ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <p><a href="inbox.html" class="text-right">See all Messages</a></p>
                                </li>
                            </ul>
                        </li> -->
                        <!-- /messages -->
                        <!-- Notification -->
                        <!-- แจ้งเตือน -->
                        <!-- <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="zmdi zmdi-notifications-none"></i>
                                <span class="badge badge-sm up bg-pink count">3</span>
                            </a>
                            <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
                                <li class="noti-header">
                                    <p>Notifications</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><i class="fa fa-user-plus fa-2x text-info"></i></span>
                                        <span>New user registered<br><small class="text-muted">5 minutes ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><i class="fa fa-diamond fa-2x text-primary"></i></span>
                                        <span>Use animate.css<br><small class="text-muted">5 minutes ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><i class="fa fa-bell-o fa-2x text-danger"></i></span>
                                        <span>Send project demo files to client<br><small class="text-muted">1 hour ago</small></span>
                                    </a>
                                </li>
                                
                                <li>
                                    <p><a href="#" class="text-right">See all notifications</a></p>
                                </li>
                            </ul>
                        </li> -->
                        <!-- /Notification -->

                        <!-- user login dropdown start-->
                        <li class="dropdown text-center">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="img/pin.jpg" class="img-circle profile-img thumb-sm">
                                <span class="username">{{ Auth::user()->name }}</span> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                                <li><a href="profile"><i class="fa fa-briefcase"></i>โปรไฟล์</a></li>
                              <!--   <li><a href="profile"><i class="fa fa-cog"></i> ตั้งค่าบัญชีผู้ใช้</a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li> -->
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                        @endguest       
                    </ul>
                    <!-- End right navbar -->
                </nav>
            
            </header>
            <!-- Header Ends --> 
            <div class="wraper container-fluid">   
            <div class="page-title"> 
                    <h3 class="title">ยินดีต้อนรับ !</h3> 
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    หมวดหมู่สินค้าที่ทำการขายทั้งหมด
                                </h3>
                            </div>
                            <div id="portlet1" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                     <div id="chart" style="height: 280px;"></div>

                                    <div class="row text-center m-t-30 m-b-30">
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>{{$steel}} ชิ้น</h4>
                                            <small class="text-muted">ท่อไอเสีย</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>{{$sum}} ชิ้น</h4>
                                            <small class="text-muted">เหล็ก</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>{{$spares}} ชิ้น</h4>
                                            <small class="text-muted">อะไหล่รถยนต์</small>
                                        </div>
                                        <!-- <div class="col-sm-3 col-xs-6">
                                            <h4>$ 87,000</h4>
                                            <small class="text-muted">ยอดขายในปีนี้</small>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /Portlet -->

                    </div> <!-- end col -->


                    <div class="col-lg-6">
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    รายงานการขายประจำปี
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div id = "divname" style="height: 280px;"></div>
                                    
                                    <div class="row text-center m-t-30 m-b-30">
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>{{$time17[0]->paidsum}} บาท</h4>
                                            <small class="text-muted">ยอดเงินปี2017</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>{{$time18[0]->paidsum}} บาท</h4>
                                            <small class="text-muted">ยอดเงินปี2018</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>0 บาท</h4>
                                            <small class="text-muted">ยอดเงินปี2019</small>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <h4>0 บาท</h4>
                                            <small class="text-muted">ยอดเงินปี2020</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /Portlet -->
                        
                    </div>

                    
                </div> <!-- end row -->


               <!--  <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0"><span class="counter">25</span>% more</h3> 
                                <p>Monthly visitor statistics</p>
                            </div> 
                            <div class="chart-inline">
                                <span class="inlinesparkline"></span> 
                            </div>
                        </div> 
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0 counter">49</h3> 
                                <p>Avg. Sales per day</p>
                            </div> 
                            <span class="dynamicbar-big"></span> 
                        </div> 
                    </div>


                        

                    <div class="col-lg-3 col-sm-6">
                        <div class="tile-stats white-bg"> 
                            <div class="status">
                                <h3 class="m-t-0 counter">0.9</h3> 
                           
                                <p>Stock Market </p>
                
                            </div> 
                            <span id="compositeline"></span> 
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="tile-stats white-bg"> 
                            <div class="col-sm-8">
                                <div class="status">
                                <h3 class="m-t-15"><span class="counter">91.5</span>%</h3> 
                                <p>US Dollar Share</p>
                            </div> 
                            </div>
                            <div class="col-sm-4 m-t-20">
                                <span class="sparkpie-big"></span> 
                            </div>
                        </div> 
                    </div>
                </div> -->


                <!-- WEATHER -->
                <div class="row">
                            
                    <div class="col-lg-6">
                        
                        <!-- BEGIN WEATHER WIDGET 1 -->
                        <div class="panel bg-success-alt">
                            <div class="panel-body">
                            
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-xs-6 text-center">
                                                <canvas id="partly-cloudy-day" width="115" height="115"></canvas>
                                            </div>
                                            <div class="col-xs-6">
                                                <h2 class="m-t-0 text-white"><b>32°</b></h2>
                                                <p class="text-white">Partly cloudy</p>
                                                <p class="text-white">15km/h - 37%</p>
                                            </div>
                                        </div><!-- End row -->
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">SAT</h4>
                                                <canvas id="cloudy" width="35" height="35"></canvas>
                                                <h4 class="text-white">30<i class="wi-degrees"></i></h4>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">SUN</h4>
                                                <canvas id="wind" width="35" height="35"></canvas>
                                                <h4 class="text-white">28<i class="wi-degrees"></i></h4>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">MON</h4>
                                                <canvas id="clear-day" width="35" height="35"></canvas>
                                                <h4 class="text-white">33<i class="wi-degrees"></i></h4>
                                            </div>
                                        </div><!-- end row -->
                                    </div>
                                </div><!-- end row -->
                            </div><!-- panel-body -->
                        </div><!-- panel-->
                        <!-- END Weather WIDGET 1 -->
                        
                    </div><!-- End col-md-6 -->

                    <div class="col-lg-6">
                        
                        <!-- WEATHER WIDGET 2 -->
                        <div class="panel bg-primary-alt">
                            <div class="panel-body">
                            
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-xs-6 text-center">
                                                    <canvas id="snow" width="115" height="115"></canvas>
                                                </div>
                                                <div class="col-xs-6">
                                                    <h2 class="m-t-0 text-white"><b> 23°</b></h2>
                                                    <p class="text-white">Partly cloudy</p>
                                                    <p class="text-white">15km/h - 37%</p>
                                                </div>
                                            </div><!-- end row -->
                                        </div><!-- weather-widget -->
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">SAT</h4>
                                                <canvas id="sleet" width="35" height="35"></canvas>
                                                <h4 class="text-white">30<i class="wi-degrees"></i></h4>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">SUN</h4>
                                                <canvas id="fog" width="35" height="35"></canvas>
                                                <h4 class="text-white">28<i class="wi-degrees"></i></h4>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <h4 class="text-white m-t-0">MON</h4>
                                                <canvas id="partly-cloudy-night" width="35" height="35"></canvas>
                                                <h4 class="text-white">33<i class="wi-degrees"></i></h4>
                                            </div>
                                        </div><!-- End row -->
                                    </div> <!-- col-->
                                </div><!-- End row -->
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                        <!-- END WEATHER WIDGET 2 -->
                            
                    </div><!-- /.col-md-6 -->
                </div> <!-- End row -->  

<!-- ตาราง table -->
               <!--  <div class="row">
                    
                    <div class="col-lg-12">

                        <div class="portlet">
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    Projects
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Velonic Admin v1</td>
                                                    <td>01/01/2015</td>
                                                    <td>26/04/2015</td>
                                                    <td><span class="label label-info">Released</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Velonic Frontend v1</td>
                                                    <td>01/01/2015</td>
                                                    <td>26/04/2015</td>
                                                    <td><span class="label label-success">Released</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Velonic Admin v1.1</td>
                                                    <td>01/05/2015</td>
                                                    <td>10/05/2015</td>
                                                    <td><span class="label label-pink">Pending</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Velonic Frontend v1.1</td>
                                                    <td>01/01/2015</td>
                                                    <td>31/05/2015</td>
                                                    <td><span class="label label-purple">Work in Progress</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Velonic Admin v1.3</td>
                                                    <td>01/01/2015</td>
                                                    <td>31/05/2015</td>
                                                    <td><span class="label label-warning">Coming soon</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>

                                                <tr>
                                                    <td>6</td>
                                                    <td>Velonic Admin v1.3</td>
                                                    <td>01/01/2015</td>
                                                    <td>31/05/2015</td>
                                                    <td><span class="label label-primary">Coming soon</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>

                                                <tr>
                                                    <td>7</td>
                                                    <td>Velonic Admin v1.3</td>
                                                    <td>01/01/2015</td>
                                                    <td>31/05/2015</td>
                                                    <td><span class="label label-info">Cool</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>

                                                <tr>
                                                    <td>8</td>
                                                    <td>Velonic Admin v1.3</td>
                                                    <td>01/01/2015</td>
                                                    <td>31/05/2015</td>
                                                    <td><span class="label label-warning">Coming soon</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    
                </div>  -->

            </div>
            <!-- Footer Start -->
            <footer class="footer">
                2018 © Jiratchaya.
            </footer>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

        <!-- Counter-up -->
        <script src="js/waypoints.min.js" type="text/javascript"></script>
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>

         <!-- sparkline --> 
        <script src="js/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/sparkline-chart/chart-sparkline.js" type="text/javascript"></script> 

        <!-- skycons -->
        <script src="js/skycons.min.js" type="text/javascript"></script>
    
        <!--Morris Chart-->
        <script src="js/morris.min.js"></script>
        <script src="js/raphael.min.js"></script>


        <script src="js/jquery.app.js"></script>
        
        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>


        <script type="text/javascript">
            jQuery(document).ready(function($) {
                /* Counter Up */
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
            /* BEGIN SVG WEATHER ICON */
            if (typeof Skycons !== 'undefined'){
            var icons = new Skycons(
                {"color": "#fff"},
                {"resizeClear": true}
                ),
                    list  = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

                for(i = list.length; i--; )
                icons.set(list[i], list[i]);
                icons.play();
            };
        </script>

        <script type="text/javascript">
            var time18 = {!! $time18 !!};
            var time17 = {!! $time17 !!};
            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'divname',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [ {'year': '2017', 'value': {!! $time17[0]->paidsum !!} },
                        {'year': '2018', 'value': {!! $time18[0]->paidsum !!} },
                        {'year': '2019', 'value': 0 },
                        {'year': '2020', 'value': 0 }
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'year',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['value'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Value']
            });
        </script>
        <script type="text/javascript">
            var spares = {!! $spares !!};
            var steel = {!! $steel !!};
            var sum = {!! $sum !!};
            Morris.Donut({
      element: 'chart',
      data: [
        {label: "ท่อไอเสีย", value: {!! $spares !!}},
        {label: "เหล็ก", value: {!! $steel !!}},
        {label: "อะไหล่รถยนต์", value: {!! $sum !!}}
      ]
     });
        </script>
    </body>
</html>



