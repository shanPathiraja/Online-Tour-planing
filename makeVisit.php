<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ashok</title>

<link href="css/bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet" type="text/css">

<link href="css/bootstrap-4.4.1-dist/css/bootstrap-grid.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.4.1-dist/css/bootstrap-reboot.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<?php 
	include("include/connection.php"); 
	$_POST['planID'] =7;
	
	
	
	
	
	$_POST['place']="katharagama";
	$_POST['nd']="3";
	
	if(isset($_POST['planID'])){
		
		
		
	$pid = $_GET["id"];
		
		$qur ="SELECT
  ID,
  PlanTitle,
  Days,
  Price
FROM plans WHERE ID =$pid;";
		
		$res = mysqli_query($dbcon,$qur);
		
		$place = "";
	
		$pricep =0.0;
		$nd =0;
	
		while($row = mysqli_fetch_row($res)){
			$place = $row[1];
			$nd = $row[2];
			$pricep =$row[3];
				
			
		}
		
	
	
	?>
<div class="container">
	<div class="row">
		<div class="col" id="foodcontent">
		
		
		</div>
	
	</div>
  <div class="row">
	  <div class=" class="offset-xl-1 col-xl-11"">
	  <h2 >Make visit to <?php echo($place); ?></h2>
	
	  
	  </div>
	  
	  
	  <div class="offset-xl-1 col-xl-11">
	  <form class="form-check">
		  <div class="col-md-2 col-xl-6 offset-xl-2 mt-2 pt-4">
		  
		 
		 
	  <div class="form-group">
	    <label for="name">name</label>
	    <input type="text" class="form-control" id="name" placeholder="Enter name">
	     </div>
		<div class="form-group">
	    <label for="Email1">Email address</label>
	    <input type="email" class="form-control" id="Email" placeholder="Enter email">
	    <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small> </div>
	  <div class="form-group">
	    <label for="phone">Phone number</label>
	    <input type="tel" class="form-control" id="phone" placeholder="enter phone number">
		  <small id="phonehelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
		  
		  <div class="form-group">
	    <label for="phone">Select number of persons attend</label>
		<select id="nop" class="form-control">
			  <option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			
			  
			  </select>	  
	    
		 
      </div>
		   </div>
		  
		  <div> 
		  		<?php
			  
			  	$fqur = "SELECT
  id,
  title,
  price
FROM foods";
			  
		$fres = mysqli_query($dbcon,$fqur);
		
		
			  ?>
			  
			  
				
				   
				 
			  <table class="table" id="table">
			  <tr> 
				  <th>day</th>
				  <th>Time</th>
				  <th>Meals</th>
				 
				  </tr>
				
			
					  <?php 
				  $count =1;
		
		while($count<=(int)$nd){
			
			
			?>
				  <tr>
					  <td rowspan="3">
					  
					  	Day<?php echo($count); ?>
					  </td>
					
				  	
						
					  	<td>Breakfast</td>	
					  <td>
					  
					  <select class="form-control" name='D<?php echo($count)?>'>
						<?php
						  		while($row = mysqli_fetch_row($fres)){
									
									echo("<option value='$row[0]' >$row[1] - rs.$row[2] per person  </option>");
								}
			
							mysqli_data_seek($fres,0);
						  
						  ?>  
						  
						  
						  </select>
					  </td>
				  
				  </tr>
				  
				  <tr>
					  <td>lunch</td>	
					  <td>
					  
					  <select class="form-control" name='D<?php echo($count)?>'>
						  
						  <?php
						  		while($row = mysqli_fetch_row($fres)){
									
									echo("<option value='$row[0]' >$row[1]- rs.$row[2] per person </option>");
								}
			
							mysqli_data_seek($fres,0);
						  
						  ?>  
						  </select>
					  </td>
				  
				  </tr>
				    <tr>
				  <td>dinner</td>	
					  <td>
					  
					  <select class="form-control" name='D<?php echo($count)?>'>
						  <?php
						  		while($row = mysqli_fetch_row($fres)){
									
									echo("<option value='$row[0]'>$row[1]- rs.$row[2] per person </option>");
								}
			
							mysqli_data_seek($fres,0);
						  
						  ?>  
						  </select>
					  </td>
				  </tr>
				    <?php
			$count++;
		}
				  
				  ?>
			  
			  </table>
		  		
		  </div>
	 
		  <button type="button" class="btn btn-primary" onClick="calbill()" data-toggle="modal" data-target="#exampleModalCenter">
  Check order
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table">
		  <tr>
		   	<th>no</th>
			 <th>discriptio</th>
			  <th>charge per person</th>
			  <th>price</th>
		   
			  
		   </tr>
		   
		   <tr>
		   		<td>1</td>
			   <td>traval charge</td>
			   <td id ="tc-person"></td>
			   <td id ="tc-total"></td>
			   
			   
		   </tr>
		   <tr>
		   	<td>2</td>
			   <td>food charge</td>
			   <td id="food-price">	</td>
			   <td id="tfood-price">	</td>
		   
		   </tr>
		   
		   <tr>
		   	<td colspan="3">Total charge</td>
			   <td id="tcharge">  </td>
			   
		   </tr>
		  
		  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-primary" onClick="makeOreder(<?php echo($pid); ?>)">Conferm order</button>
      </div>
    </div>
  </div>
</div>
	  
  </form>
	  
	  </div>
  </div>
</div>
	
	
	
	<?php
	}else{
		
		?>
	
	
	<h2>Invalid Request</h2>
	
	<?php
	}
	
	
	?>
	
	<script>
	function calbill(){
		<?php
			$fqur = "SELECT
  id,
  title,
  price
FROM foods";
			  
		$fres = mysqli_query($dbcon,$fqur);
		
		
		?>
		
		var farr = [ <?php
		
			while($row = mysqli_fetch_row($fres)){
				
				echo("{'id':$row[0],'price':$row[2]},");
			}
			
		?>  ]
		
		<?php
		
		?>
		
		
			
			const pidarr =[];
			var price =0.00;
			
			
			
			<?php 
			
			
			
			
			
			$c=1;
			while($c<=(int)$nd)
			{
				echo("const D$c = document.querySelectorAll(\"[name='D$c']\");");
					
				echo("const food$c = [...D$c].map(select=>select.value);");
					
					
				
				
				echo("pidarr.push(...food$c);");
				
				
				//echo("console.log(day$c);");
				
				
				
				$c++;
				
			}
			
			
			
			?>
			
			//console.log(farr['1'].price);
		
		
			
			
			for(i=0;i<pidarr.length;i++){
				
			var p =	farr.find(x => x.id == pidarr[i]).price;
				
				
				price += p;
				
				
			}
			
		document.getElementById("food-price").innerHTML = price;
		
		var nper = document.getElementById("nop").value;
		
		var totalfood = nper* price;
		
		document.getElementById("tfood-price").innerHTML = totalfood;
		
		var tcper = <?php	echo($pricep); ?>;
		var tctotal = nper * tcper;
		
		document.getElementById("tc-person").innerHTML = tcper;
		document.getElementById("tc-total").innerHTML = tctotal;
		
		var totalCharge = totalfood+tctotal;
		document.getElementById("tcharge").innerHTML = totalCharge;
		
		
		}
	
	
	</script>
	
	<script>
		
	
		
		function makeOreder(pid){
			var formData = new FormData();
			//create dynamic javacript variable using php 
			
			var dayarr = [];
			<?php 
			
			$c=1;
			while($c<=(int)$nd)
			{
				echo("const D$c = document.querySelectorAll(\"[name='D$c']\");");
					
				echo("const food$c = [...D$c].map(select=>select.value);");
					
					echo("const day$c ={'id':'food$c','data':food$c };");
				
				
				echo("dayarr.push(day$c);");
				
				
				//echo("console.log(day$c);");
				
				
				
				$c++;
			}
			
			?>
			
			
			
			 var name = document.getElementById('name').value;
			var email = document.getElementById('Email').value;
			var phone = document.getElementById('phone').value;
			var nop = document.getElementById('nop').value;
			
			
			var jsonArr = JSON.stringify(dayarr);
			
			formData.append('pid',pid);
			formData.append('name',name);
			formData.append('email',email);
			formData.append('phone',phone);
			formData.append('nop',nop);
			formData.append('daymeal',jsonArr);
			
			console.log(formData);
			$.ajax({
				url: "function/makeVisitfunc.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
			
			//window.location.href='index.php';
			
        },
        cache: false,
        contentType: false,
        processData: false
			});
			
		}
		
		
	
			
			
		
	
	</script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</body>
</html>