<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ashok Group</title>
	<link href="../css/myStyle.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/jquery.mCustomScrollbar.min.css">
</head>

<body>
	
	<div class="container">
		<div class="row">
		<div class="page-wrapper col-xl-2">
				<?php
		include("../../include/connection.php");
	include("../sidebar.php");
	?>
			</div>
			<div class="col-xl-10">
				<h3>View Messages</h3>
				</br></br></br></br>
				<table class="table" width="100%">
					<caption>View Messages</caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">subject</th>
                <th scope="col">Message</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //query aka liyala tiyenne udama tiyana feathure place 3 ana vidiyata
            $sql ="SELECT * FROM `messages`";

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
                    <td scope="row"><?php echo($row[3]);?></td>

                    <td scope="row"><button class="btn btn-danger"id="delbtn"value="<?php echo($row[0]); ?>" onClick="delReq(this.value)">Remove</button></td>

                </tr>

            <?php } ?>

            </tbody>
        </table>
				
			</div>

        </div>
	<div class="container">
	<div class="row">
		<div class="col-xl-1">
		</div>
		<div class="col-lg-9">
			<div>
        
        <script type="text/javascript">
            function delReq(id){

                //alert(id);
                var r = confirm("Are you sure you want to delete This message?")
                if(r == true) {
                    $.ajax({
                        url: "functions/delMsg.php", //the page containing php script
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
    </div>
			
		</div>
	
	
	</div>
	</div>
		
		
	
	</div>
	
	
    <!--<div class="feathurePlace">
        <div class="form-group">
            <form method="POST" action="imgUpload.php" enctype="multipart/form-data">
                <input type="text" class="form-control" id="Place Name"  placeholder="Enter Place name">
                <label for="myfile">Chose image</label>
                <input type="file" name="image" class="form-control-file" id="myfile"/>
        </div>
        <input type="submit"/>
        </form>

    </div>-->
			</div>
		
		</div>
		
		
	
	</div>
	
	
    <!--<div class="feathurePlace">
        <div class="form-group">
            <form method="POST" action="imgUpload.php" enctype="multipart/form-data">
                <input type="text" class="form-control" id="Place Name"  placeholder="Enter Place name">
                <label for="myfile">Chose image</label>
                <input type="file" name="image" class="form-control-file" id="myfile"/>
        </div>
        <input type="submit"/>
        </form>

    </div>-->
</body>
</html>