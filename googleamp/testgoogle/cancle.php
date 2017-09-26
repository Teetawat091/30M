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

$goid = $_GET['goid'];

$sql = "UPDATE `user_outgoing` SET `status` = 'cancle' WHERE `user_outgoing`.`user_outgoing_id` =".$goid;
$res = mysqli_query($conn,$sql);
if($res){
	echo "Cancle Complete";
	echo "<script> window.setTimeout('window.close()',1000);</script>";
	//header("location:https://mail.google.com");
}
else{
	echo "Approve Fail";

}
 ?>
</body>
</html>