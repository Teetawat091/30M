<!DOCTYPE html>
<html>
<head>
	<title>show distance </title>
</head>
<body>

<select id='vehecle' >
<option value='motercycle'>มอเตอไซค์</option>
<option value='car'>รถยนต์</option>
</select>
<br><br>

<?php 
$json_url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$_GET['start']."&destinations=".$_GET['end']."&key=AIzaSyBHlC_bwi0D_b86YE0ZN1hnymItuDb_5N0";
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);
echo "<pre>";
//print_r($data); 
echo "</pre>";
$distance = (float)substr($data['rows'][0]['elements'][0]['distance']['text'],0,-3);

echo "Distance : ".$distance*1.60934."   km <br>";
?>

</body>
</html>
