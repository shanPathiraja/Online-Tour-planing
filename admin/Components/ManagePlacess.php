<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ashoke Group admin panel</title>
<link href="css/myStyle.css" rel"stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="./includes//bootstrap-4.3.1-dist/css/bootstrap.min.css"> -->

<link rel="stylesheet" href="../includes/fontawesome-free-5.12.0-web/css/all.css">
<link href="../../css/bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap-grid.css" rel="stylesheet" type="text/css">
</head>

<body>

	
	
	<div class="container">
		
<div class="row">
	<div class="col-xl-2">
				<?php
		include("../../include/connection.php");
	include("../sidebar.php");
	?>
			
			</div>
	<div class="col-xl-10">
	
	  <div class="container">
		
		<div class="row">
		  <div class="col-xl-10 offset-xl-2">
			<h2>Add places</h2>
		  </div>
		  
	    </div>
		  <div class="row">
		  	<div class="col-xl-10 offset-xl-1">
			  <form id="data">
				 
				   <div class="form-group col-xl-11 offset-xl-1">
				  <input type="text" class="form-control" id="place_title" placeholder="Place Title"/>
				  </div>
				  <div class="form-group col-xl-11 offset-xl-1">
				  	<textarea class="form-control" id="place_discription" placeholder="Enter place Discription"></textarea>
				  
				  </div>
				  
				  <div class="form-group col-xl-11 offset-xl-1">
					  <lable>Select place thumb image</lable>
				  	<input type="file" id="place-thumb" class="form-control-file form-control" placeholder="Enter place Discription" accept="image/x-png,image/jpeg">
				  
				  </div>
				  <div class="col-xl-7 offset-xl-3">
				   <button style="width: 100%" type="submit" class="btn btn-primary">Add place</button>
				  </div>
			   
		      </form>
            </div>
		  </div>
		  
	    <div class="row">
		  	<div class="col offset-xl-1 col-xl-10">
			  
			  
			  </div>
		  
		  
		  </div>
	    <div class="row">
	      <div class="offset-xl-1 col-xl-10">&nbsp;</div>
	      
        </div>
	    <div class="row">
	      <div class="offset-xl-2 col-xl-9"> 
			  <div class="h-50"><h3>Placess</h3></div>
			  
			 
			
			</div>
	      
        </div>
		  <div class="container">
	<div class="row">
		<div class="col-xl-1">
		</div>
		<div class="col-lg-9 col-xl-11">
			<div>
        <table class="table" width="100%">
            <thead>
            <tr>
                <th scope="col">#</th>
				<th scope="col">Place name</th>
                <th scope="col">Discription</th>
                <th scope="col">Image</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //query aka liyala tiyenne udama tiyana feathure place 3 ana vidiyata
            $sql ="SELECT
  places.id,
  places.placeName,
  places.Discription,
  places.ThumbImage
FROM places
ORDER BY places.id DESC";

            // $res variable akata qurery aka run karala ana data add wenawa
            $res = mysqli_query($dbcon, $sql);



            // get Feathures place from database
            // while loop aken res wariable ake tiyana row ganata run wenawa
            // a row aken aka $row kiyana variable akata add wenawa
            // $row variable ake structure aka
            // $row :  {[id],[place name],[rating],[details], [image]}
            //$row kiyanne array akak
				$c =0;
            while($row = mysqli_fetch_row($res)){
				
				$c++;
                ?>

                <tr>

                    <td scope="row"><?php echo($c); ?></td>
                    <td scope="row"><?php echo($row[1]); ?></td>
                    <td scope="row"><?php echo($row[2]); ?></td>
                    
                    <td scope="row"><img src="../../uploads/placeImage/<?php echo($row[3]); ?>" width="100"></td>
                    <td scope="row"><button class="btn btn-danger"id="delbtn"value="<?php echo($row[0]); ?>" onClick="delReq(<?php echo($row[0]); ?>)">Remove</button></td>

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
                        url: "functions/delPlaces.php", //the page containing php script
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
    </div>
	
	
	
	
		</div>
	</div>
	<script>
		
		$("form#data").submit(function(e){
			e.preventDefault();
			var placeName = document.getElementById("place_title").value;
			var placeDiscription = document.getElementById("place_discription").value;
			var placeImage = document.getElementById("place-thumb").value;
			
			var imageFile = $('#place-thumb')[0].files[0];
			
			var form = document.getElementById("data")
			var validExtensions = ['jpg','png','jpeg'];
			console.log(imageFile);
			
			if(placeName==""||placeDiscription==""){
				
				alert("please fill all fild");
				
				return null;
			}
			
			if(placeImage==""){
				
				alert("Please select Image");
				
				return null;
			}
			var imageLow = placeImage.toLowerCase();
			
			var extention = imageLow.substring(imageLow.lastIndexOf('.')+1);
			
			console.log(extention);
			if($.inArray(extention,validExtensions)){
				
			}else{
				alert("extention not support");
				return null;
				
			}
			
			
			
			var formData = new FormData();
			
			formData.append('placeName',placeName);
			formData.append('placeDiscription',placeDiscription);
			
			formData.append('image',imageFile);
			
			
			$.ajax({
				url: "functions/addPlaces.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
			location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
			});
			
			console.log(formData);
		})
		
	</script>
	
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	
</body>
</html>