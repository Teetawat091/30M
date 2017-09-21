<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="initial-scale=1.0">
	<title>Login</title>
</head>
<style type="text/css">
html,body{
	height: 100%;
}
	#login{
		height: 100%;
		background-color: #ff9900;
		text-align: center;
		padding-top: 10%;

	}
	input[type = submit]{
		background-color:#363636;
		border: 0px ;
		border-radius: 3px;
		border-width: bold;
		color: white;
	}
	input[type = text],input[type = password]{
		border: 1px solid:#333 ;
		border-radius: 3px;

	}

	input[type = submit]:hover{
		background-color: #9900cc;
		box-shadow: 2px 2px 3px;

	}
</style>
<body>
	<div id="login">
		
		<form action="check.php" method="post">
		Username : <input type="text" name="user" id="user" value=""><br>
		<br>
		Password : <input type="password" name="pass" id="pass" value=""><br><br>
		<input type="submit" name="submit" id="submit" value="Login">
		</form>
		
	</div>

</body>
</html>