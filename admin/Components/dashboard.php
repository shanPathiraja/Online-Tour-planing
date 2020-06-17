<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ashoke Group admin panel</title>
<link href="css/myStyle.css" rel"stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="./includes//bootstrap-4.3.1-dist/css/bootstrap.min.css"> -->

<link rel="stylesheet" href="../includes/fontawesome-free-5.12.0-web/css/all.css">
   <link href="../css/myStyle.css" rel"stylesheet" type="text/css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/jquery.mCustomScrollbar.min.css">
</head>

<body>
<div class="container">
	
	
	<div class="row">
	  <div class="col-2 col-xl-3">
					<?php
			session_start();
			
			if(!isset($_SESSION['UID']))
			{
				
		//header('Location:../index.php');
			}
		include("../../include/connection.php");
	include("../sidebar.php");
			
			
	?>
		
<?php
	$qur ="  SELECT( SELECT
	COUNT(places.id) AS expr1
  
  FROM places)
	,
  (SELECT
	COUNT(plans.ID) AS expr2
  
  FROM plans),
  (SELECT
  value
  FROM meta WHERE name ='visiters');";

$res = mysqli_query($dbcon,$qur);
$numPlace=0;
$numPlan =0;
$numVisiters=0;
while($row = mysqli_fetch_row($res)){

$numPlace = $row[0];
$numPlan =$row[1];
$numVisiters = $row[2];
}

?>


		</div>
	  <div class="col-xl-9 offset-xl-0">
		
		<div class="container">
	  	  <div class="row">
		  	  <div class="col-xl-12 mt-5 align-content-center">
			  	<h2>Welcome to Ashok Group Admin panel</h2>
			  </div>
	  	  </div>
		  <div class="row mt-5">
			  <div class="col-xl-5">
			  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../../images/offer_4.jpg" alt="Card image cap" >
  <div class="card-body align-content-center">
	  <center>
	  	  <h3>Total Visiters</h3>
    <h2><?php echo($numVisiters); ?></h2>
	  </center>

  </div>
</div>
			  </div>
			  <div class="col-xl-5 offset-xl-2">
			  	  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../../images/offer_2.jpg" alt="Card image cap">
  <div class="card-body align-content-center">
	  <center>
	  	  <h3>Number of places</h3>
    <h2><?php echo($numPlace); ?></h2>
	  </center>

  </div>
</div>
			  </div>
			  <div class="mt-5 col-xl-5">
			  	  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../../images/gallery_6.jpg" alt="Card image cap">
  <div class="card-body align-content-center">
	  <center>
	  	  <h3>Number of Plans</h3>
    <h2><?php echo($numPlan); ?></h2>
	  </center>

  </div>
</div>
			  
			  </div>
		  </div>
        </div>
      </div>
	 
  </div>
</div>
</body>
</html>