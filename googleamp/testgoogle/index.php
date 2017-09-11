
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<title>Home</title>
</head>
<style type="text/css">
	html,body{
		height: 100%;
	}
	#head{
		width: 100%;
		background-color: #ffff99;
		position: absolute;
		text-align: center;
	}
	#leftpanel{
		float: left;
		height: 100%;
		width: 15%;
		padding-top: 5%;
		background-color: #ffff99;
		border: 1;
		line-height: 30px;
		font-family: 'Roboto','sans-serif';
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
		padding-top: 20px;
	}

</style>
<body>
<div id="head">
<table align="center">
	<tr>
		<td>
			<strong>Form</strong>
		</td>
	</tr>
</table>
</div>
<div id="leftpanel">
<strong> Selectform </strong>
	<a href="addlandmarkform.php"><button class="btn"><strong><i>Add location form</i></strong></button></a>
	<a href="dootook.php"><button class="btn"><strong><i>Out going form</i></strong></button></a>
	<a href="s.html"><button class="btn"><strong><i>To test dropdown</i></strong></button></a>
	<a href="sendmail.php"><button class="btn"><strong><i>Send mail(mailer)</i></strong></button></a>
</div>
<div id="body">
<iframe src="addlandmarkform.php" height="100%" width="100%" frameborder="0" scrolling="auto" align="center"></iframe>
</div>
</body>
</html>