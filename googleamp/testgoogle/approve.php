<!DOCTYPE html>
<html>
<head>
	<title>Change status</title>
	<meta charset="utf-8">
</head>
<body>
<?php $server = "localhost";
$user = "root";
$pass = "";
$db = "pongcool_ps";
$conn = mysqli_connect($server, $user, $pass, $db);
mysqli_set_charset($conn,"utf8");

$goid = $_GET['goingid'];

$sql = "UPDATE `user_outgoing` SET `status` = 'approve' WHERE `user_outgoing`.`user_outgoing_id` =".$goid;
$res = mysqli_query($conn,$sql);
if($res){
	echo "Approve Complete";
	echo "<script> window.setTimeout('window.close()',1000);</script>";
}
 ?>
 
</body>
</html>