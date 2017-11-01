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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css"> 
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link href="css/bootstrap-navbar.css" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
   <nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="{{url('/home')}}"><span><img src="img/pipe.png" height="24"/></span> ระบบจัดการ<span class="text-danger">อ</span>ะไหล่รถยนต์</a>
</div>
<div>
<ul class="nav navbar-nav navbar-right">
<li><a href="{{url('/transport')}}"><i class="fa fa-comments" aria-hidden="true"></i>&nbspรายการที่ต้องส่ง</a></li>
<li><a href="{{url('/search2')}}"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>&nbsp สั่งสินค้า</a></li> 
<li><a href="{{url('/store')}}"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>&nbsp คลังสินค้า</a></li>
<li><button type="button" class="btn btn-outline-primary btn-margin-right navbar-btn"><a href="{{url('/regiscustomer')}}">ลูกค้ารายใหม่</a></button></li></li>@if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
<li class="dropdown">
<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
<ul class="dropdown-menu">

<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Account Settings</a></li>
<li>

<a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                        
</ul>
</li>
@endif
</ul>
</div>
</div>
</nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-navbar.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
