
<?php

include("../include/connection.php");
if(isset($_POST))
{
	$name =$_POST["Mname"];
	$email =$_POST["Memail"];
	$sub =$_POST["mSub"];
	$message = $_POST["Mmessage"];
	
	//var_dump($_POST);
	
	$qur ="INSERT INTO `messages`(`Name`, `Email`, `subject`, `message`) VALUES('$name','$email','$sub','$message')";
	
	
	
	if(mysqli_query($dbcon,$qur)){
		echo("Message successfully sended...!");
	}else{
		echo("Message sending faild...!");
	}
}
?>