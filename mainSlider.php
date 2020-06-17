<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>
	<?php include("include/connection.php"); ?>
	<div class="home">
		
		<!-- Home Slider -->




		<div class="home_slider_container">
			
			<div class="owl-carousel owl-theme home_slider">

				<!-- Slider Item -->
                <?php
                //select from mainSlideshow  table
                //all item in table are listed
                // one by one row display using while loop
                //this can edit from admin panel
                $slidCount =0;
                $sqlMainSlide ="SELECT * FROM mainslideshow";

                $res=mysqli_query($dbcon,$sqlMainSlide);



                while ($row = mysqli_fetch_row($res))
                {
                    $slidCount++;
                    ?>
				<div class="owl-item home_slider_item" id="mainSlider">
					<!-- Image by https://unsplash.com/@anikindimitry -->
					
					<div class="home_slider_background" style="background-image:url(uploads/<?php echo($row[3]);?>)"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1><?php echo($row[1]);?></h1>
							<h1><?php echo($row[2]);?></h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="<?php echo($row[5]);?>"><?php echo($row[4]);?><span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>



                <?php
                }

                ?>

			</div>
			
			<!-- Home Slider Nav - Prev -->
			<div class="home_slider_nav home_slider_prev">
				<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_prev'>
							<stop offset='0%' stop-color='#fa9e1b'/>
							<stop offset='100%' stop-color='#8d4fff'/>
						</linearGradient>
					</defs>
					<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
					M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
					C22.545,2,26,5.541,26,9.909V23.091z"/>
					<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
					11.042,18.219 "/>
				</svg>
			</div>
			
			<!-- Home Slider Nav - Next -->
			<div class="home_slider_nav home_slider_next">
				<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_next'>
							<stop offset='0%' stop-color='#fa9e1b'/>
							<stop offset='100%' stop-color='#8d4fff'/>
						</linearGradient>
					</defs>
				<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
				M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
				C22.545,2,26,5.541,26,9.909V23.091z"/>
				<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
				17.046,15.554 "/>
				</svg>
			</div>

			<!-- Home Slider Dots -->

			<div class="home_slider_dots">
				<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                    <?Php
                    for ($i =1;$i<=$slidCount;$i++ )
                    {

                    ?>

					<li class="home_slider_custom_dot"><div></div><?php echo "0".$i;?>.</li>
                    <?php } ?>
				</ul>
			</div>
			
		</div>

	</div>
	
	<script>
	
		alert($('.home_slider').length);
		var myIndex = 0;
carousel();

function carousel() {

	var x = document.getElementById("mainSlider");
	alert(x.length);
  var i;
  
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
		
  
		
		
  for (i = 0; i < $('.home_slider').length; i++) {
    homeSlider.trigger('next.owl.carousel');
  }
  
  setTimeout(carousel, 2000); // Change image every 2 seconds

	
	
	
	</script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>
</html>