<?php
include('../../includes/connection.php');

if(isset($_POST)){
	
	var_dump($_POST);
	
	
	
	if(isset($_FILES["image"]))
	{
		$img_dis = $_POST["img_dis"];
		$place =$_POST["place"];
		
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
		
		
		$qur = "INSERT INTO placessimage
(
  PlaceID
 ,image
 ,Discription
)
VALUES
(
  '$place' -- PlaceID - INT(11)
 ,'$file_name' -- image - VARCHAR(255)
 ,'$img_dis' -- Discription - VARCHAR(255)
);";
		
		if(mysqli_query($dbcon,$qur)){
				
			echo("Image Successfully added...!");
		}else{
			echo("Failed to add Image...!");
		}
		
		
	}}






?>