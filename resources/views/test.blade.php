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
  <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
    text-align: center;
      }

      #map {
        height: 500px;
        width: 600px;
      }
      .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {

    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}

    </style>
    <script type="text/javascript">
      /*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">ไม่มีข้อมูลลูกค้า</td></tr>'));
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
  <body>
    <div class="col-md-6 ">
  <div id="map"></div>
   </div> 
   <div class="col-md-6">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อมูลลูกค้า</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> ค้นหา</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ลำดับที่" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ชื่อ" disabled></th>
                        <th><input type="text" class="form-control" placeholder="เบอร์โทร" disabled></th>
                        <th><input type="text" class="form-control" placeholder="e-mail" disabled></th>
                    </tr>
                </thead>
                @foreach($cus as $c)
                <tbody>
                    <tr>
                        <td>{{$c->customers_id}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->tel}}</td>
                        <td>{{$c->address}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

   </div>
   <script>

    var locations ={!! $customers !!};


      function initMap() {
      var mapOptions = {
        center: {lat:   7.92357, lng: 98.3713},
        zoom: 11,
      }
        
      var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
      
      var marker, i, info;

      for (i = 0; i < locations.length; i++) {  

        marker = new google.maps.Marker({
           position: new google.maps.LatLng(locations[i][1], locations[i][2]),
           map: maps,
           title: locations[i][0]
        });

        info = new google.maps.InfoWindow();

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          info.setContent(locations[i][0]);
          info.open(maps, marker);
        }
        })(marker, i));

      }

    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK3RgqSLy1toc4lkh2JVFQ5ipuRB106vU&callback=initMap" async defer></script>
  </body>
</html>
