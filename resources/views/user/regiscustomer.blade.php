@extends('layouts.app')
@section('content')
<!-- cript map --> 
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8xrFSxydXYrpufXe3QJc5e2EbbTZuMvc&libraries=places"
             async defer></script>



<form class="form-horizontal" action="{{url('customer')}}" method="POST" role="form">
<fieldset>
<div class="container-fluid">
    <section class="container">
    <div class="container-page">        
      <div class="col-md-5">
        <h3 class="dark-grey">ข้อมูลลูกค้า</h3>
        
        <div class="form-group col-lg-12">
          <label>ชื่อลูกค้า</label>
          <input id="Name" name="name" type="text" placeholder="" class="form-control input-md" required="">
        </div>
        
        <div class="form-group col-lg-12">
          <label>E-mail</label>
          <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
        </div>
        
        <div class="form-group col-lg-12">
          <label>เบอร์โทร</label>
           <input id="tel" name="tel" type="text" placeholder="" class="form-control input-md" required="">
        </div>
                
        <div class="form-group col-lg-12">
          <label>ที่อยู่</label>
         <input id="address" name="address"  placeholder="" class="form-control input-md" required="">
        </div>
      
      </div>
    
      <div class="col-md-5">
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
        <title>สอนค้นหาแบบ autocomplete ใน google map api v3</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=th"></script> 
        <script>
            function initialize() {
                var geocoder;
                var infowindow;
                var place;
                var marker;
                geocoder = new google.maps.Geocoder();
                var Position = new google.maps.LatLng(7.9519, 98.3381);
                var mapOptions = {
                    center: Position, //ตำแหน่งแสดงแผนที่เริ่มต้น
                    zoom: 13, //ซูมเริ่มต้น คือ 8
                    mapTypeId: google.maps.MapTypeId.ROADMAP //ชนิดของแผนที่
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                var input = document.getElementById('searchTextField');
                infowindow = new google.maps.InfoWindow();
                marker = new google.maps.Marker({
                    position: Position,
                    draggable: true
                });
                marker.setMap(map);//แสดงตัวปักหมุด!!
                showMapVal(Position.jb, Position.kb);
                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo('bounds', map);
                google.maps.event.addListener(autocomplete, 'place_changed', function() {//ทำงานเมื่อคลิกที่รายการค้นหา
 
                    infowindow.close();
                    marker.setVisible(false);
                    input.className = '';
                    place = autocomplete.getPlace();
                    showMapVal(place.geometry.location.jb, place.geometry.location.kb);
                    if (!place.geometry) {
                        input.className = 'notfound';
                        return;
                    }
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);//Set Center ของแผนที่ตามตำแหน่งที่ค้นหา
                        map.setZoom(17);//กำหนดซูมแผนที่ขยายเป็น 17
                    }
                    marker.setPosition(place.geometry.location);//setตำแหน่งใหม่ที่ค้นหา
                    marker.setVisible(true);//แสดงหมุดในตำแหน่งใหม่ที่ค้นหา
                    var address = '';
                    if (place.address_components) {
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[3] && place.address_components[3].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');
                    }
                    infowindow.setContent('<div><strong>' + place.name + '</strong>' + address);
                    infowindow.open(map, marker);
                });
 
                google.maps.event.addListener(marker, 'dragend', function(ev) {//ทำงานเมื่อคลิกเคลื่อนย้ายหมุด (Marker)
                    var location = ev.latLng;
                    var lat = location.lat();
                    var lng = location.lng();
                    showMapVal(lat, lng);
                    var latlng = new google.maps.LatLng(lat, lng)
                    geocoder.geocode({'latLng': latlng}, function(results, status) {
 
 
                        if (status == "OK") {
                            var address = '';
                            if (results[0].address_components) {
                                var address = [
                                    (results[0].address_components[0] && results[0].address_components[0].short_name || ''),
                                    (results[0].address_components[1] && results[0].address_components[1].short_name || ''),
                                    (results[0].address_components[2] && results[0].address_components[2].short_name || ''),
                                    (results[0].address_components[3] && results[0].address_components[3].short_name || ''),
                                    (results[0].address_components[5] && results[0].address_components[5].short_name || ''),
                                    (results[0].address_components[4] && results[0].address_components[4].short_name || '')
                                ].join(' ');
                                infowindow.setContent(address);
                                infowindow.open(map, marker);
                            }
                        }
                    });
                });
 
                google.maps.event.addListener(map, 'zoom_changed', function(ev) {//ซูมแผนที่
                    zoomLevel = map.getZoom();//เรียกเมธอด getZoom จะได้ค่าZoomที่เป็นตัวเลข
                    $('#mapsZoom').val(zoomLevel);//เอาค่า Zoom Level ไปแสดงที่ textfield ที่มี id="mapsZoom"
                });
            }
             
            function showMapVal(lat, lng) {//ฟังก์ชั่นแสดงละติจูดกับลองติจูดใน textfield
                $("#mapsLat").val(lat);//textfield ที่ค่า id="mapsLat"
                $("#mapsLng").val(lng);//textfield ที่ค่า id="mapsLng"
            }
            google.maps.event.addDomListener(window, 'load', initialize);//ทำงานตอนหน้านี้โหลดเสร็จแล้วให้ไปเรียกฟังก์ชั่น initialize
        </script>
        <style>
            body {
                font-family: sans-serif;
                font-size: 14px;
            }
            #map-canvas {
                height: 400px;
                width: 600px;
                margin-top: 0.6em;
            }
            input {
                border: 1px solid  rgba(0, 0, 0, 0.5);
            }
            input.notfound {
                border: 2px solid  rgba(255, 0, 0, 0.4);
            }
        </style>
    </head>
 
    <body>
 
        <div class="form-group col-lg-12">
          <label>ค้นหาสถานที่</label>
          <input type="text" size="50" id="searchTextField" class="form-control input-md" >
        </div>

            <div id="map-canvas"></div>
            <div>
 
                <div class="form-group col-lg-4">
          <label>ละติจูด</label>
          <input type="text" size="20" name="latitude" id="mapsLat" class="form-control input-md" >
        </div>

        <div class="form-group col-lg-4">
          <label>ลองติจูด</label>
          <input type="text" size="20" name="longtitude" id="mapsLng" class="form-control input-md" >
        </div> 
 
        <div class="form-group col-lg-4">
          <label>ซูม</label>
          <input type="text" size="3" id="mapsZoom" class="form-control input-md" >
        </div>
 
 
             
            </div>
    </body>
        
        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
  
  </section>
</div>

</fieldset>
{!! csrf_field() !!}
</form>
@endsection