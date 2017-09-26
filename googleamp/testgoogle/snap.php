<?php

$src = $_POST['imgsrc'];

//echo $src;

#ตัดตัวอักษรพิเศษเพื่อเซฟรูป

/*$_POST['datetime'] = preg_replace(
  array("/\^/", "/:/", "/ /", "/\(/", "/{/"),
  "", $_POST['datetime']);*/

#เซฟรูปลงเซิฟเวอ
$img = str_replace('data:image/png;base64,', '', $src);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = 'pic/route.png';
$success = file_put_contents($file, $data);

echo $_POST['datetime'];

 ?>
