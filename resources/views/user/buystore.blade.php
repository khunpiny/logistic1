<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  
  <link rel="stylesheet" type="text/css" media="all" href="style.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
     <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link href="css/bootstrap-navbar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-search.css')}}">
    <link href="{{asset('css/bootstrap-navmenu.css')}}" rel="stylesheet">
     <script type="text/javascript" src="{{url('js/jquerytext.js')}}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
 
  <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
  <script type="text/javascript">
    $(function(){
  var currencies = {!! $customers !!};
  $('#autocomplete').autocomplete({
    lookup: currencies,
    onSelect: function (suggestion) {
      var thehtml = suggestion.data;
      $('#outputcontent').html(thehtml);
    }
  });

  });
  
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
<li><a href="{{url('/transport')}}"><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>&nbsp&nbsp บิลสินค้า</a></li>
<li><a href="{{url('/buystore')}}"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>&nbsp สั่งสินค้า</a></li> 
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

 <div class="container">
        <div class="page-header">
            <h1>สั่งซื้อสินค้า</h1>
        </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
   @endif

    <form class="form-horizontal" method="POST" role="form" action="{{url('billdata')}}" onsubmit="clearField();">
            {!! csrf_field() !!}
            <fieldset>

            <div class="form-group" id="searchfield">
                 <label for="user_id" class="col-sm-2 control-label">ชื่อลูกค้า</label>
              <div class="col-sm-3">
                 <input type="text" name="name" placeholder="ชื่อลูกค้า"  class="form-control" id="autocomplete" required>
              </div>
            </div>

            <div class="form-group">
                  <label for="products_id" class="col-sm-2 control-label">สินค้า</label>
              <div class="col-sm-3">
                  <input id="name" type="text" name="names[]" class="form-control" placeholder="ชื่อสินค้า" autofocus required>
              </div>
                  <label for="amount" class="col-sm-2 control-label">จำนวน</label>
              <div class="col-sm-2">
                  <input type="text" name="amount[]" class="form-control" placeholder="จำนวน" 
                               autofocus required>
              </div>

                    <button type="button" class="btn btn-success btn-add">+</button>
                </div>

            <div class="form-group">
                  <label for="time" class="col-sm-2 control-label">วันที่จัดส่ง</label>
              <div class="col-sm-3">
                  <input type="date" class="form-control" id="time" name="time" placeholder="" required>
              </div>
            </div>

            <div class="form-group" id="outputbox">
                    <label for="location" class="col-sm-2 control-label">สถานที่จัดส่ง</label>
              <div class="col-sm-6">
                   <p id="outputcontent" class="form-control" >Choose a customer name</p>
              </div>
            </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button type="submit" name="submitButton" class="btn btn-primary">สั่ง</button>
                        <button type="submit" class="btn btn-danger">ยกเลิก</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>   
    
    

 


  