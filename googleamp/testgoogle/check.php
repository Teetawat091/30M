	<?php

	session_start();
	
	$serverName	  = "localhost";
	$userName	  = "root";
	$userPassword	  = "";
	$dbName	  = "ogf";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    mysqli_set_charset($con,"utf8");

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}

	//*** Reject user not online
	$intRejectTime = 5; // Minute
	$sql = "UPDATE user SET status='offline' WHERE user.status='online'";
	$query = mysqli_query($con,$sql);

	$strUsername = mysqli_real_escape_string($con,$_POST['user']);
	$strPassword = mysqli_real_escape_string($con,$_POST['pass']);

	$strSQL = "SELECT * FROM user WHERE email = '".$strUsername."' 
	and password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "<script type = 'text/javascript'>confirm('Username or Password Wrong');</script>";
		header('location:index.php');
		
		exit();
	}
	else
	{
		if($objResult["status"] == 'online')
		{
			echo "'".$strUsername."' Exists login!";
			exit();
		}
		else
		{
			//*** Update Status Login
			$sql = "UPDATE user SET status = 'online'  WHERE user_id ='".$objResult["user_id"]."'";
			$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION["user_id"] = $objResult["user_id"];
			session_write_close();

			//*** Go to Main page
			if($objResult["position"]=="hr"){
				header("location:hrview.php?uid=".$objResult["user_id"]."&branch=".$objResult["branch_name"]);
			}
			else{
				header("location:dootook.php?uid=".$objResult["user_id"]."&branch=".$objResult["branch_name"]);
			}
			
		}
			
	}
	mysqli_close($con);

	?>
