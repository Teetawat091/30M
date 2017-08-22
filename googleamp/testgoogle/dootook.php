<!DOCTYPE html>
<html>
  <head>  <!-- www.techstrikers.com -->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable directions</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 70%;
       
      }
      #floating-panel {
        position: absolute;
        top: 16px;
        left: 0%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 0px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #right-panel {  
        float: right;  
        width: 29%;  
        height: 100%;  
      }  
      #right-panel {  
        font-family: 'Roboto','sans-serif';  
        line-height: 30px;  
        padding-left: 10px;  
      }  
 
      #right-panel select, #right-panel input {  
        font-size: 15px;  
      }  
 
      #right-panel select {  
        width: 100%;  
      }  
 
      #right-panel i {  
        font-size: 12px;  
      }  

      .panel {  
        height: 100%;  
        overflow: auto;  
      }  

    </style>
    <div id="floating-panel">
    <form  action="todb.php" method="get">
    <strong>ประเภทของยานภาหนะ </strong>
    <select name="select" id="vihicle">
      <option value="car">รถยนต์</option>
      <option value="motercycle" selected="selected">มอเตอไซค์</option>
    </select>
    <select name="campus" id="campus" onchange="changecampus()" >
    <option value="" selected="selected">Please select your campus</option>
      <option value="7.90608272245317,98.36664140224457">ภูเก็ต</option>
      <option value="7.006341665683104,100.4985523223877">หาดใหญ่</option>
      <option value="14.343238520299131,100.60918271541595">อยุธยา</option>
      <option value="9.11065637716888,99.30181503295898">สุราษ</option>
      <option value="13.168317602040103,100.93120604753494">ศรีราชา</option>
    </select>
    <select name="tt" id="tt" onchange="ending()">
      <option value="">ไปยัง</option>
      <option value="7.891948760651239,98.36819171905518">central</option>
      <option value="Psu phuket">Psu Phuket</option>
      <option value="สำนักงานประปาจังหวัดภูเก็ต">ประปา</option>
    </select>
      <input type="submit" name="submit" value="Go" onclick="d()" >
      <input type="hidden" name="or" value="" id="or">
      <input type="hidden" name="en" value="" id="en">
      <input type="hidden" name="cam" value="" id="cam"> 
      <input type="hidden" name="total" value="" id="total">
    </form>
    </div>
    <p id="ss"></p>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHlC_bwi0D_b86YE0ZN1hnymItuDb_5N0&callback=initMap"
        async defer></script>
        <script>
        var markers = [];
        var directionsDisplay;
        var directionsService;
        var campus;
        var lat_lng;
        var lat;
        var lng;

        lat_lng = {lat:7.90608272245317,lng:98.36664140224457};

        function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: lat_lng
          });
          google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(map, event.latLng);
          });
          directionsService = new google.maps.DirectionsService;
          directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: true,
            map: map,
            panel: document.getElementById('right-panel') 

          });
          directionsDisplay.addListener('directions_changed', function() {
            computeTotalDistance(directionsDisplay.getDirections());
          });          
        }

        function displayRoute(origin, destination, service, display) {
          service.route({
            origin: origin,
            destination: destination,
            waypoints: [],
            travelMode: google.maps.TravelMode.DRIVING,
            avoidTolls: true
          }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
              display.setDirections(response);
            } else {
              //alert('Could not display directions due to: ' + status);
            }
          });
        }
        function placeMarker(map, location) {
          var marker = new google.maps.Marker({
            position: location,
            map: map,
          });
          markers.push(marker);
           lat = marker.getPosition().lat();
           lng = marker.getPosition().lng();
           seten(lat,lng);             
        }

        function ending(){
          var a= document.getElementById('en').value = document.getElementById('tt').value;
          //alert(a);
          displayRoute(''+document.getElementById('or').value+'',''+a+'',directionsService,
            directionsDisplay);
          clearMarkers();
          markers = [];
          
          //document.getElementById('en').value = "";
        }

        function seten(lat,lng){
          var e = document.getElementById('en').value = lat+","+lng;
          //alert(typeof(e)+''+e+'');
          displayRoute(''+document.getElementById('or').value+'',''+e+'',directionsService,
            directionsDisplay);
          clearMarkers(); 
          markers = [];
          //document.getElementById('en').value = "";
        }

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
              markers[i].setMap(map);
            }
          }

        function clearMarkers() {
          setMapOnAll(null);
        }

        function d(){
          //document.getElementById('vihicle').value =  document.getElementById('vihicle').value;
          document.getElementById('cam').value;
          document.getElementById('en').value ;
        }
        function changecampus(){
          document.getElementById('or').value = document.getElementById('campus').value;
         
          if(document.getElementById('campus').value == "7.90608272245317,98.36664140224457"){
            lat_lng = {lat:7.90608272245317,lng:98.36664140224457};
            initMap();
            displayRoute(''+document.getElementById('or').value+'',''+document.getElementById('or').value+'',directionsService,
            directionsDisplay);
            document.getElementById('campus').selectedIndex = 1;
          }//phuket
          else if(document.getElementById('campus').value =="7.006341665683104,100.4985523223877"){
            lat_lng = {lat:7.006341665683104,lng:100.4985523223877};
            initMap();
           displayRoute(''+document.getElementById('or').value+'',''+document.getElementById('or').value+'',directionsService,
            directionsDisplay);
            document.getElementById('campus').selectedIndex = 2;
          }//hatyai
          else if(document.getElementById('campus').value == "13.168317602040103,100.93120604753494"){
            lat_lng = {lat:13.168317602040103,lng:100.93120604753494};
            initMap();
           displayRoute(''+document.getElementById('or').value+'',''+document.getElementById('or').value+'',directionsService,
            directionsDisplay);
            document.getElementById('campus').selectedIndex = 5;
          }//sriraja
          else if(document.getElementById('campus').value == "9.11065637716888,99.30181503295898"){
             lat_lng = {lat:9.11065637716888,lng:99.30181503295898};
            initMap();
            displayRoute(''+document.getElementById('or').value+'',''+document.getElementById('or').value+'',directionsService,
            directionsDisplay);
            document.getElementById('campus').selectedIndex = 4;
          }//surat
          else if(document.getElementById('campus').value == "14.343238520299131,100.60918271541595"){
            lat_lng = {lat:14.343238520299131,lng:100.60918271541595}
            initMap();
            displayRoute(''+document.getElementById('or').value+'',''+document.getElementById('or').value+'',directionsService,
            directionsDisplay);
            document.getElementById('campus').selectedIndex = 3;
          }

          }

          function computeTotalDistance(result) {  
          var total = 0;  
          var myroute = result.routes[0];  
          for (var i = 0; i < myroute.legs.length; i++) {  
            total += myroute.legs[i].distance.value;  
            }  
          total = total / 1000;  
          document.getElementById('total').value = total;  
          }  
        </script>
      </head>
      <body>

        <div id="map"></div>
        <div id="right-panel"></div> 
      </body>
</html>