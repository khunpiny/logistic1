@extends('layouts.app')
@section('content')

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <!-- <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script> -->
 
  {{-- <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
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
   --}}
  <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      tr td {
        text-align: left;
      }
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
    <div class="col-md-6">
      <div id="map"></div>
      <script>

        var locations = {!! $customers !!};
        var origin    = {!! $origin !!};

        function initMap() {
          var mapOptions = {
            center: {lat:   7.92357, lng: 98.3713},
            zoom: 11,
          }
            
          var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
          
          var marker, i, info;
          var directionsService = new google.maps.DirectionsService();
          var directionsDisplay = new google.maps.DirectionsRenderer();
          //directionsDisplay.setMap(map);
          var rendererOptions = {
              map: maps
          };
          directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

          var waypts = [];

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

            waypts.push({
              location: locations[i][1]+','+locations[i][2],
              stopover: true
            });

            // Direction
            let request = {
              origin: origin.latitude+','+origin.longtitude,
              destination: locations[i][1]+','+locations[i][2],
              travelMode: google.maps.DirectionsTravelMode.DRIVING
            };
            
            directionsService.route(request, function(response, status) {
              if (status === 'OK') {
                //directionsDisplay.setDirections(response);
                var addres_end = response.routes[0].legs[0].end_address.split(',')[0];
                var distance = response.routes[0].legs[0].distance;
                $('#routes tr:last').after('<tr><td>'+addres_end+'</td><td>'+((distance.value/1000).toFixed(2))+' km</td></tr>');
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });
          }

          var request = {
            origin: '7.92355,98.3713',
            destination: locations[locations.length-1][1]+','+locations[locations.length-1][2],
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
          };

          directionsService.route(request, function(response, status) {
            if (status === 'OK') {
              directionsDisplay.setDirections(response);
              let distance_total = 0;
              $.each(response.routes[0].legs, function(index, value) {
                distance_total += value.distance.value;
              });
              console.log(distance_total);
              $('#routes tr:last').after('<tr><td>Total</td><td>'+((distance_total/1000).toFixed(2))+' km</td></tr>');
            } else {
              window.alert('Directions request failed due to ' + status);
            }
          });          
        }

      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK3RgqSLy1toc4lkh2JVFQ5ipuRB106vU&callback=initMap" async defer></script>
    </div>
    <div class="col-md-5 col-md-offset-1">
      <table id="routes" class="table table-hover">
        <tbody>
          <tr>
            <th style="text-align: left">Name</th>
            <th>Distance</th>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
@endsection
