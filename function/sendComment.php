<?php
include("../include/connection.php");

if(isset($_POST)){
	
	if(isset($_FILES["image"]))
	{
		$Name = $_POST["name"];
		$email =$_POST["email"];
		$subjecr =$_POST["subject"];
		$message =$_POST["message"];
		
		
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
		move_uploaded_file($file_tmp,"../uploads/commentImage/".$file_name);
		
		
		$qur = "INSERT INTO comment
(Cus_name
 ,date
 ,title
 ,Comment
 ,image
)
VALUES
('$Name' -- Cus_name - VARCHAR(255)
 ,NOW() -- date - DATETIME
 ,'$subjecr' -- title - VARCHAR(255)
 ,'$message' -- Comment - VARCHAR(255)
 ,'$file_name' -- image - VARCHAR(255)
);";
		
		if(mysqli_query($dbcon,$qur)){
			
			echo(" Comment successfully Posted");
		}else{
			echo("Failed to post Comment...!");
		}
		
		
	}}






?>