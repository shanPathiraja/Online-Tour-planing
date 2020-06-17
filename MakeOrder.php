<!DOCTYPE html>
<html lang="en">
<head>
<title>Ashok Group</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">

</head>

<body>




<div class="super_container">
	
	<!-- Header -->

	<?php 
	
	include("mainNav.php");
	
	?>
	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
			<ul>
				<li class="menu_item"><a href="index.php">home</a></li>
				<li class="menu_item"><a href="about.php">about us</a></li>
				<li class="menu_item"><a href="offers.php">offers</a></li>
				<li class="menu_item"><a href="#">news</a></li>
				<li class="menu_item"><a href="contact.php">contact</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/blog_background.jpg"></div>
		<div class="home_content">
			<div class="home_title">Plan Trip</div>
		</div>
	</div>
<div>
  <div class="container">
	
	<form>
		
		<select id="days" class="form-control" onChange="selectChange()" style="margin: 100px; width: 100;">
		<option selected>Select Days</option>
		<option value="1">1day</option>
			<option value="2">2 days</option>
			<option value="3">3 days</option>
			
		</select>
  

</form>
	
  </div>
	
	<div id="Content">
	
	
	
	</div>
	
  <script>
	function selectChange(){
		var day = document.getElementById("days").value
		alert(day);
		
		if(day == 1){
			$(document).ready(function(){
			$('#Content').load('single_day_trip.php').fadeIn('slow');
		});
		}else if(day==2){
			$(document).ready(function(){
			$('#Content').load('two_days_trip.php').fadeIn('slow');
		});
		}
		else if(day==3){
			$(document).ready(function(){
			$('#Content').load('three_days_trip.php').fadeIn('slow');
		});
		}
		
		
		
	}
	
	
	
	</script>


	<?php
	include("footer.php");
	//include("coppyRight.php");
	?>

	<!-- Copyright -->

	

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/blog_custom.js"></script>

</body>

</html>