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
$db = "ogf";
$conn = mysqli_connect($server, $user, $pass, $db);
mysqli_set_charset($conn,"utf8");

$goid = $_GET['goingid'];

$sql = "UPDATE `user_outgoing` SET `status` = 'approve' WHERE `user_outgoing`.`user_outgoing_id` =".$goid;
$res = mysqli_query($conn,$sql);
if($res){
	echo "Approve Complete";
	header( "location:https://mail.google.com" );
 	exit(0);

}
else{
	echo "Approve Fail";

}


 ?>
 Hello it's me
</body>
</html>