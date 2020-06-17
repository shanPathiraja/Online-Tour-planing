<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ashoke Group admin panel</title>
<link href="css/myStyle.css" rel"stylesheet" type="text/css">
    <link rel="stylesheet" href="./includes//bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./includes/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="./includes/bootstrap-4.3.1-dist/css/jquery.mCustomScrollbar.min.css">

</head>

<body style="background-image:url(&quot;img/aa4.jpg&quot;);background-size:cover;background-position:center;">
				<?php
		include('includes/connection.php');
	
	?>
	
	<?php
	session_start();
	if(isset($_SESSION["UID"])){
		 header('Location:Components/dashboard.php');
	}
	
    if(isset($_POST['submit']))
	{
	if ($_POST['submit']){
        
        $Email=($_POST['email']);
        $password=($_POST['password']);
		echo($Email);
		echo($password);
		$dbEmail="";
        $sql="SELECT `Email` FROM `Users` WHERE Email='$Email' AND Password ='$password'";
		
		echo($sql);
        
		  $dr= mysqli_query($dbcon,$sql);
		
		
      while($row=mysqli_fetch_row($dr))
	  {
          //$row= mysqli_fetch_row($query);
          //$userId= $row[0];
          $dbEmail=$row[0];
          
        }
		
		
		
		//echo($dbEmail);
           if($Email== $dbEmail){
          $_SESSION['UID']=$Email;
       echo "<span style='color:green;'>Login sucess!</span>";
          header('Location:Components/dashboard.php');
        }else{
            echo "<span style='color:red;'>User name or password is incorrect!</span>";
          }    
} 
	
	}
?>
	
	<script>
	//window.location.replace("http://localhost/trip/admin/Components/dashboard.php");
	</script>
	
	<center>
	
 <div class="container-fluid" >
        
	<div class="mt-5" id="bg-block" >
      <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0 col-xl-4 mt-5 offset-xl-0" id="login-block"
			  style="padding: 100px"
			   >
			  
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2 class="text-info font-weight-light mb-5"><img src="img/logo.png" width="100px"></i>&nbsp;Ashok Group</h2>
                    <form method="post">
                        
							<div class="form-group"><label class="text-secondary">Email</label><input class="form-control" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email" name="email"></div>
                        	<div class="form-group"><label class="text-secondary">Password</label><input class="form-control" type="password" required="" name="password"></div>
							<button class="btn btn-info mt-2" type="submit" value="submit" name="submit">Log In</button>
				
					</form>
                    
		  
                </div>
            </div>
</div>
			
         
        </div>
    </div>
	</center>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<div class="container">
		<div class="row">
		<div class="col-xl-1">
	
			
			</div>
		</div>
	</div>
	
	
   
	
</body>
</html>