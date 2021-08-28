<?php 
$dbcon = mysqli_connect("localhost","root","","ashok_group");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   else{
   	//echo "successfully connected!";
   }

 ?>