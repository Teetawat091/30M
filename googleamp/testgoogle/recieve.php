<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
$server = "localhost";
    $user = "root";
    $pass = "";
    $db = "ogf";
    $conn = mysqli_connect($server, $user, $pass, $db);
    $sqldes;
    $i;
    mysqli_set_charset($conn,"utf8");

	if(isset($_POST['campus'])){
      if($_POST['campus']=='7.90608272245317,98.36664140224457'){
        $i=1;

      }
      elseif ($_POST['campus']=='7.006341665683104,100.4985523223877') {
        $i=2;
        # code...
      }
      elseif ($_POST['campus']=='14.343238520299131,100.60918271541595') {
        # code...
        $i=3;
      }
      elseif ($_POST['campus']=='9.11065637716888,99.30181503295898') {
        # code...
        $i=4;
      }
      elseif ($_POST['campus']=='13.168317602040103,100.93120604753494') {
        # code...
        $i=5;
      }
       $GLOBALS['sqldes'] = "SELECT branch_destination_name,lat_destination,lng_destination FROM branch_destination WHERE branch_id =".$i;
           
        }
        //echo$sqldes;
        //echo $i;
?>
	<div id="subcats" align="left">
    <strong>จาก</strong>
    <select id="Phuket" name="subcategory" onchange="starting(this.id)">
    <option value="" selected="selected">เลือกสถานที่</option>
    <?php
    //$sqldes = "SELECT branch_destination_name,lat_destination,lng_destination FROM branch_destination WHERE branch_id=1";
    //$GLOBALS['sqldes'] = "SELECT branch_destination_name,lat_destination,lng_destination FROM branch_destination WHERE branch_id =".$i;
    $startres = mysqli_query($conn,$sqldes);
    if($startres){
      while ($startrec= mysqli_fetch_array($startres,MYSQLI_ASSOC)) {
    ?>
   <option value="<?php echo $startrec['lat_destination'].",".$startrec['lng_destination'] ?>"><?php  echo $startrec['branch_destination_name'] ?></option>
    <?php
    }
    }
    ?>
    </select>

    </select>
    <strong>ไปยัง</strong>
    <select  id="Hatyai" name="subcategory"  onchange="ending(this.id)">
      <option value="">เลือกสานที่</option>
      <?php
    //$sqlhatyai = "SELECT branch_destination_name,lat_destination,lng_destination FROM `branch_destination` WHERE branch_id =".$i;
   // $hatyaires = mysqli_query($conn,$sqlhatyai);
      //$GLOBALS['sqldes'] = "SELECT branch_destination_name,lat_destination,lng_destination FROM branch_destination WHERE branch_id =".$i;
      $startres = mysqli_query($conn,$sqldes);
    if($startres){
      while ($hrec= mysqli_fetch_array($startres,MYSQLI_ASSOC)) {
    ?>
   <option value="<?php echo $hrec['lat_destination'].",".$hrec['lng_destination'] ?>"><?php  echo $hrec['branch_destination_name'] ?></option>
    <?php
    }
    }
    ?>
    </select>

    </div>

</body>
</html>

