<!DOCTYPE html>
<html>
<head>
	<title>send mail by php mailer</title>
	<meta charset="utf-8">
</head>
<body style="background: #ffff">
<?php

// base sql UPDATE `user_outgoing` SET `status` = 'approve' WHERE `user_outgoing`.`user_outgoing_id` = 34;
// sql ใช้จริง UPDATE `user_outgoing` SET `status` = 'approve' WHERE `datetime_enter`= '2017-09-05 10:58:08';
    

// display all error except deprecated and notice
$goingid = $_GET['dt'];
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "phpmailer/phpmailer/class.phpmailer.php";

$message = '<html><body style="background:#eee;">';
$message .= '';
$message .= '<table border = "0" cellspacing = "5" cellpadding = "5"><tr><td><form method = "get" action = http://localhost:81/testgoogle/approve.php>';
$message .= '<input type = "hidden" name = "goingid" value ='.$goingid.'>';
$message .= '<input type = "submit" name = "approve" value = "Approve" style = "background-color: #4CAF50;border-radius: 4px;font-size: 16px;color: white;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">'; 
$message .= '</form></td><td><form method="get" action="http://localhost:81/testgoogle/cancle.php">';
$message .= '&nbsp;&nbsp;&nbsp;';
$message .= '<input type = "hidden" name = "goid" value='.$goingid.'>';
$message .= '<input type = "submit" name = "cancle" value = "Cancle" style = "background-color: #4CAF50;border-radius: 4px;font-size: 16px;color: white;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">';
$message .= '</form></td></tr></table>';
$message .= '<br>'.'<br>';
$message .= "</body>";
$message .= '</html>';

// creating the phpmailer object

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

// telling the class to use SMTP
$mail->IsSMTP();

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 465;

// your gmail address
$mail->Username = 'sandna03@gmail.com';

// your password must be enclosed in single quotes
$mail->Password = 'kakz8654[]';

// add a subject line
$mail->Subject = ' คำขอการยืนยันการออกนอกสถานที่ ';

// Sender email address and name
$mail->SetFrom('sandna03@gmail.com', 'sand');

// คนรับ
$mail->AddAddress($_GET['boss']);

// if your send to multiple person add this line again
    
//$mail->AddAddress('ilchaose_kakz@live.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');

// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);

// add attachment if any
$mail->AddAttachment('img/image.png');

try {
    // send mail
    $mail->Send();
   echo $msg = "Mail send successfully";
   //echo $message;
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "ogf";
    $conn = mysqli_connect($server, $user, $pass, $db);
    mysqli_set_charset($conn,"utf8");
    
    $position;
    
    $sql = "SELECT position FROM user WHERE user_id=".$_GET['uid'];
    $result = mysqli_query($conn,$sql);
    if($result){
        while($response = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $position = $response['position'];
        }
    }
    if($position=="hr"){
        header( "location:hrview.php?uid=".$_GET['uid'] );
        
    }
    else{
        header( "location:dootook.php?uid=".$_GET['uid'] );
        
    }
 	exit(0);

} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}

?>
</body>
</html>

