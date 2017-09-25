<html>
<title>show information</title>
<meta charset="UTF-8">
<meta name="viewport" content="width = device-width, initial-scale = 1.0">
<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
<style type="text/css">
html,body{
	height: 100%;
	font-family: 'Prompt', sans-serif;

}
	#php{
		background-color:  #DDDDDD;
		float: right;
		width: 30%;
		height: 100%;
		

	}
	button,input[type = submit]{
		border-radius: 4px;
		border :1px solid:#ccc;
		background-color: #ff9900;
		font-weight: bold;
	}
	button:hover{
		background-color: #9900cc;
		box-shadow: 5px 2px 2px;
	}
	input[type = submit]:hover{
		background-color: #9900cc;
		box-shadow: 5px 2px 2px;
	}
</style>
<body >
<img src="img/image.png" width="70%">
<div id="php">
<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "ogf";
$conn = mysqli_connect($server, $user, $pass, $db);
mysqli_set_charset($conn,"utf8");

//echo $_POST['realstart'];
$slat = explode(",",$_POST['realstart']);
$slat[0] = substr($slat[0],7);
$slat[1] = substr($slat[1],6);
$slat[1] = substr($slat[1],0,strlen($slat[1])-1);

//echo $slat[0].','.$slat[1].'<br>';

$url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$slat[0].",".$slat[1]."&destinations=".$_POST['en']."&key=AIzaSyBHlC_bwi0D_b86YE0ZN1hnymItuDb_5N0";
//echo $url;
$originsstatus; // 0 ไม่มีการเปลี่ยนจุดเริ่มต้น 1 ไม่ได้เริ่มต้นจากสำนักงาน
$json = file_get_contents($url);
$data = json_decode($json, TRUE);
$distance = $_POST['total'];
$dest = $data['destination_addresses'][0];
$origin = $data['origin_addresses'][0];
$dest_description;
$uid = $_POST['uid'];
    
if(isset($dest)==false){
	$dest_description = 1;

}
else{
	$dest_description = 0;
}


if ($_POST['index']>1) {
	$originsstatus = 1;
}
else{
	$originsstatus = 0;
}
//echo $originsstatus;
$datetime = $_POST['datetime'];
echo "Current Time : ".$datetime;

$endpos = explode(',',$_POST['en']);
$rate;

/*echo "<pre>";
print_r($_POST['dyroute']);
echo "<pre>";*/

$steps = json_decode($_POST['dyroute'],TRUE);
$countstep =  count($steps);
//echo "all step : ".$countstep.'<br>';
//echo $steps[0]['distance']['text'];

$eachdistance = [];
$eachaction = [];
$eachstartlat = [];
$eachstartlng = [];
$eachendlat = [];
$eachendlng = [];

for($i=0;$i<$countstep;$i++){
	$eachdistance[$i]= $steps[$i]['distance']['text'];
	$eachaction[$i]= $steps[$i]['instructions'];
	$eachstartlat[$i] = $steps[$i]['start_location']['lat'];
	$eachstartlng[$i] =  $steps[$i]['start_location']['lng'];
	$eachendlat[$i] = $steps[$i]['end_location']['lat'];
	$eachendlng[$i] = $steps[$i]['end_location']['lng'];
	$eachaction[$i] = strip_tags($eachaction[$i]);
	
}

echo '<br>'."Distance : ".$distance." km";
echo '<br>';
echo 'From : '.$origin.'<br>';
echo 'To : '.$dest.'<br>'."Vihecle : ".$_POST['select'].'<br>';

$campus;


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
	if($_POST['select'] == 'car'){
		$rate = 4.5;
	}
	elseif ($_POST['select'] == 'motercycle') {
		$rate = 2 ;
	}

	echo 'Cost : '.$distance*$rate ." bath".'<br>'.'<br>';
	echo "<input type='hidden' value = '".$distance*$rate."' name = 'cost'>";

	$newdbsql = " INSERT INTO `user_outgoing` (`user_outgoing_id`, `branch_id`, `user_id`, `origin_lat`, `origin_lng`, `origin_branch_description_id`, `destination_lat`, `destination_lng`, `destination_branch_description_id`, `vihecle_type`, `distance`, `rate`, `cost`, `status`, `datetime_enter`) VALUES (NULL,".$_POST['cam'].",".$uid.", '".$slat[0]."', '".$slat[1]."','".$originsstatus."', '".$endpos[0]."', '".$endpos[1]."', '".$dest_description."', '".$_POST['select']."', ".$distance.", ".$rate.", ".$distance*$rate.",'wait' ,'".$datetime."')";
//echo $newdbsql;
	if (mysqli_query($conn, $newdbsql)) {
		//echo "add to db complete".'<br>';
  
    }
 else {
    echo "Error: " . $newdbsql . "<br>" . mysqli_error($conn);
}

$ogid;
$foridsql = "SELECT user_outgoing_id FROM user_outgoing WHERE datetime_enter = '".$datetime."'";
//echo $foridsql;
$result = mysqli_query($conn,$foridsql);
if($result){
	 while ($arec= mysqli_fetch_array($result,MYSQLI_ASSOC)){
	 	//echo  "Outgoing id : ".$arec['user_outgoing_id']."<br>";
	 	$ogid=$arec['user_outgoing_id'];
	 }
	
}
//echo $ogid;

for($i=0;$i<$countstep;$i++){
	$sqlstep = "INSERT INTO `user_outgoing_detail`(user_outgoing_detail_id,user_outgoing_id,start_lat,start_lng,end_lat,end_lng,distance,instruction) VALUES (NULL,'".$ogid."','".$eachstartlat[$i]."','".$eachstartlng[$i]."','".$eachendlat[$i]."','".$eachendlng[$i]."','".$eachdistance[$i]."','".$eachaction[$i]."')";
	//echo $sqlstep;
	if(mysqli_query($conn,$sqlstep)){
		//echo "complete";
	}
	else{
		echo "<br>"."fail";
	}
}
    
    $bossmailsql = "SELECT boss_email FROM user WHERE user_id =".$uid;
    //echo $bossmailsql;
    $bossmail;
    $bossmailresult =  mysqli_query($conn,$bossmailsql);
    if($bossmailresult){
        while ($mailres= mysqli_fetch_array($bossmailresult,MYSQLI_ASSOC)){
	 	
	 	$bossmail=$mailres['boss_email'];
	 }
    }
    //echo $bossmail;

   /* $position;
    $positionsql = "SELECT position FROM user WHERE user_id=".$uid;
    //echo $positionsql;
    $pos = mysqli_query($conn,$positionsql);
    if($pos){
    	while ($poss = mysqli_fetch_array($pos,MYSQLI_ASSOC)) {
    		$position = $poss['position'];
    	}
    }
    echo $position;*/

	}
mysqli_close($conn);

?>

<div style="float: left;">
<form method="get" action="mailer.php">
	<input type="hidden" name="dt" value="<?php echo $ogid; ?>" >
    <input type="hidden" name="boss" value="<?php echo $bossmail; ?>">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
    <input type="hidden" name="branch" value="<?php echo $_POST['branch']?>">
	<input type="submit" name="submit" value="Send mail">
</form>
</div>	
<div id="backbtn" style="float: left; padding-left: 30px"><a id = "backlink" href=""><button>Back</button></a></div>
</div>
</body>
<script type="text/javascript">


	//var userposition = "<?php echo $position; ?>";
	//console.log(userposition);

	/*if (userposition==="hr") {
		document.getElementById('backlink').href = "hrview.php?uid=<?php echo $uid?>&branch=<?php echo $_POST['branch']?>"
	}else{
		document.getElementById('backlink').href = "dootook.php?uid=<?php echo $uid?>&branch=<?php echo $_POST['branch']?>"
	}*/
	
</script>
</html>