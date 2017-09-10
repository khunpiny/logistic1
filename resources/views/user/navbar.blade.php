<!DOCTYPE html>
<html>
<head>
    <link href="{{asset('css/bootstrap-menu.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-navbar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <title></title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{url('store')}}"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> store</a>
                </li>
                <li class="dropdown">

                <li><a href="#"><span aria-hidden="true"></span> Orders</a></li>
                <li class="dropdown">

                <li><a href="{{url('insertdata')}}"><span aria-hidden="true"></span> Insert Orders</a></li>
                <li class="dropdown">


                <li><a href="#">Accounts</a></li>
                <li class="dropdown">


                <li class="dropdown">

                    <ul class="dropdown-menu">
                        <li><a href="#">Overview</a></li>
                        <li><a href="#">New Entry</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Topics</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>
                        Links<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://www.google.ch" target="_blank">My Webmail</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="http://www.google.ch" target="_blank">Timelogger</a></li>
                        <li><a href="http://www.cubetech.ch" target="_blank">cubetech.ch</a></li>
                    </ul>
                </li>

                <li><a href="{{ url('/register') }}">Register</a></li>

                <li>
                    <a href="{{url('logout')}}" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"
                                                                        aria-hidden="true"></span> Logout<span
                                class="caret"></span></a>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
@yield('content')
</body>
</html>