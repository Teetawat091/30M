<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

	session_start();
	
	$serverName	  = "localhost";
	$userName	  = "root";
	$userPassword	  = "";
	$dbName	  = "login";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}

	//*** Reject user not online
	$intRejectTime = 20; // Minute
	$sql = "UPDATE user SET status = '0' WHERE 1";
	$query = mysqli_query($con,$sql);

	$strUsername = mysqli_real_escape_string($con,$_POST['user']);
	$strPassword = mysqli_real_escape_string($con,$_POST['pass']);

	$strSQL = "SELECT * FROM user WHERE name = '".$strUsername."' 
	and pass = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "Username or Password Incorrect!";
		exit();
	}
	else
	{
		if($objResult["status"] == "1")
		{
			echo "'".$strUsername."' Exists login!";
			exit();
		}
		else
		{
			//*** Update Status Login
			$sql = "UPDATE user SET status = '1'  WHERE UserID = '".$objResult["id"]."' ";
			$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION["id"] = $objResult["id"];
			session_write_close();

			//*** Go to Main page
			if($objResult["position"]=="hr"){
				header("location:hrview.php");
			}
			else{
				header("location:dootook.php");
			}
			
		}
			
	}
	mysqli_close($con);

	?>

</body>
</html>