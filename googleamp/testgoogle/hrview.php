
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<title>Home</title>
</head>
<style type="text/css">
	html,body{
		height: 100%;
	}
	
	#leftpanel{
		float: left;
		height: 100%;
		width: 15%;
		padding-top: 5%;
		background-color: #ff9900;
		border: 1;
		line-height: 30px;
		font-family: 'Roboto','sans-serif';
		transition: width 3s;
		text-align: center;
	}
	button.btn{
		width: 70%;
		height: 30px;
		background-color: #363636;
		border: 0;
		border-spacing: 50px;
		border-radius: 8px;
		text-align: center;
		color: white;
		
	}
	#body{
		float: left;
		height: 100%;
		width: 85%;		
	}
	

</style>
<body>

<div id="leftpanel">
<strong> Selectform </strong><br><br><br>
	<a href="hrview.php?page=addlandmarkform"><button class="btn" id="addlandmarkform"><strong><i>Add location form</i></strong></button></a>
	<br><br>
	<a href="hrview.php?page=dootook"><button class="btn" id="addlandmarkform"><strong><i>Outgoing Form</i></strong></button></a>
	
	
</div>
<div id="body" >
<?php 

if (isset($_GET['page'])) {	
include($_GET['page'].".php");
}
else{
	include("addlandmarkform.php");
}
?>
</div>
</body>
</html>