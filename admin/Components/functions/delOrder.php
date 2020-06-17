<?php 
$id = $_POST["delid"];
include("../../../include/connection.php");
//$sqlid = "SELECT feathureplace.image FROM feathureplace WHERE feathureplace.image = '$id'";
$sql = "DELETE FROM food_order
WHERE orderID IN (SELECT id FROM orders WHERE id=$id);";
$sql2 ="DELETE FROM orders WHERE id=$id;";	
	
  
  
        if (mysqli_query($dbcon, $sql)&& mysqli_query($dbcon,$sql2)) {
            echo "Delete success";
        }
		else{
			echo("Delete failed..!");
		}
   

?>