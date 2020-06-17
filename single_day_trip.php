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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<?php include("include/connection.php"); ?>
	</head>

<body>
	
<div class="container">
	<div class="row">
		  <?php
                //select from mainSlideshow  table
                //all item in table are listed
                // one by one row display using while loop
                //this can edit from admin panel
              
                $sql ="SELECT
  plans.ID,
  plans.Price,
  plans.Days,
  plans.PlanTitle
FROM plans
WHERE plans.Days = 1";

                $res=mysqli_query($dbcon,$sql);



                while ($row = mysqli_fetch_row($res))
                {
                    
                    ?>
	  <div class="col-xl-3 offset-xl-0">
		
		<div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="uploads/singleday/70bbde6b14f91bb1d9d7cedc00c932f7_XL.jpg" alt="Card image cap">
		  <div class="card-body">
		    <h5 class="card-title"><?php echo($row[3]); ?></h5>
		    <p class="card-text">RS.<?php echo($row[1]); ?> per person</p>
		    <a href="makeVisit.php?id=<?php echo($row[0]);?>" class="btn btn-success" style="margin-bottom: 20px; width: 100%">Make Visit</a>
			<a href="visitingplace.php?id=<?php echo($row[0]);?>" class="btn btn-primary" style="margin-bottom: 20px; width: 100%">View Visiting places</a></div>
	    </div>
      </div>
		
		<?php } ?>
	  
  </div>

</div>
</body>
</html>