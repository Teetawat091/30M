<?
		session_start();
	$dbhost = "localhost";
	$dbuser = "pongcool_serene";
	$dbpasswd = "12345";
	$conn  = mysql_pconnect($dbhost, $dbuser, $dbpasswd) or die("Could not connect database : Please Connect Internet " . mysql_error());
	$dbname = "pongcool_serene";
	mysql_select_db($dbname, $conn) or die("Could not select database : ".mysql_error());
	mysql_query("SET NAMES UTF8");
	date_default_timezone_set("Asia/Bangkok");
		
		
		//$sql = "SELECT * FROM  `email_ying` where ey_status = 'no' ";
		$sql = "SELECT * FROM  `email_ying` where `ey_id`  = '1' ";
		$res = mysql_query($sql);
		
		while($row = mysql_fetch_array($res)){
			$email = $row[ey_email];
			$name = $row[ey_name];
	
			/* E-mail */
			$strTo = $email;
			$strSubject = "เปิดใจผู้บริหาร สิรีน พร๊อพเพอร์ตี้ฯ กับอสังหาฯ หาดใหญ่";
			$strHeader .= "MIME-Version: 1.0\r\n";
			$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
			$strHeader .= "From: Info Serene<info@sereneproperty.com>\r\n";
			
			$txt_en = base64_encode("ID:".$row[ey_id].":SERENEPROPERTY:APPROVE:APP_ID:EMAIL");
			$txt_id_confirm = base64_encode($txt_en);
			
			$strMessage = '<img src="http://sereneproperty.com/serene_2017/th/regist_plus_30m/Plus_30_PR2_A4_01.jpg" ><br><a href="http://www.sereneproperty.com/serene_2017/th/regist_plus_30m/reject_email.php?code='.$txt_id_confirm.'" >หากท่านไม่ต้องการรับข้อมูลข่าวสาร กรุณาคลิ๊กที่นี้</a>';
			//$strMessage = htmlspecialchars($strMessage );
		
			$flgSend = @mail($strTo,'=?utf-8?B?'.base64_encode($strSubject).'?=',$strMessage,$strHeader);  // @ = No Show Error // /**/
			
			echo $update_sql = "update `email_ying` SET ey_status = 'yes' where ey_id = '$row[ey_id]' ";
			mysql_query($update_sql); 
			echo '<br>';
		}

?>