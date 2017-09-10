<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
    <meta name="author" content="sumit kumar">
    <title></title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">

    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    <link href="{{asset('css/bootstrap-navbaruser.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

</head>

<body>

<nav class="navbar navbar-inverse top-nav">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul>
                <li><a href="#" class="menu-icon" id="btn-menu"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
                <li><a href="#" class="brand-logo">ระบบจัดการอะไหล่รถยนต์</a></li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#" class="home"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            </ul>

            <ul class="navbar-right">
                <li><a href="#" class="th-icon"><i class="fa fa-th" aria-hidden="true"></i></a></li>
                <li><a href="#" class="home"><span class="badge">10</span></a></li>
                <li><a href="#" class="profil"><img
                                src="https://lh3.googleusercontent.com/-uwagl9sPHag/WM7WQa00ynI/AAAAAAAADso/ZGTVC0LVk1cFReheTbZzpGa2aawWyV8QACL0B/w140-d-h148-p-rw/profile-pic.jpg"
                                class="img-responsive img-circle"></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="side-navbar" id="sideNav">
        <div class="side-nave-iner">
            <ul>
                <li class="side-li"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> <span class="removeText">Home</span></a>
                </li>
                <li class="side-li"><a href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span
                                class="removeText">collections</span></a></li>
                <li class="side-li"><a href="#"><i class="fa fa-group" aria-hidden="true"></i><span class="removeText"> Communities</span></a>
                </li>
                <li class="side-li"><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="removeText"> profile</span></a>
                </li>
                <li class="side-li"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span
                                class="removeText"> event</span></a></li>
                <li class="side-li"><a href="#"><i class="fa fa-bell" aria-hidden="true"></i><span class="removeText"> notifications</span></a>
                </li>
                <li class="side-li"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="removeText"> setting</span></a>
                </li>
                <li class="side-li"><a href="#"><i class="fa fa-commenting" aria-hidden="true"></i> <span
                                class="removeText">send feedback</span></a></li>
                <li class="side-li"><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i><span
                                class="removeText"> help</span></a></li>
            </ul>
        </div>
    </div>
</div>


<script src="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.js"></script>

<script>
    $(document).ready(function () {

        $("#btn-menu").hover(function () {
            $("#sideNav").toggleClass("showHalfMenu");


        });

        $(".side-li").hover(function () {
            $("#sideNav").toggleClass("showFullMenu");
            $(".removeText").toggle();

        });


    });

</script>
@yield('content')
</body>
</html>
