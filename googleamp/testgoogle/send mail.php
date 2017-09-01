<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$strTo = "sandna03@gmail.com";
$strSubject = "Test Send Email";
$strHeader = "From: chitpitak.t@gmail.com";
$strMessage = "My Body & My Description";
$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
if($flgSend){
echo "Email Sending.";
}
else{
echo "Email Can Not Send.";
}

?>
</body>
</html>
