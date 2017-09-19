<!DOCTYPE html>
<html>
  <head> 
  <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="js/html2canvas.js"></script>
  <script type="text/javascript" src="js/canvas2image.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>Draggable directions</title>
    <style>

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Prompt', sans-serif;
        text-align: justify;
      }

      #map {
        height: 100%;
        float: left;
        width: 100%;

      }
      #floating-panel {
        position: absolute;    
        left: 15%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 0px solid #999;
        line-height: 30px;
        padding-left: 10px;
        
      }
      #right-panel {
        float: right;
        width: 100%;
        height: 100%;
        overflow:  hidden;
        overflow-y: scroll;
        scrollbar-arrow-color:blue;
        scrollbar-face-color: #e7e7e7;
        scrollbar-3dlight-color: #a0a0a0;
        scrollbar-darkshadow-color:#888888;
      }
      #right-panel {
        
        line-height: 20px;
        padding-left: 5px;
        background-color: #DDDDDD;
      }

      #right-panel select, #right-panel input {
        font-size: 5px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 10px;
      }

      input[type = text],select,textarea{
        border-radius: 4px;
        border: 1px solid #ccc;
      }

      button,input[type = submit]{
        border-radius: 4px;
        font-weight: bold;  
      }

      button:hover{
        box-shadow: 2px 5px 5px #888888;
        background-color: #9900cc;
        color: white;
      }
      
      .panel {
        height: 100%;
        overflow: auto;
      }

    </style>
    
        <script id = "sc" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHlC_bwi0D_b86YE0ZN1hnymItuDb_5N0&callback=initMap" async defer></script>
        <script>
        var markers = [];
        var directionsDisplay;
        var directionsService;
        var lat_lng;
        var lat;
        var lng;
        var dynamicroute = [] ;
        
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
          var currentdate = new Date();

        var month = currentdate.getMonth()+1;
          if(month<10){
            month = "0"+month;
          }
          var day = currentdate.getDate();
          if(day<10){
            day = "0"+day;
          }
          datetime = currentdate.getFullYear() + "-"+month
          + "-" + day + " "
          + currentdate.getHours() + ":"
          + currentdate.getMinutes() + ":" + currentdate.getSeconds();
          document.getElementById('datetime').value = datetime;
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

        function starting(id){
          document.getElementById('or').value = document.getElementById(id).value;
          document.getElementById('index').value = document.getElementById(id).selectedIndex;
           
        }

        function ending(id){
          var end= document.getElementById('en').value = document.getElementById(id).value;
          //alert($('#or').val());
          if($('#or').val()!=""){
             displayRoute(''+document.getElementById('or').value+'',''+end+'',directionsService,
            directionsDisplay);
          //document.getElementById('takeshot').disabled = '';
          clearMarkers();
          markers = [];

          }
          //document.getElementById('en').value = "";
        }

        function seten(lat,lng){
           document.getElementById('en').value = lat+","+lng;
          
          //alert(document.getElementById('en').value);
          displayRoute(''+document.getElementById('or').value+'',''+document.getElementById('en').value+'',directionsService,
            directionsDisplay);
          //document.getElementById('takeshot').disabled = '';     
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

        function savepic(){
          //document.getElementById('vihicle').value =  document.getElementById('vihicle').value;
        document.getElementById('en').value ;
        html2canvas(document.getElementById('map'), {
          useCORS: true,
          allowTaint:false,
          taintTest: false,
          onrendered: function(canvas) {
            var dataUrl= canvas.toDataURL("image/png");
            //document.getElementById('pic').appendChild( canvas );
            canvas.id = "c";
            var img =  document.createElement("img");
            img.setAttribute('src', dataUrl);
            img.setAttribute('id', 'image');
            img.setAttribute('style', 'text-align:justify;display:none');
            img.setAttribute('download','img/snapshot.jpg');
            document.getElementById('pic').appendChild(img);
           // var url = img.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
           // window.open(url);
           var imm = document.getElementById('image').src;
           var xml = new XMLHttpRequest();
           xml.open('post','snap.php',true);
           xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
           xml.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
              //alert(datetime);
              //document.getElementById('pic').innerHTML = this.responseText;
              //alert(this.responseText);
              //alert(document.getElementById('pic').innerHTML);
            }
           
           }
           xml.send('imgsrc='+dataUrl+'&datetime='+datetime);
            //document.write('<img src="' + dataUrl + '"/>');
            }
          });
        }
        
          $(function(){
          $("select[name='campus']").change(function () {
          var str = "";
          $("select[name='campus'] option:selected").each(function () {
               // str += $(this).index() + " ";
                $('#or').val($('#campus').val());
               //alert($('#campus').val());
                var selectNo = $(this).index();

                $('#cam').val(selectNo) ;
                $('#subcats').show();
                //window.history.pushState({}, '', '?page=dootook&id='+selectNo);
                $('#right-panel').empty();

                if(selectNo == 1){
                  lat_lng = {lat:7.90608272245317,lng:98.36664140224457};
                  initMap();
                  displayRoute(''+$('#campus').val()+'',''+$('#campus').val()+'',directionsService,
                  directionsDisplay);
                  
                }//phuket
                else if(selectNo == 2){
                  lat_lng = {lat:7.006341665683104,lng:100.4985523223877};
                  initMap();
                  displayRoute(''+$('#campus').val()+'',''+$('#campus').val()+'',directionsService,
                  directionsDisplay);
                  
                }//hatyai
                else if(selectNo == 5){
                  lat_lng = {lat:13.168317602040103,lng:100.93120604753494};
                  initMap();
                  displayRoute(''+$('#campus').val()+'',''+$('#campus').val()+'',directionsService,
                  directionsDisplay);
                  
                }//sriraja
                else if(selectNo == 4){
                  lat_lng = {lat:9.11065637716888,lng:99.30181503295898};
                  initMap();
                  displayRoute(''+$('#campus').val()+'',''+$('#campus').val()+'',directionsService,
                  directionsDisplay);
                  
                }//surat
                else if(selectNo == 3){
                  lat_lng = {lat:14.343238520299131,lng:100.60918271541595}
                  initMap();
                  displayRoute(''+$('#campus').val()+'',''+$('#campus').val()+'',directionsService,
                  directionsDisplay);
                  
                  }

                });

                jQuery.ajax({
                  url: 'recieve.php',
                  type: "POST",
                  // async:false,
                  data:  $('#campus').serialize(),
                  success: function(data){
                     // alert(data);
                    // jQuery(".res").html(data);
                     $('#subcats').html(data);
                     //console.log(data);

                }
                });  
               // var str = $("form").serialize();
               // $(".res").text(str);
                //console.log(str);
        });
        });
          function computeTotalDistance(result) {
          var total = 0;
          var test;
          var slat;
          var myroute = result.routes[0];

          for (var i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
            dynamicroute[i]= JSON.stringify(myroute.legs[i].steps);
            //console.log(dynamicroute[0]);
            //console.log(myroute.legs[0].start_location);
            }
          total = total / 1000;
          document.getElementById('total').value = total;
          //console.log(dynamicroute.length);
          document.getElementById('dyroute').value = dynamicroute[0];
          slat = JSON.stringify(myroute.legs[0].start_location);
          document.getElementById('realstart').value = slat;
          //console.log(slat);
          //alert(JSON.stringify(dynamicroute));

          }
        </script>
      </head>
       <?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "ogf";
    $conn = mysqli_connect($server, $user, $pass, $db);
    $sqldes;
    $i;
    mysqli_set_charset($conn,"utf8");

    ?>
      <div id="floating-panel">
    
   <form action="todb.php" method="post">
    <strong>ยานภาหนะ </strong>
    <select name="select" id="vihicle">
      <option value="car">รถยนต์</option>
      <option value="motercycle" selected="selected">มอเตอไซค์</option>
    </select>
    <strong>สาขา</strong>

    <select name="campus" id="campus">
    <option value="" selected="selected">สาขา</option>
      <?php
    $sql = "SELECT branch_name,branch_lat,branch_lng FROM `branch` ORDER BY branch_id";
    $res = mysqli_query($conn,$sql);
    if($res){
      while ($rec= mysqli_fetch_array($res,MYSQLI_ASSOC)) { 
       ; 
    ?>
   <option value="<?php echo $rec['branch_lat'].",".$rec['branch_lng'] ?>"><?php  echo $rec['branch_name'] ?></option><
    <?php
    }
    }
    ?>
    </select>
  
    <button onclick="savepic()">บันทึก</button>
    <div id="subcats" align="left" style="display:none">
    <strong>จาก</strong>
    <select id="Phuket" name="subcategory" onchange="starting(this.id)">
    <option value="" selected="selected">สำนักงาน</option>
    <?php
    //$sqldes = "SELECT branch_destination_name,lat_destination,lng_destination FROM branch_destination WHERE branch_id=1";
    //$GLOBALS['sqldes'] = "SELECT branch_destination_name,lat_destination,lng_destination FROM branch_destination WHERE branch_id =".$i;
    $startres = mysqli_query($conn,$sqldes);
    if($startres){
      while ($startrec= mysqli_fetch_array($startres,MYSQLI_ASSOC)) {
    ?>
   <option value="<?php echo $startrec['lat_destination'].",".$startrec['lng_destination'] ?>"><?php  echo $startrec['branch_destination_name'] ?></option>
    <?php
    }
    }
    ?>
    </select>

    </select>
    <select  id="Hatyai" name="subcategory"  onchange="ending(this.id)">
      <option value="">ไปยัง</option>
      <?php
 
      $startres = mysqli_query($conn,$sqldes);
    if($startres){
      while ($hrec= mysqli_fetch_array($startres,MYSQLI_ASSOC)) {
    ?>
   <option value="<?php echo $hrec['lat_destination'].",".$hrec['lng_destination'] ?>"><?php  echo $hrec['branch_destination_name'] ?></option>
    <?php
    }
    }
    ?>
    </select>

    </div>
      <input type="hidden" name="or" value="" id="or">
      <input type="hidden" name="en" value="" id="en">
      <input type="hidden" name="cam" value="" id="cam">
      <input type="hidden" name="total" value="" id="total">
      <input type="hidden" name="dyroute" value="" id = "dyroute">
      <input type="hidden" name="datetime" value="" id="datetime">
      <input type="hidden" name="realstart" value="" id="realstart">
      <input type="hidden" name="index" id="index" value="">
    </form>
  
    </div>
      <body onload="initMap()">
        <div id="map" class="col-xs-12 col-md-12 col-lg-10"></div>
        <div id="right-panel" class="col-lg-2"></div>
        <div id="pic"></div>
      </body>

</html>
