<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Displaying text directions with <code>setPanel()</code></title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
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
      #right-panel {
        height: 100%;
        float: right;
        width: 200px;
        overflow: auto;
      }
      #map {
        margin-right: 0px;
      }
      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }
      @media print {
        #map {
          height: 500px;
          margin: 0;
        }
        #right-panel {
          float: none;
          width: auto;
        }
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
    <form action="tojson.php" method="get">
      <input type="hidden" name="start" id="start" value="">
      <strong>End:</strong>
      <select id="end" name="end">  
      </select>
      <input type="submit" name="tonextpage" value="next">
      </form>
       <button onclick="log()">routing route</button>
      <p id="sd"></p>
    </div>
    <div id="right-panel"></div>
    <div id="map"></div>
    
    <script>
    var directionsDisplay;
    var directionsService;
      function initMap() {
         directionsDisplay = new google.maps.DirectionsRenderer;
         directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 15.8700, lng: 100.9925}
        });
        google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(map, event.latLng);
  });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));

        var control = document.getElementById('floating-panel');
        control.style.display = 'block';
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }
      function placeMarker(map, location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    
  });
    console.log(marker.getPosition().lat());
  console.log(marker.getPosition().lng());


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

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;
        directionsService.route({
          origin: start,
          destination: end,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      function log (){
       myLogs.toString();
       document.getElementById("start").value =  myLogs[0]+","+myLogs[1];
       document.getElementById("start").innerHTML =  myLogs[0]+","+myLogs[1];
       var endvalue = document.getElementById("end");
       for(i=2;i<4;i++){
        var option = document.createElement("option");
        if(i%2==0){
          
          option.text =  option.value = myLogs[i]+","+myLogs[i+1];
       endvalue.add(option,0);
        }
       }
      
      }
      
//window.location.href = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins="+myLogs[0]+","+myLogs[1]+"&destinations="+myLogs[2]+","+myLogs[3]+"&key=AIzaSyBHlC_bwi0D_b86YE0ZN1hnymItuDb_5N0"
  
    
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHlC_bwi0D_b86YE0ZN1hnymItuDb_5N0&callback=initMap">
    </script>
  </body>
</html>