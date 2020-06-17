<!-- Modal -->


<link rel="stylesheet" href="../../includes/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../includes/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../../includes/bootstrap-4.3.1-dist/css/jquery.mCustomScrollbar.min.css">
 <?php
         include("../../include/connection.php");   //query aka liyala tiyenne udama tiyana feathure place 3 ana vidiyata
            $sql ="SELECT * FROM `orders`";

            // $res variable akata qurery aka run karala ana data add wenawa
            $res = mysqli_query($dbcon, $sql);



            // get Feathures place from database
            // while loop aken res wariable ake tiyana row ganata run wenawa
            // a row aken aka $row kiyana variable akata add wenawa
            // $row variable ake structure aka
            // $row :  {[id],[place name],[rating],[details], [image]}
            //$row kiyanne array akak
            while($row = mysqli_fetch_row($res)){
				
				$oid = $row[0];
                ?>

				
<!-- class="modal fade"--> 
                <div class=" modal fade bd-example-modal-lg" id="orderModel<?php echo($row[0]); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo($row[1]); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		  <div>
		  	<div>
			  	<span>name: <?php echo($row[1]); ?> </span>
			  </div>
			  <div>
			  	<span>email: <?php echo($row[2]); ?> </span>
			  </div>
			  <div>
			  	<span>phone: <?php echo($row[3]); ?> </span>
			  </div>
			  <div>
			  	<span>plan: <?php 
				
				$pq = "SELECT
  orders.planId,
  plans.PlanTitle,
  plans.Days,
  plans.Price,
  orders.id
FROM orders
  INNER JOIN plans
    ON orders.planId = plans.ID
WHERE orders.id = $row[0]";
					
					$pres = mysqli_query($dbcon,$pq);
				
				$plan="";
				$days =0;
				$price=0.00;
				
				while($prow=mysqli_fetch_row($pres)){
					$plan = $prow[1];
					$days = $prow[2];
					$price= $prow[3];
				}
				
				
				echo($plan ."-".$days."days"); ?> </span>
			  </div>
			  <div>
			  	<span>number of persons: <?php echo($row[5]); ?> </span>
			  </div>
		  </div>
		  
		  <div>
			  
			  <table class="table">
			  <tr>
				  <th>day</th>
				  <th>breakfast</th>
				  <th>lunch</th>
				  <th>Dinner</th>
				  </tr>
			  
			  
		  	<?php 
				
				
				
				
				for($count =1;$count<=$days; $count++ ){
					
					?>
				  <tr>
					  
				  <?php
					echo("<td>day-$count</td>");
					
					  	$qf ="SELECT
  food_order.time,
  food_order.dayno,
  foods.title,
  food_order.orderID
FROM food_order
  INNER JOIN foods
    ON food_order.foodID = foods.id
WHERE food_order.dayno = $count
AND food_order.orderID = $oid";
				
				
			  $fres = mysqli_query($dbcon,$qf);
				
				while($frow = mysqli_fetch_row($fres)){
					
					echo("<td>day-$frow[2]</td>");
					
					
				}
					
					
					
			?>
					  </tr>
					  
					  <?php		
				}
				
			
			  
			  ?>
				  
				  </table>
		  
		  </div>
		  
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

            <?php } ?>


