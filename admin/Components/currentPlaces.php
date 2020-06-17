<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<link href="../../css/bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap-grid.css.map.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap-reboot.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css">

			<?php
		include("../../include/connection.php");
	
	//$id = htmlspecialchars($_GET["id"]);
	?>
	</head>

<body>
	
	
	
	<div class="container">
		
		<div class="row">
			<div class="col-2">
			<?php include("../sidebar.php"); ?>
			</div>
			<div class="col">
			<div>
        <table class="table" width="100%">
            <thead>
            <tr>
                <th scope="col">#</th>
				<th scope="col">Place name</th>
                <th scope="col">Discription</th>
                <th scope="col">View</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //query aka liyala tiyenne udama tiyana feathure place 3 ana vidiyata
            $sql ="SELECT * FROM `mainslideshow`";

            // $res variable akata qurery aka run karala ana data add wenawa
            $res = mysqli_query($dbcon, $sql);



            // get Feathures place from database
            // while loop aken res wariable ake tiyana row ganata run wenawa
            // a row aken aka $row kiyana variable akata add wenawa
            // $row variable ake structure aka
            // $row :  {[id],[place name],[rating],[details], [image]}
            //$row kiyanne array akak
            while($row = mysqli_fetch_row($res)){
                ?>

                <tr>

                    <td scope="row"><?php echo($row[0]); ?></td>
                    <td scope="row"><?php echo($row[1]); ?></td>
                    <td scope="row"><?php echo($row[2]); ?></td>
                    <td scope="row"><?php echo($row[3]);?></td>
                    <td scope="row"><img src="../../uploads/<?php echo($row[4]); ?>" width="100"></td>
                    <td scope="row"><button class="btn btn-danger"id="delbtn"value="<?php echo($row[0]); ?>" onClick="delReq(this.value)">Remove</button></td>

                </tr>

            <?php } ?>

            </tbody>
        </table>
        <script type="text/javascript">
            function delReq(id){

                //alert(id);
                var r = confirm("Are you sure you want to delete Place?")
                if(r == true) {
                    $.ajax({
                        url: "functions/delSlideShow.php", //the page containing php script
                        type: "POST",
                        data: {delid: id},
                        beforeSend: function () {
                            $('#right').html('checking');
                        },			//request type
                        success: function (result) {
                            alert(result);
                            location.reload();
                        }
                    });
                }
            }
        </script>
    </div></div>
		</div>
	</div>

</body>
</html>