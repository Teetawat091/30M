<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 

	$username ="root";
	$psw = ""; 
	$server =  "localhost";
	$db = "pongcool_ps";
	$connect = mysqli_connect($server,$username,$psw,$db);
	mysqli_set_charset($connect,"utf8");




	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	$bossid = $_POST['leave'];
	echo $bossid.'<br>';
	$bossid =  substr($bossid,0,strlen($bossid)-1);
	echo $bossid;


	$insertuser = "INSERT INTO `user` (`user_id`, `user_code`, `username`, `password`, `email`, `title`, `name`, `sname`, `dob`, `citizen_id`, `address`, `company_id`, `branch_id`, `position_id`, `welfare_id`, `user_level`, `dayoff_id`, `resume_id`, `picture`, `user_status`, `leave_apporve_id`, `date_start`, `date_apporve`, `date_retire`, `datetime_entered`) VALUES (NULL, '".$_POST['usercode']."', '".$_POST['users']."', '".$_POST['pass']."', '".$_POST['mail']."', '".$_POST['title']."', '".$_POST['name']."', '".$_POST['sname']."', '".$_POST['dob']."', '".$_POST['citizen']."', '".$_POST['address']."', '".$_POST['company']."', '".$_POST['branch']."', '".$_POST['position']."', '', '', '', '', '', '".$_POST['status']."', '".$bossid."', '', '', '', '');";

	$result = mysqli_query($connect,$insertuser);
	if($result){
		echo "complete".'<br>';
	}
	else{
		echo "add fail";
	}

	$updatepass = "UPDATE user SET user.password= PASSWORD('".$_POST['pass']."') WHERE user.password ='".$_POST['pass']."'";
	echo $updatepass.'<br>';
	$updateres = mysqli_query($connect,$updatepass);
	if($updatepass){
		echo "update complete";
	}

	mysqli_close($connect);
	 ?>




</body>
</html>