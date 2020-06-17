<?php 
$id = $_POST["delid"];
include("../../../include/connection.php");
//$sqlid = "SELECT feathureplace.image FROM feathureplace WHERE feathureplace.image = '$id'";
$sql = "DELETE FROM `messages` WHERE id = '$id'";
  
  
        if (mysqli_query($dbcon, $sql)) {
            echo "Delete success";
        }
   

?>