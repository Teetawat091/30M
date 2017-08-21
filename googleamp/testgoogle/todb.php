<html>
<title>show information</title>
<meta charset="UTF-8">
<body>
	<iframe src="http://127.0.0.1/testgoogle/dootook.php"height="500" width="100%"frameborder="0"scrolling="auto"align="center">
</iframe>
</body>

<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "testgmap";
$conn = mysqli_connect($server, $user, $pass, $db);

$url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$_GET['or']."&destinations=".$_GET['en']."&key=AIzaSyBHlC_bwi0D_b86YE0ZN1hnymItuDb_5N0";

$json = file_get_contents($url);
$data = json_decode($json, TRUE);
$distance = (float)substr($data['rows'][0]['elements'][0]['distance']['text'],0,-3)*1.60934;
$dest = $data['destination_addresses'][0];
$origin = $data['origin_addresses'][0];
$cost;

echo "Distance : ".$distance." km";
echo '<br>';
echo 'From : '.$origin.'<br>';
echo 'To : '.$dest.'<br><br>'.$_GET['select'].'<br>'.$_GET['cam'].'<br>';
/*echo "<pre>";
print_r($data); 
echo "</pre>";
*/
$campus;

if($_GET['cam'] == '7.006341665683104,100.4985523223877'){
	$campus = "Hattai";
}
elseif ($_GET['cam']== '7.90608272245317,98.36664140224457') {
	$campus = 'Phuket';
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
	if($_GET['select'] == 'car'){
		$cost = round($distance * 4.5);
	}
	elseif ($_GET['select'] == 'motercycle') {
		$cost = round($distance * 2) ;
	}
	$sql = "INSERT INTO gmap (Origin,Dest,Campus,Vihecle,Distance,Cost)VALUES ('".$origin."','".$dest."','".$campus."','".$_GET['select']."',".$distance.",".$cost.")";

	if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

	}
mysqli_close($conn);

?>