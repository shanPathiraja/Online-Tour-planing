<?php 
$id = $_POST["delid"];
include("../../../include/connection.php");
$sqlid = "SELECT
  plans.planImage
FROM plans
WHERE plans.ID ='$id'";
$sql = "DELETE FROM plans
WHERE
  ID = '$id'";


    $res = mysqli_query($dbcon,$sqlid);
    $img="";
    while ($row=mysqli_fetch_row($res)){
        $img =$row[0];
		 $file = "../../../uploads/planThumb/".$img;
		if(!unlink($file)){
        echo ("$file cannot be deleted due to an error");
    }else{
			echo ("$file delete Success");
		}
    }


        if (mysqli_query($dbcon, $sql)) {
            echo "Delete success";
        }
    

?>