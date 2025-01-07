<?php

$cart_id = $_POST['id'];
$quentity = $_POST['quentity'];

include'connection.php';

$sql = "SELECT * FROM cart_detail WHERE id = {$cart_id} ";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		$cart_product_id = $row['product_id'];
		
		$sql1 = "SELECT * FROM product WHERE product_id = {$cart_product_id}";
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1)>0){
 			
      	   $row1 = mysqli_fetch_assoc($result1);

 		  	  $prise = $row1['prise'];
	   $new_prise = $quentity * $prise;


        $sql2 = "UPDATE cart_detail SET Total_prise ='{$new_prise}' , quentity = '{$quentity}' WHERE id = {$cart_id}  ";

  if(mysqli_query($conn,$sql2)){
  	echo 1;
  }else{
  	echo 0;
  }


   } // second if
 } // first if 
?>