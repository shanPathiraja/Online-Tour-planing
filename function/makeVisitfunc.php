<?php 

include("../include/connection.php");
if(isset($_POST['pid'])){
	
	
	$pid = $_POST['pid'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$nop= $_POST['nop'];
	$daymeal =json_decode($_POST['daymeal']) ;
	
	
	$qur = "INSERT INTO orders(name,email,phone,planId,numberOfPersons)VALUES('$name','$email','$phone'  ,$pid ,$nop)";
	
	$res =mysqli_query($dbcon,$qur);
	
	
	
	//var_dump($res);
	
	if($res){
		$id =mysqli_insert_id($dbcon);
		
		
		//var_dump($daymeal);
		$fres = true;
		
		for($x=0;$x< count($daymeal); $x++ ){
			
			$day = $daymeal[$x]->data;
			
			$d = $x+1;
				
			for($z =0; $z<count($day);$z++ ){
				
				$food = $day[0];
				
				$t = $z+1;
				
				//echo($food);
				$qf ="INSERT INTO food_order(orderID ,foodID ,time,dayno)VALUES($id,$food,$t,$d)";
				
				//echo($qf);
				
				if($fres){
					$fres = mysqli_query($dbcon,$qf);
				
					
					
					
				}else{
					echo("Something went to wrong...!");
				}
					
					
				
			}
		
		
		
		
	}
		
		if($fres){
			echo('Your order successfully created..!');
		}
		
	}
	
	
	
	
	
	
	
	//var_dump($day[0]);
	
}else{
	echo('Something went weong please try again..!');
}

?>