<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<style>
		html,body {
			height: 100%;
			margin:0 0 0 0;
			padding: 0 0 0 0;
		}
		.pano {
			width: 100%;
			height: 100%;
			margin: 0 auto;
			cursor: move;
		}
		.pano .controls {
			position: relative;
			top: 40%;
		}
		.pano .controls a {
			position: absolute;
			display: inline-block;
			text-decoration: none;
			color: #eee;
			font-size: 3em;
			width: 20px;
			height: 20px;
		}
		.pano .controls a.left {
			left: 10px;
		}
		.pano .controls a.right {
			right: 10px;
		}
		.pano.moving .controls a {
			opacity: 0.4;
			color: #eee;
		}
		</style>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

	</head>
	<body>
		<div id="myPano" class="pano">
			<div class="controls">
				<a href="#" class="left">&laquo;</a>
				<a href="#" class="right">&raquo;</a>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
		<script src="jquery.pano.js"></script>
		<script>
		<?
			if($_REQUEST[type] == 1){
				$pic = "Panorama_1_resize.jpg";
			}
			if($_REQUEST[type] == 2){
				$pic = "Panorama_livingRoom.JPG";
			}
			if($_REQUEST[type] == 3){
				$pic = "Panorama_Bedroom.JPG";
			}
		?>
		$(document).ready(function(){
			$("#myPano").pano({
				img: "./<? echo $pic; ?>"
			});
		});
		</script>
	</body>
</html>