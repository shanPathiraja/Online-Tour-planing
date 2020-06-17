<?php
include('../../includes/connection.php');

if(isset($_POST)){
	
	
	
	
	if(isset($_FILES["image"]))
	{
		$planTitle = $_POST["planTitle"];
		$planPrice = $_POST["planPrice"];
		$place = json_decode($_POST["place"]);
		$planDays=$_POST["planDays"];
		$planDis=$_POST["planDis"];
		
		$t = time();
      $errors= array();
      $file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
		
	$path_info = pathinfo($_FILES['image']['name']);
		//echo($path_info['extension']);
		$file_ext =$path_info['extension'];
		$file_name = $t.".".$file_ext;
		move_uploaded_file($file_tmp,"../../../uploads/planThumb/".$file_name);
		
		
		$qur = "INSERT INTO plans
(
  
 PlanTitle
 ,Days
 ,Price
 ,planImage
 ,createDate
 ,planDiscription
)
VALUES
('$planTitle' -- PlanTitle - VARCHAR(255)
 ,'$planDays' -- Days - VARCHAR(255)
 ,'$planPrice' -- Price - DECIMAL(19, 2)
 ,'$file_name' -- planImage - VARCHAR(255)
 ,NOW() -- createDate - DATE
 ,'$planDis' -- planDiscription - VARCHAR(255)
);";
		
		if(mysqli_query($dbcon,$qur)){
			
			$latestid = mysqli_insert_id($dbcon);
			//var_dump($place);
			$len = count($place);
			
			for($x=0;$x<$len;$x++){
				$pid = $place[$x];
				
				$pqur = "INSERT INTO planvsplace
(
  planID
 ,PlaceID
)
VALUES
($latestid -- planID - INT(11)
 ,$pid -- PlaceID - INT(11)
);";
				
			
				mysqli_query($dbcon,$pqur);
			}
			
			
			echo("Plan Successfully added...!");
		}else{
			echo("Failed to add place...!");
		}
		
		
	}}






?>