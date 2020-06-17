

<?php
include("../../include/connection.php");

//$_GET["id"] =1;

		$id = $_GET["id"];


		$qur ="SELECT
  *
FROM placessimage
WHERE placessimage.PlaceID =$id";

		
$res = mysqli_query($dbcon,$qur);
?>
		
	<table class="table">
		<tr>
			<th>#</th>
			
			<th>Image</th>
			<th>Discription</th>
			<th>Action</th>
		</tr>


<?php
		$count =0;
		while($row = mysqli_fetch_row($res)){
			$count++;
			?>
		<tr>
			<td><?php echo($count)?></td>
			<td> <img src="../../uploads/placeImage/<?php echo($row[2]);?>" width="300"></td>
			<td><?php echo($row[3]);?></td>
			<td><button class="btn btn-danger" onClick="dellimg(<?php echo($row[0]);?>)">Delete</button> </td>
		</tr>
		<?php
			
		}



?>
		<script>
			function dellimg(id){
				
				 var r = confirm("Are you sure you want to delete Image..?")
                if(r == true) {
                    $.ajax({
                        url: "functions/delImg.php", //the page containing php script
                        type: "POST",
                        data: {delid: id},
                        beforeSend: function () {
                            $('#right').html('checking');
                        },			//request type
                        success: function (result) {
                            alert(result);
                            selectChange();
                        }
                    });
                }
			}
		</script>
		</table>
