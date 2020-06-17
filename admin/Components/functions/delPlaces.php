<?php 
$id = $_POST["delid"];
include("../../../include/connection.php");
$sqlid = "SELECT ThumbImage FROM places WHERE id='$id'";
$sqldelplaceImage = "DELETE FROM placessimage WHERE PlaceID = $id;";
$selectPlaceImage ="SELECT image FROM placessimage WHERE PlaceID=$id;";
$sql = "DELETE FROM places WHERE id = '$id'";


    $res = mysqli_query($dbcon,$sqlid);
    $img="";
    while ($row=mysqli_fetch_row($res)){
        $img =$row[0];
		 $file = "../../../uploads/placeImage/".$img;
		if(!unlink($file)){
        echo ("$file cannot be deleted due to an error");
    }else{
			echo ("$file delete Success");
		}
    }





   $res = mysqli_query($dbcon,$selectPlaceImage);

 while ($row=mysqli_fetch_row($res)){
        $img =$row[0];
		 $file = "../../../uploads/placeImage/".$img;
	if(!unlink($file)){
        echo ("$file cannot be deleted due to an error");
    }else{
			echo ("$file delete Success");
		}
    }
    if(mysqli_query($dbcon,$sqldelplaceImage)){
		
	}


        if (mysqli_query($dbcon, $sql)) {
            echo "Delete success";
        }
    

?>