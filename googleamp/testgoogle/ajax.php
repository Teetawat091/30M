<!DOCTYPE html>
<html>
<head>
	<title>ajax</title>
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<meta charset="utf-8">
</head>
<body>
<style type="text/css">
	#a{
		padding-left: 10%;
		padding-top: 30px;
	}
	#test{
		padding-left: 10%;
	}
</style>

<?php
  if(isset($_POST['sweets'])) 
  {
    echo $_POST['sweets'];
    exit;
  }
  ?>

    <script>
        $(function(){
          $("select[name='sweets']").change(function () {
          var str = "";
          $("select[name='sweets'] option:selected").each(function () {
                str += $(this).index() + " ";

              });

                jQuery.ajax({
                type: "POST",
                data:  $("#name").serialize(),

                success: function(data){
                    jQuery(".res").html(data);
                    //$('#test').html(data);
                    console.log(data);

                }
                });  
                var str = $("form").serialize();
                $(".res").text(str);
                //console.log(str);
        });
        });
        </script>
 <div id="test">

  </div>

<form id="a" action="" method="post">
  <select name="sweets" id="name">
   <option value="1">Chocolate</option>
   <option value="2">Candy</option>
   <option value="3">Taffy</option>
   <option value="4">Caramel</option>
   <option value="5">Fudge</option>
  <option value="6">Cookie</option>
</select>
</form>

</body>
</html>