<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
@mail("sandna03@gmail.com","My subject",$msg,"chitpitak.t@gmail.com");
?>

</body>
</html>
