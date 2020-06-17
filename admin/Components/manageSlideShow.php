<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ashok group admin panel</title>
	<link href="../css/myStyle.css" rel"stylesheet" type="text/css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/jquery.mCustomScrollbar.min.css">
</head>

<body>
	
	<div class="container">
		<div class="row">
		<div class="col-2 col-xl-2">
				<?php
		include("../../include/connection.php");
	include("../sidebar.php");
	?>
			</div>
			<div class="col-xl">
		
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-md-4 col-md-offset-4">
                        <h3 class="text-center login-title">Main SlideShow</h3><br />
                        <div class="account-wall text-center">
                           
                            <center>
                                <p class="form-signin">
                                <form method="post" action="../Components/functions/mainSlideShowFunc.php" enctype="multipart/form-data">
                                    <input type="text" name="Place Name" id="txtplaceName" class="form-control" placeholder="Title" />
                                    <br/>
                                    <input type="text" name="Place Name2" id="txtplaceName2" class="form-control" placeholder="scond Title" />
									<label for="slctRating">Select Rating</label>
									<select class="form-control" id="slctRating">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
									
									<label for="taDiscription">Discription</label>
    <textarea class="form-control" id="taDiscription" rows="3"></textarea>
                                    <br />
                                    <input type="text" name="Place btn" id="txtslidebtn" class="form-control" placeholder="Button name" />
                                    <br>
                                    <input type="text" name="Place link" id="txtslidelink" class="form-control" placeholder="Paste Link here" />
									 <label for="myfile">Chose image</label>
                <input type="file" name="image" class="form-control-file" id="myfile"/>  
									<br/>
                                    <input type="submit" value="Submit" class="btn btn-lg btn-primary btn-block" />

                                
                                   
                                </form>
                                </p>
                            </center>
                        </div>
					
		
                    </div>
							
                </div>
            </div>
    
	</div>

    
		
	
	
	
	
	
	
	
	
	</div>
	<div class="container">
	<div class="row">
		<div class="col-2">
		</div>
		<div class="col-lg-9">
			<div>
        <table class="table" width="100%">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Place name</th>
                <th scope="col">Rating</th>
                <th scope="col">Discription</th>
                <th scope="col">Image</th>
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
                    <td scope="row"><img src="../../uploads/<?php echo($row[3]); ?>" width="100"></td>
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