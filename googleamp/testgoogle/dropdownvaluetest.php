<html>
<body>
<select name="course" id="qq" >
<?php 
$server = "localhost";
$user = "root";
$pass = "";
$db = "testgmap";
$conn = mysqli_connect($server, $user, $pass, $db);
  $sql = "SELECT name,lat,lng FROM `landmark` WHERE campus='phuket' ";
  $res = mysqli_query($conn,$sql);
  if($res){
    while ($rec= mysqli_fetch_array($res,MYSQLI_ASSOC)) {
      # code...
     
      $category = $rec['name'];
      echo $category;
?>
   <option value="<?php echo $rec['lat'].",".$rec['lng'] ?>"><?php  echo $rec['name'] ?></option>
 
<?php 
  }
}
?>
</select>
</body>
</html>