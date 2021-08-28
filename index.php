<!DOCTYPE html>
<html lang="en">
<head>
<title>Ashok</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	
	<?php 
	
	include("include/connection.php");
	
	?>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/alex-brush:n4:default.js" type="text/javascript"></script>
</head>

<body>

<?php 
	
	include("mainNav.php");
	
	?>

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
			<ul>
				<li class="menu_item"><a href="#">home</a></li>
				<li class="menu_item"><a href="about.php">about us</a></li>
				<li class="menu_item"><a href="offers.php">offers</a></li>
				<li class="menu_item"><a href="MakeOrder.php">news</a></li>
				<li class="menu_item"><a href="contact.php">contact</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<?php 
	
	include("mainSlider.php");
	
	?>
	<!-- Search -->



	<!-- Intro -->
	
	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="intro_title text-center">You can plan your trip where you wish to go</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="intro_text text-center">
					  <p>you must wach this places in your own eyes</p>
					</div>
				</div>
			</div>
			<div class="row intro_items">

				<!-- Intro Item -->

				<?php 
				//query aka liyala tiyenne udama tiyana feathure place 3 ana vidiyata
				$sql ="SELECT
  places.id,
  places.placeName,
  places.ThumbImage
FROM places
ORDER BY places.id DESC LIMIT 0 ,3";
				
				// $res variable akata qurery aka run karala ana data add wenawa
				$res = mysqli_query($dbcon, $sql);
				
				
				
				// get Feathures place from database
				// while loop aken res wariable ake tiyana row ganata run wenawa 
				// a row aken aka $row kiyana variable akata add wenawa
				// $row variable ake structure aka
				// $row :  {[id],[place name],[rating],[details], [image]}
				//$row kiyanne array akak
				while($row = mysqli_fetch_row($res)){
					?>
				
				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@dnevozhai -->
						<div class="intro_item_background" style="background-image:url(<?php echo("uploads/placeImage/".$row[2]); ?>)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							
							<div class="button intro_button"><div class="button_bcg"></div>
								<a href="./placesImage.php?id=<?php echo($row[0]); ?>&place=<?php echo($row[1]); ?>">see more<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h2><?php echo($row[1]); ?></h2>
								
								
							</div>
						</div>
					</div>
				</div>
				
				<?php
					
				
				
				}
				
				?>

				


			</div>
		</div>
	</div>

	<!-- CTA -->

	<div class="cta">
		<!-- Image by https://unsplash.com/@thanni -->
		<div class="cta_background" style="background-image:url(images/cta.jpg)"></div>
		
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- CTA Slider -->

					<div class="cta_slider_container">
						<div class="owl-carousel owl-theme cta_slider">

							<!-- CTA Slider Item -->
                            <?php
                            //select from 2nd_slideshow  table
                            //all item in table are listed
                            // one by one row display using while loop
                            //this can edit from admin panel
                            $sql2ndSlide ="SELECT * FROM ashok_group.`2nd_slideshow`";

                            $res=mysqli_query($dbcon,$sql2ndSlide);



                            while ($row = mysqli_fetch_row($res))
                            {
                            ?>
							<div class="owl-item cta_item text-center">
								<div class="cta_title"><?php echo($row[1]) ?></div>
								
								<p class="cta_text"><?php echo($row[2]) ?></p>
								<div class="button cta_button"><div class="button_bcg"></div><a href="MakeOrder.php">Book now<span></span><span></span><span></span></a></div>
							</div>


                            <?php } ?>
							
						</div>

						<!-- CTA Slider Nav - Prev -->
						<div class="cta_slider_nav cta_slider_prev">
							<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='cta_grad_prev'>
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
						
						<!-- CTA Slider Nav - Next -->
						<div class="cta_slider_nav cta_slider_next">
							<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='cta_grad_next'>
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

					</div>

				</div>
			</div>
		</div>
					
	</div>

	<!-- Offers -->

	<div class="offers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2 class="section_title">New Trip plans</h2>
				</div>
			</div>
			<div class="row offers_items">
                <?php
                //select from offers  table
                //all item in table are listed
                // one by one row display using while loop
                //this can edit from admin panel
                $sql2ndSlide ="SELECT  plans.PlanTitle, plans.Days, plans.Price,  plans.planImage, plans.createDate, plans.planDiscription FROM plans ORDER BY plans.createDate DESC LIMIT 2";

                $res=mysqli_query($dbcon,$sql2ndSlide);



                while ($row = mysqli_fetch_row($res))
                {
                ?>
				<!-- Offers Item -->
				<div class="col-lg-6 offers_col">
					<div class="offers_item">
						<div class="row">
							<div class="col-lg-6">
								<div class="offers_image_container">
									<!-- Image by https://unsplash.com/@kensuarez -->
									<div class="offers_image_background" style="background-image:url('uploads/planThumb/<?php echo($row[3]); ?>')"></div>
									<div class="offer_name"><a href="#"><?php echo($row[0]) ?></a></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="offers_content">
									<div class="offers_price"><?php echo($row[2]) ?><span>per person</span></div>
									
                                    <div class="tab-content">
									<span class="offers_text" style="display: block; width: 150px;word-wrap:break-word;"><?php echo($row[5]) ?></span>
                                    </div>
									
									<div class="offers_link"><a href="offers.php">View this Plan</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>

                <?php } ?>


			</div>
		</div>
	</div>

	<!-- Testimonials -->

	<div class="testimonials">
		<div class="test_border"></div>
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2 class="section_title">what our clients say about us</h2>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<!-- Testimonials Slider -->


					<div class="test_slider_container">
						<div class="owl-carousel owl-theme test_slider">
                            <?php
                            //select from offers  table
                            //all item in table are listed
                            // one by one row display using while loop
                            //this can edit from admin panel
                            $sql2ndSlide ="SELECT
  comment.id,
  comment.Cus_name,
  comment.date,
  comment.title,
  comment.Comment,
  comment.image
FROM comment
ORDER BY comment.id DESC";

                            $res=mysqli_query($dbcon,$sql2ndSlide);



                            while ($row = mysqli_fetch_row($res))
                            {
                            ?>
							<!-- Testimonial Item -->
							<div class="owl-item">
								<div class="test_item">
									<div class="test_image bg-info" ><img src="./uploads/commentImage/<?php if($row[5]!=""){ echo($row[5]);}else{echo('logo.png');} ?>" alt="https://unsplash.com/@anniegray"></div>
									<div class="test_icon"><img src="images/backpack.png" alt=""></div>
									<div class="test_content_container">
										<div class="test_content">
											<div class="test_item_info">
												<div class="test_name"><?php echo($row[1]) ?></div>
												<div class="test_date"><?php echo date("Y-m-d",strtotime($row[2])); ?></div>
											</div>
											<div class="test_quote_title">" <?php echo($row[3]) ?> "</div>
											<p class="test_quote_text" style="display: block; width: 150px;word-wrap:break-word;"><?php echo($row[4]) ?></p>
										</div>
									</div>
								</div>
							</div>
                                <?php } ?>


						</div>

						<!-- Testimonials Slider Nav - Prev -->
						<div class="test_slider_nav test_slider_prev">
							<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='test_grad_prev'>
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
						
						<!-- Testimonials Slider Nav - Next -->
						<div class="test_slider_nav test_slider_next">
							<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='test_grad_next'>
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

					</div>
					
				</div>
			</div>

		</div>
	</div>



	<div class="contact">
		<div class="contact_background" style="background-image:url(images/contact.png)"></div>

		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="contact_image">
						
					</div>
				</div>
				<?PHP 
	//++++++++++++++++++++++++++++++++++++Contact form functions+++++++++++++++++++++++++++++++++++++++++++++
				if(isset($_POST["btnSendMessage"])){
					
					var_dump($_POST);
				}
				
				?>
				
				
				<div class="col-lg-7">
					<div class="contact_form_container">
						<div class="contact_title">Give a Comment</div>
						<form action="#" id="contact_form" class="contact_form" method="post" onSubmit="return false">
							<div class="form-group">
							<input type="text" id="comment_form_name" class="form-control" placeholder="Name" required="required" data-error="Name is required.">
							</div>
							<div class="form-group">
							<input type="text" id="comment_form_email" class="form-control" placeholder="E-mail" required="required" data-error="Email is required.">
							</div>
							<div class="form-group">
							<input type="text" id="comment_form_subject" class="form-control" placeholder="Subject" required="required" data-error="Subject is required.">
							</div>
							<div class="form-group">
							<textarea id="comment_form_message" class="form-control" name="message" rows="4" placeholder="Comment" required="required" data-error="Please, write us a message."></textarea>
							</div>
							<div class="form-group">
								<label for="cmnt-image">Chose image to comment</label>
							<input type="file" class="form-control" id="cmnt-image">
							
							</div>
							
							
							
							
							
							
							<button onClick="sendComment()"  id="btnSendMessage" value=""btnSendMessage"" class="form_submit_button button">Put Comment<span></span><span></button><span></span></input>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
            function sendComment(){
				
				var name = document.getElementById("comment_form_name").value;
				var email = document.getElementById("comment_form_email").value;
				var subject = document.getElementById("comment_form_subject").value;
				var message = document.getElementById("comment_form_message").value;
				
				var img_file = document.getElementById("cmnt-image").value;
			var imageFile = $('#cmnt-image')[0].files[0];
			
			 
				
                //alert(id);
                if((name==null||name=="")&&(email == null||email=="")&&(subject==null||subject=="")&&(message==null||message==""))
					{
						alert("please fill all fiealds");
						return null;
						
					}
						if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
							{
								}
						else{
							alert("You have entered an invalid email address!");
							return null;
						} 
								
							
				var validExtensions = ['jpg','png','jpeg'];
				
				if(img_file==""){
				
				alert("Please select Image");
				
				return null;
			}
			var imageLow = img_file.toLowerCase();
			
			var extention = imageLow.substring(imageLow.lastIndexOf('.')+1);
			
			console.log(extention);
			if($.inArray(extention,validExtensions)){
				
			}else{
				alert("extention not support");
				return null;
				
			}
			
			
		
			var formData = new FormData();
				
				formData.append('name',name);
				formData.append('email',email);
				formData.append('subject',subject);
				formData.append('message',message);
				formData.append('image',imageFile);
				
				$.ajax({
				url: "function/sendComment.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
				document.getElementById("comment_form_name").value="";
							document.getElementById("comment_form_email").value="";
							document.getElementById("comment_form_subject").value="";
							document.getElementById("comment_form_message").value="";
			//location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
			});
							
				
				
                
                   
                
            }
        </script>
	<!-- Footer -->

	<?php
	include("footer.php");
	?>

	<!-- Copyright -->



<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>


</body>

</html>