	<?php

	session_start();
	
	$serverName	  = "localhost";
	$userName	  = "root";
	$userPassword = "";
	$dbName	= "pongcool_ps";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    mysqli_set_charset($con,"utf8");

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}

	$strUsername = mysqli_real_escape_string($con,$_POST['user']);
	$strPassword = mysqli_real_escape_string($con,$_POST['pass']);

	//SELECT * FROM `user` WHERE username = 'nimit' AND password = PASSWORD('12345')

	$strSQL = "SELECT * FROM user WHERE username = '".$strUsername."' 
	and password = PASSWORD('".$strPassword."')";
	//.$strPassword."'";
	//echo $strSQL;
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		?>
		<script type = 'text/javascript'>
			alert('Username or Password Wrong')
		 	window.history.back()
		</script>
		<?php
		exit();
	}
	else
	{
			//*** Session
			session_write_close();
			//*** Go to Main page
			if($objResult["position_id"]==18||$objResult["position_id"]==19){
				header("location:hrview.php?uid=".$objResult["user_id"]."&branch=".$objResult["branch_id"]);
			}
			else{
				header("location:dootook.php?uid=".$objResult["user_id"]."&branch=".$objResult["branch_id"]);
			}		
	}
	mysqli_close($con);

	?>
