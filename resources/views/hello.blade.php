<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService();

var myOptions = {
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}

var map = new google.maps.Map(document.getElementById("map"), myOptions);


var st = new google.maps.LatLng(7.88228, 98.3641);
var en = new google.maps.LatLng(7.88057, 98.3662);

var request = {
    origin: st,
    destination: en,
    travelMode: google.maps.DirectionsTravelMode.DRIVING,
    // Returns multiple routes
    provideRouteAlternatives: true
};

directionsService.route(request, function (response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
        console.log(response.routes);
        // Create a new DirectionsRenderer for each route
        for (var i = 0; i < response.routes.length; i++) {
            var dr = new google.maps.DirectionsRenderer();
            dr.setDirections(response);
            // Tell the DirectionsRenderer which route to display
            dr.setRouteIndex(i);
            dr.setMap(map);

            // Display the distance:
            document.getElementById('distance').innerHTML += "Route " + i + ": " +
              (response.routes[i].legs[0].distance.value) / 1000 + "killo meters, ";
            console.log((response.routes[i].legs[0].distance.value) / 1000 + "killo meters");
            // Display the duration:
            document.getElementById('duration').innerHTML += "Route " + i + ": " +
              response.routes[i].legs[0].duration.value + " seconds, ";
            console.log(response.routes[i].legs[0].duration.value + " seconds");
        }




    }
});
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPKKO3rKk2VKvqgQBFma99Ydv5gbBBopw&callback=initMap">
    </script>
  </body>
</html>