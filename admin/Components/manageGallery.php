<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ashoke Group admin panel</title>
<link href="css/myStyle.css" rel"stylesheet" type="text/css">
      <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/jquery.mCustomScrollbar.min.css">

</head>

<body onLoad="onLoading()">

	<div class="container">
		<div class="row">
		<div class="col-9 col-xl-2">
				<?php
			//error_reporting(E_ALL); ini_set('display_errors', 1);
		include("../../include/connection.php");
	include("../sidebar.php");
	?>
			
			</div>
			
			<div class="col">
			  <div class="container">
	
	<form>
		
		<select id="place" class="form-control" onChange="selectChange()" style="margin: 100px; width: 100;">
		<option selected value="null">Select Place</option>
		
			<?php
				$qur ="SELECT
  id,
  placeName
FROM places;";
			
			$res = mysqli_query($dbcon,$qur);
			
			while($row = mysqli_fetch_row($res)){
				
				echo("<option value='$row[0]'>$row[1]</option>");
			}
			
			
			?>
			
		</select>
  

</form>
	
  </div>
	
<div class="container" id="addImg">
				
		<div align="center">
		<h3>Add Image to this Place</h3>
	</div>
			
	<form class="mt-5" onSubmit="return false">
		<div class="form-group col-xl-11 offset-xl-1">
				  <input type="text" class="form-control" id="img_dis" placeholder="Image Discription"/>
				  </div>
		<div class="form-group col-xl-11 offset-xl-1 mt-4">
					  <lable>Select  image</lable>
				  	<input type="file" id="img_file" class="form-control-file form-control"  accept="image/x-png,image/jpeg">
				  
				  </div>
	 <div class="col-xl-7 offset-xl-3">
					  
				   <button style="width: 100%" onClick="imgUpload()" class="btn btn-primary">Upload Image</button>
				  </div>
	</form>
				</div>				
				
	<div id="Content">
	
	
	
	</div>
	
  <script>
	  
	  function imgUpload(){
		  
		  //e.preventDefault();
			var img_dis = document.getElementById("img_dis").value;
			
		  var place = document.getElementById("place").value;
			var img_file = document.getElementById("img_file").value;
			var imageFile = $('#img_file')[0].files[0];
			
			 
			
			
       
			
			
			
			var validExtensions = ['jpg','png','jpeg'];
			console.log(imageFile);
			
			if(img_dis==""){
				
				alert("please enter Discription");
				
				return null;
			}
			
		  if(place==="null"){
			  alert("Please select Place..!");
				
				return null;
		  }
			if(img_file==""){
				
				alert("Please select Image");
				
				return null;
			}
			var imageLow = img_file.toLowerCase();
			
			var extention = imageLow.substring(imageLow.lastIndexOf('.')+1);
			
			console.log(extention);
			if($.inArray(extention,validExtensions)){
				
			}else{
				alert("extention not support");
				return null;
				
			}
			
			
		
			var formData = new FormData();
			
			formData.append('img_dis',img_dis);
			formData.append('place',place);
			formData.append('image',imageFile);
			
			
			$.ajax({
				url: "functions/addPlaceImg.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
			selectChange();
			//location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
			});
			
			console.log(formData);
	  }
	  
	  function onLoading(){
		  var place = document.getElementById("place").value
		 // document.getElementById("addImg").style.display="none";
			//place.style.display="none";
	  }
	  
	function selectChange(){
		var place = document.getElementById("place").value
		
		alert(place);
		
		if(place !=="null"){
			//document.getElementById("addImg").style.display="block";
			//place.style.display="block";
			$(document).ready(function(){
				alert('placeImageView.php?id='+place);
			$('#Content').load('placeImageView.php?id='+place).fadeIn('slow');
		});
		}else {
			
			alert("Please select Place..!");
		}
		
		
		
	}
	
	
	
	</script>
			
			</div>
		</div>
	</div>
	
	
   
	
</body>
</html>