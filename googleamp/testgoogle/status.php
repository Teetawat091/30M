<!DOCTYPE html>
<html>
<head>
	<title>Status Report</title>
</head>
<body>
<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "ogf";
$conn = mysqli_connect($server, $user, $pass, $db);
mysqli_set_charset($conn,"utf8");
$tz_string = "Asia/Bangkok";
$datetime = new DateTime($tz_string); 

$dt =  json_encode($datetime,true);
$a =  json_decode($dt,true);

echo '<pre>';
print_r($dt);
echo '<pre>';
$date = $a["date"];
echo $date.'<br>';

$useabledatetime = substr($date, 0, 19);

$sql = "UPDATE `user_outgoing` SET `status` = 'approve' WHERE `datetime_enter`= '".$useabledatetime."'";
echo $sql;

if(mysqli_query($conn,$sql)){

}
else{
	
}



?>

</body>
</html>