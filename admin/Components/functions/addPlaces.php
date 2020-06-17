<?php
include('../../includes/connection.php');

if(isset($_POST)){
	
	if(isset($_FILES["image"]))
	{
		$placeName = $_POST["placeName"];
		$placeDiscription = $_POST["placeDiscription"];
		
		
		$t = time();
      $errors= array();
      $file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
		
	$path_info = pathinfo($_FILES['image']['name']);
		echo($path_info['extension']);
		$file_ext =$path_info['extension'];
		$file_name = $t.".".$file_ext;
		move_uploaded_file($file_tmp,"../../../uploads/placeImage/".$file_name);
		
		
		$qur = "INSERT INTO places(placeName,Discription,ThumbImage)VALUES('$placeName','$placeDiscription','$file_name');";
		
		if(mysqli_query($dbcon,$qur)){
			
			echo("Place successfully added");
		}else{
			echo("Failed to add place...!");
		}
		
		
	}}






?>