<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ashoke Group admin panel</title>
<link href="css/myStyle.css" rel"stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="./includes//bootstrap-4.3.1-dist/css/bootstrap.min.css"> -->

<link href="../css/myStyle.css" rel"stylesheet" type="text/css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../includes/bootstrap-4.3.1-dist/css/jquery.mCustomScrollbar.min.css">
</head>

<body onLoad="createTable()">

	
	
	<div class="container">
		
<div class="row">
	<div class="col-9 col-xl-2">
				<?php
		include("../../include/connection.php");
	include("../sidebar.php");
	?>
			
			</div>
	<div class="col-xl-10">
	
	  <div class="container">
		
		<div class="row">
		  <div class="col-xl-5 offset-xl-4">
			<h2>Add Plan</h2>
		  </div>
		  
	    </div>
		  <div class="row">
		  	<div class="col-xl-10 offset-xl-1">
			  <form id="data" class="mt-5" onSubmit="return false">
				 
				   <div class="form-group col-xl-11 offset-xl-1">
				  <input type="text" class="form-control" id="plan_title" placeholder="plan Title"/>
				  </div>
				  <div class="form-group col-xl-11 offset-xl-1">
				  	<input type="number" class="form-control" id="planPrice" placeholder="Enter price">
				  
				  </div>
				  <div class="col-xl-11 offset-xl-1" id ="cont">
				  
				  
				  </div>
				  <div class="col-xl-11 offset-xl-1">
					  <select onChange="addRow()" id="p-place" class="form-control">
					  <option value="null">Select place</option>
						 <?php 
						  	
						  $qur ="SELECT id, placeName FROM places;";
						  
						  $res = mysqli_query($dbcon,$qur);
						  
						  while($row = mysqli_fetch_row($res)){
							  
							  echo("<option value='$row[0]'>$row[1]</option>");
						  }
						  
						  
						  ?>
					  </select>
					  
					  
					
					  <script>
						  
						function  myfunc(){
							
							
							  
						  }
					  var arrHead = new Array();
    arrHead = ['', 'placeId', 'place']; // table headers.

					  function createTable() {
        var empTable = document.createElement('table');
        empTable.setAttribute('class', 'table');  // table id.
		empTable.setAttribute('id', 'place-table');
        var tr = empTable.insertRow(-1);

        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th'); // the header object.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }
						     var div = document.getElementById('cont');
        div.appendChild(empTable);    // add table to a container.
    }
			
						  
					  
						  
						   // function to add new row.
    function addRow() {
		var sb = document.getElementById('p-place');
		var pid = sb.value;
		var pname = sb.options[sb.selectedIndex].text;
		
		var sc = document.getElementById('p-place');
							
							sc.remove(sc.selectedIndex);
		
		
		
        var plTab = document.getElementById('place-table');

        var rowCnt = plTab.rows.length;    // get the number of rows.
        var tr = plTab.insertRow(rowCnt); // table row.
        //tr = plTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);
			
            if (c == 0) {   // if its the first column of the table.
                // add a button control.
                var button = document.createElement('input');

                // set the attributes.
                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Remove');
				button.setAttribute('class','btn-danger');

                // add button's "onclick" event.
                button.setAttribute('onclick', 'removeRow(this)');

                td.appendChild(button);
            }
            else if(c==1) {
                // the 2nd, 3rd and 4th column, will have textbox.
                var tn = document.createTextNode(pid);

                td.appendChild(tn);
            }
			else if(c==2) {
                // the 2nd, 3rd and 4th column, will have textbox.
                var tn = document.createTextNode(pname);

                td.appendChild(tn);
            }
        }
    }
	function removeRow(oButton) {
        var empTab = document.getElementById('place-table');
		
		var pid = empTab.rows[oButton.parentNode.parentNode.rowIndex].cells[1].innerHTML;
		
		var pname = empTab.rows[oButton.parentNode.parentNode.rowIndex].cells[2].innerHTML;
		
		
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
		var sc = document.getElementById('p-place');
		
		var op = document.createElement('option');
		op.setAttribute('value',pid);
		
		var tn = document.createTextNode(pname);
		
		op.appendChild(tn);
		sc.appendChild(op);
		
	
		
		
    }
					  </script>
				  
				  
				  </div>
				   <div class="form-group col-xl-11 offset-xl-1 mt-4">
				  	<input type="text" class="form-control" id="planDis" placeholder="Enter Plan Discription">
				  
				  </div>
				  <div class="form-group col-xl-11 offset-xl-1 mt-4">
				  	<input type="number" class="form-control" id="planDays" placeholder="Enter Number of days">
				  
				  </div>
				  <div class="form-group col-xl-11 offset-xl-1 mt-4">
					  <lable>Select plan thumb image</lable>
				  	<input type="file" id="plan-thumb" class="form-control-file form-control"  accept="image/x-png,image/jpeg">
				  
				  </div>
				  <div class="col-xl-7 offset-xl-3">
					  
				   <button style="width: 100%" onClick="submitplan()" class="btn btn-primary">Add place</button>
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
				<th scope="col">plan title</th>
                <th scope="col">Plans days</th>
                <th scope="col">Plan price</th>
                <th scope="col">Plan thumb</th>
				<th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //query aka liyala tiyenne udama tiyana feathure place 3 ana vidiyata
            $sql ="SELECT
  plans.ID,
  plans.PlanTitle,
  plans.Days,
  plans.Price,
  plans.planImage
FROM plans
ORDER BY plans.ID DESC";

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
					<td scope="row"><?php echo($row[3]); ?></td>
                    
                    <td scope="row"><img src="../../uploads/planThumb/<?php echo($row[4]); ?>" width="100"></td>
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
                        url: "functions/delPlan.php", //the page containing php script
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
		
		function submitplan(){
			//e.preventDefault();
			var planTitle = document.getElementById("plan_title").value;
			var planPrice = document.getElementById("planPrice").value;
			var planDays = document.getElementById("planDays").value;
			var planDis =document.getElementById("planDis").value;
			var planImage = document.getElementById("plan-thumb").value;
			
			var imageFile = $('#plan-thumb')[0].files[0];
			
			 var plTab = document.getElementById('place-table');
			
			const parr =[];

        var rowCnt = plTab.rows.length; 
			console.log(rowCnt);
			
			for(var i =1; i<rowCnt;i++){
				
				parr.push(plTab.rows[i].cells[1].innerHTML);
				
			}
			console.log(parr);
			
			alert("aa");
			var form = document.getElementById("data")
			var validExtensions = ['jpg','png','jpeg'];
			console.log(imageFile);
			
			if(planTitle==""||planPrice==""){
				
				alert("please fill all fild");
				
				return null;
			}
			
			if(planImage==""){
				
				alert("Please select Image");
				
				return null;
			}
			var imageLow = planImage.toLowerCase();
			
			var extention = imageLow.substring(imageLow.lastIndexOf('.')+1);
			
			console.log(extention);
			if($.inArray(extention,validExtensions)){
				
			}else{
				alert("extention not support");
				return null;
				
			}
			
			
			var jsonArr = JSON.stringify(parr);
			var formData = new FormData();
			
			formData.append('planTitle',planTitle);
			formData.append('planPrice',planPrice);
			formData.append('planDays',planDays);
			formData.append('planDis',planDis);
			
			formData.append('image',imageFile);
			formData.append('place',jsonArr);
			
			$.ajax({
				url: "functions/addPlan.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
			//location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
			});
			
			console.log(formData);
		}
		
	</script>
	
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	
</body>
</html>