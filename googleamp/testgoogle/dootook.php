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
        width: 100%;
        height: 100%;
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

    </style>
    <div id="floating-panel">
    <form  action="todb.php" method="get">
    <strong>ประเภทของยานภาหนะ </strong>
    <select name="select" id="vihicle">
      <option value="car">รถยนต์</option>
      <option value="motercycle">มอเตอไซค์</option>
    </select>
    <select name="campus" id="campus" onchange="changecampus()" >
    <option value="" selected="selected">Please select your campus</option>
      <option value="7.90608272245317,98.36664140224457">ภูเก็ต</option>
      <option value="7.006341665683104,100.4985523223877">หาดใหญ่</option>
      <option value="Ayuthaya">อยุธยา</option>
      <option value="Suratthani">สุราษ</option>
      <option value="13.168317602040103,100.93120604753494">ศรีราชา</option>
    </select>
      <input type="submit" name="submit" value="Go" onclick="d()" >
      <input type="hidden" name="or" value="" id="or">
      <input type="hidden" name="en" value="" id="en">
      <input type="hidden" name="cam" value="" id="cam"> 
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

          });
          directionsDisplay.addListener('directions_changed', function() {
            computeTotalDistance(directionsDisplay.getDirections());
          });
          myLogs.toString();
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
          console.log(marker.getPosition().lat());
          console.log(marker.getPosition().lng());
          myLogs;             
        }

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
              markers[i].setMap(map);
            }
          }

        function clearMarkers() {
          setMapOnAll(null);
        }

        var myLogs = [];
        (function () {
          var log = console.log;
          console.log = function () {
            var args = Array.prototype.slice.call(arguments)
            log.apply(this, args );
            myLogs.push(args);
          };
        }());

        function d(){
          document.getElementById('vihicle').value =  document.getElementById('vihicle').value;
          document.getElementById('campus').value = document.getElementById('campus').value;
          document.getElementById('en').value = myLogs[0]+","+myLogs[1];
        }
        function changecampus(){
          myLogs.toString();
          document.getElementById('or').value = document.getElementById('campus').value;
          document.getElementById('cam').value = document.getElementById('campus').value;
          //document.getElementById('en').value = myLogs[0]+","+myLogs[1];
          //alert("สำนักงานจังหวัด"+document.getElementById('campus').value);
          //direct(document.getElementById('campus').value);
          if(document.getElementById('campus').value == "7.90608272245317,98.36664140224457"){
            lat_lng = {lat:7.90608272245317,lng:98.36664140224457};
            initMap();
            document.getElementById('en').value = myLogs[0]+","+myLogs[1];
            direct(document.getElementById('campus').value);
            document.getElementById('en').value ="";
            document.getElementById('campus').selectedIndex = 0;
          }//phuket
          else if(document.getElementById('campus').value =="7.006341665683104,100.4985523223877"){
            lat_lng = {lat:7.006341665683104,lng:100.4985523223877};
            //document.getElementById('en').value ="";
            initMap();
            document.getElementById('en').value = myLogs[0]+","+myLogs[1];
            direct(document.getElementById('campus').value);
            document.getElementById('en').value ="";
            document.getElementById('campus').selectedIndex = 0;
          }//hatyai
          else if(document.getElementById('campus').value = "13.168317602040103,100.93120604753494"){
            lat_lng = {lat:13.168317602040103,lng:100.93120604753494};
           // document.getElementById('en').value ="";
            initMap();
            document.getElementById('en').value = myLogs[0]+","+myLogs[1];
            direct(document.getElementById('campus').value);
            document.getElementById('en').value ="";
            document.getElementById('campus').selectedIndex = 0;
          }
          
          }
          function direct(campus){
            if(myLogs.length==0){
               displayRoute(campus,campus,directionsService,
            directionsDisplay);
            }
            displayRoute(campus,myLogs[0]+","+myLogs[1],directionsService,
            directionsDisplay);
            clearMarkers();
            markers = [];
          }
        </script>
      </head>

      <body>

        <div id="map"></div>
      </body>
</html>