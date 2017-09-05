<!DOCTYPE html>
<html>
<head>
	<title>send mail by php mailer</title>
	<meta charset="utf-8">
</head>
<body style="background: #ffff">
<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebbok https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
// base sql UPDATE `user_outgoing` SET `status` = 'approve' WHERE `user_outgoing`.`user_outgoing_id` = 34;
// sql ใช้จริง UPDATE `user_outgoing` SET `status` = 'approve' WHERE `datetime_enter`= '2017-09-05 10:58:08';

// display all error except deprecated and notice
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "phpmailer/phpmailer/class.phpmailer.php";

$message = '<html><body style="background:#eee;">';
$message .= '';
$message .= '<table border = "0" cellspacing = "5" cellpadding = "5"><tr><td>';
$message .= '<input type = "button" name = "approve" value = "Approve" style = "background-color: #4CAF50;border-radius: 4px;font-size: 16px;color: white;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">'; 
$message .= '</td><td>';
$message .= '&nbsp;&nbsp;&nbsp;';
$message .= '<input type = "button" name = "cancle" value = "Cancle" style = "background-color: #4CAF50;border-radius: 4px;font-size: 16px;color: white;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">';
$message .= '</td></tr></table>';
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

// reciever address, person you want to send
$mail->AddAddress('chitpitak.t@gmail.com');

// if your send to multiple person add this line again
$mail->AddAddress('ilchaose_kakz@live.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');

// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);

// add attachment if any
$mail->AddAttachment('img/snapshot.jpg');


try {
    // send mail
    $mail->Send();
   echo $msg = "Mail send successfully";
   //echo $message;
    header( "location: index.php" );
 	exit(0);

} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}

?>
</body>
</html>

