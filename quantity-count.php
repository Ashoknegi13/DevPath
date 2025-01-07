<?php
 include'connection.php';
$enter_quantity   =   $_POST['quantity'];
$product_id   =   $_POST['id'];

$sql = "SELECT * FROM  product WHERE product_id = '$product_id' ";
$result = mysqli_query($conn,$sql) or die("query failed");
$output = "";
if(mysqli_num_rows($result)>0){
				while($row= mysqli_fetch_assoc($result)) {
					$normal_value = $row['prise'];
 
					$normal_value  = intval($normal_value);
				   
				    $total_prise= ($normal_value * $enter_quantity);
                  $output .= " 
                  				  
                  					
                              <td><b>Total Prise</b></td>
	 			            <td><input type='number' value='{$total_prise}'  readonly	></td>";
				}
				 
				mysqli_close($conn);
				echo $output;

}else{
      echo "Record not found";
}
?>


 
	 				