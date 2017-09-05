<?php
    $host = "localhost"; // ส่วนมากมักเป็น localhost
    $user = "root"; // Username 
    $pass = ""; // Password 
    $dbname = "thailand"; // ชื่อฐานข้อมูล

    function conndb() {
        global $conn;
        global $host;
        global $user;
        global $pass;
        global $dbname;
        $conn = mysql_connect($host,$user,$pass);

    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($dbname) ;
      if (!$conn)
        die("ไม่สามารถติดต่อกับฐานข้อมูลได้");

      mysql_select_db($dbname,$conn)
        or die("ไม่สามารถเลือกใช้งานฐานข้อมูลได้");
    }

    function closedb() {
      global $conn;
      mysql_close($conn);
    }
?>
