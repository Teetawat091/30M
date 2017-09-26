<!DOCTYPE html>
<html>
<head>
	<title> Add user</title>
	<meta charset="utf-8">
	<meta content="initial-scale=1.0">
</head>
<style type="text/css">.

html,body{
	height: 100%;
	background-color:#3333ff


}
h1{
	text-align: center;
	background-color: #633666;
	color: white;
}
input[type=text],select,input[type=number],input[type=password],textarea,input[type=submit]{
	border: 1px solid:#ccc;
	border-radius: 4px;
}

#data{
	text-align: center;
	overflow-y: scroll;
	height: 100%;
}

</style>

<body>
	<?php

	$username ="root";
	$psw = ""; 
	$server =  "localhost";
	$db = "pongcool_ps";
	$connect = mysqli_connect($server,$username,$psw,$db);
	mysqli_set_charset($connect,"utf8");
	?>
	<h1>Add user to the system</h1>
	<div id="data">

	<form action="usertodb.php" method="post">

		<strong>Title : </strong>

		<select id="title" name="title">
			<option value="นาย">นาย</option>.
			<option value="นาย">นาง</option>
			<option value="นาย">นางสาว</option>
		</select>

		<strong>Name : </strong><input type="text" name="name" value=""><br><br>
		<strong>Surname : </strong><input type="text" name="sname" value=""><br><br>
		<strong>User Code : </strong><input type="number" name="" value="1080"><br><br>
		<strong>Username : </strong><input type="text" name="user" value=""><br><br>
		<strong>Password : </strong><input type="password" name="pass" value=""><br><br>
		<strong>Email : </strong><input type="text" name="mail"><br><br>
		<strong>Dob : </strong><input type="text" name="dob" value=""><br><br>
		<strong>CitizenId : </strong><input type="text" name="citizen" value=""><br><br>
		<strong>Address : </strong><textarea  name="address" id="address" rows="4" cols="22"></textarea><br><br>

		<strong>CompanyId : </strong>

		<select id="company" name="company">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select>

		<strong>BranchName : </strong>

		<select id="branch" name="branch">
			<?php

			$branchsql = "SELECT branch_id,branch_name FROM branch";
			$branchres = mysqli_query($connect,$branchsql);
			if($branchres){
				while ($branchress = mysqli_fetch_array($branchres,MYSQLI_ASSOC)) {?>
				<option value="<?php echo $branchress['branch_id'] ?>"><?php echo $branchress['branch_name'] ?></option>
				
				<?php 
			}
			}
			?>
			
		</select><br><br>

		<strong>PositionId : </strong>
		<select id="position" name="position">
			<?php 
			$sqlpos = "SELECT position_id,position_name FROM position";
			$posresult = mysqli_query($connect,$sqlpos);
			 if($posresult){
			 	while($posres = mysqli_fetch_array($posresult,MYSQLI_ASSOC)){
			 		?>
			 		<option value= "<?php echo $posres['position_id'] ?>"><?php echo $posres['position_name'] ?></option>
			 	<?php
			 }
			 }
			?>
			<option></option>
		</select> <br><br>
		<strong>UserStatus : </strong>

		<select id="status" name="status">
			<option value="" selected="selected">select status</option>
			<option value="Apporve">Apporve</option>
			<option value="Wait">Wait</option>
			<option value="Retire">Retire</option>
		</select>

		<strong>Leave Approve Id</strong> <input type="text" name="leave"><br><br>

		<input type="submit" name="submit" value="submit">
	</form>
</div>

</body>
</html>