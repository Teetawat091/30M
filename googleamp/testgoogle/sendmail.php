<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>send email test</title>
</head>
<body>
<?php
ini_set('max_execution_time',60); //เลขหน้วยเป็นวิ
$filename = 'snapshot.png';
    $path = 'C:/xampp/htdocs/testgoogle/img';
    $file = $path . "/" . $filename;

    $mailto = 'chitpitak.t@gmail.com';
    $subject = 'โหลเทสๆ';
    $message = "เทสส่งไฟล์";

    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $mailfrom = "sandna03@gamil.com";
    $headers = "From:".$mailfrom."<".$mailfrom.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 64bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo "ส่งเมลล์ไปที่ : ".$mailto." สำเร็จ"; // or use booleans here
        
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }
   
?>
 <br><a href = https://mail.google.com>Google</a> &nbsp;&nbsp;&nbsp;<a href =https://outlook.live.com>Outlook</a> 
 &nbsp;&nbsp;&nbsp;
 <a href = index.php>หน้าแรก</a>
</body>
</html>
