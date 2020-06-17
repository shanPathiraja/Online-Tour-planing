<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link href="css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">






<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<?php include("include/connection.php"); ?>
	</head>

<body>
	<div >
	
	<?php
	include("mainNav.php");
	?>
		
		</div>
<div class="container" style="margin-top:200px; ">
	<div class="row">
		  <?php
		$id= $_GET["id"];
		//$id =  htmlspecialchars($_GET["id"]);
                //select from mainSlideshow  table
                //all item in table are listed
                // one by one row display using while loop
                //this can edit from admin panel
              
                $sql ="SELECT
  places.id,
  places.placeName,
  places.Discription,
  places.ThumbImage,
  plans.ID
FROM planvsplace
  INNER JOIN places
    ON planvsplace.PlaceID = places.id
  INNER JOIN plans
    ON planvsplace.planID = plans.ID
WHERE plans.ID = $id";

                $res=mysqli_query($dbcon,$sql);

$count =0;

                while ($row = mysqli_fetch_row($res))
                {
                    $count++;
                    ?>
	  <div class="col-xl-3 offset-xl-0" style="margin-bottom: 20px;">
		
		<div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="uploads\placeImage\<?php echo($row[3]); ?>" alt="Card image cap" style="width: 100%;height: 200px;object-fit:cover; ">
		  <div class="card-body">
		    <h5 class="card-title"><?php echo($row[1]); ?></h5>
		    <p class="card-text"><?php echo($row[2]); ?> </p>
		   
			<a href="#" class="btn btn-primary" onClick="photo(<?php echo($row[0]); ?>,'<?php echo($row[1]); ?>')" style="margin-bottom: 20px; width: 100%">View photos</a></div>
	    </div>
      </div>
		
		<?php } ?>
	  
  </div>

	
	
</div>
	<script>
	function photo(id,place){
		
		alert(place);
		window.open('placesImage.php?id='+id+'&place='+place);
	}
	
	</script>
	<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
</body>
</html>