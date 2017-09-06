<!DOCTYPE html>
<html>
<head>
	<title>google db</title>
</head>
<body>
<?php
$server = "google.com";
$user = "chitpitak.t@gmail.com";
$pass = "kakz8654[]";
$db = "TobeDB";
$conn = mysqli_connect($server, $user, $pass, $db);
mysqli_set_charset($conn,"utf8");
if($conn){
	echo "connected";
}
else
{
	die("failed");
}
?>
</body>
</html>