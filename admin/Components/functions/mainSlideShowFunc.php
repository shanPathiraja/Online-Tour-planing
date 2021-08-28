<?php
	include("../../../include/connection.php");
	if(isset($_FILES["image"])){
		var_dump($_POST);
		$title = $_POST["Place_Name"];
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
			 
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../../../uploads/".$file_name);
		  
		   $sql = "INSERT INTO `mainslideshow`(`header`, `header2`, `image`, `buttonName`, `Link`) VALUES ('$title','ashoke group','$file_name','View more','aa')";
		  
		  
		  if(mysqli_query($dbcon,$sql))
		  {
			  echo "Success";
		  }else{
			  echo $sql.mysqli_error($sql);
		  }
		  
		 
		  
         
      }else{
         print_r($errors);
      }
		
		
		
		
   }else{
		
		
	}
	
	





?>