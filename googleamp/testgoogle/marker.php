<!DOCTYPE html>
<html>
<body>

<!--<form action="#">
<input type="hidden" name="lat" id = "lat">
<input type="hidden" name="lng" id = "lng">
</form> -->

<button onclick="showdistance()">Distance</button>

<select>
  <option value="motercycle">มอเตอไซค์</option>
  <option value="car">รถยนต์</option>
  
</select>
<p id="dis"></p>

<div id="map" style="width:100%;height:500px;"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  
  var myCenter=new google.maps.LatLng(15.8700,100.9925);
  var mapOptions = {center: myCenter, zoom: 6};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(map, event.latLng);
  });
}

function placeMarker(map, location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });

 // console.log(marker.getPosition().lat());
 // console.log(marker.getPosition().lng());
  var latposition = [marker.getPosition().lat()];
  var lngposition = [marker.getPosition().lng()];

  addarray(latposition,lngposition);
   
}

function addarray(array1,array2){
  for(i=0;i<1;i++){
    console.log(array1);
    console.log(array2);
  }

}

function showdistance(){
 
  document.getElementById("dis").innerHTML = "Distance : ";
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHlC_bwi0D_b86YE0ZN1hnymItuDb_5N0&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
