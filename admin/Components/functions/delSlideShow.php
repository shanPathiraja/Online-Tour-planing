<?php 
$id = $_POST["delid"];
include("../../../include/connection.php");
$sqlid = "SELECT image FROM `mainslideshow` WHERE id =$id";
$sql = "DELETE FROM `mainslideshow` WHERE id = '$id'";
    $res = mysqli_query($dbcon,$sqlid);
    $img="";
    while ($row=mysqli_fetch_row($res)){
        $img =$row(0);
    }
    $file = "../../uploads/".$img;
    if(!unlink($file)){
        echo ("$file cannot be deleted due to an error");
    }else {


        if (mysqli_query($dbcon, $sql)) {
            echo "Delete success";
        }
    }

?>