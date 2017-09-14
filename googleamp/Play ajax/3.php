
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php echo "i'm page3.php ".'<br>' ?>
	Main catagory : <select id="catagory" onchange="showsubcatval(this.value)">
		<option value="5555">1</option>
		<option value="1">2</option>
		<option value="3">3</option>
	</select><br>
	Subcat : 
	<select id="subcat">
		<option value="">...</option>
	</select>
</body>

<script type="text/javascript">
	function showsubcatval(value) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			//alert(this.responseText);
				document.getElementById('subcat').innerHTML = this.responseText;
			
			//document.getElementById('newbody').innerText = this.responseText;
		}
		else{
			document.getElementById('subcat').innerHTML = "Loading fail";
		}
	};
	xmlhttp.open('GET','subcat.php',true);
	xmlhttp.send();
	}
</script>
</html>