<?php

include'connection.php';
 	$cart_id = 	$_POST['id'];
 	$sql = " SELECT * FROM cart_detail WHERE id = {$cart_id}";
 	$output = "";
 	$result = mysqli_query($conn,$sql) or die("query failed");
    if(mysqli_num_rows($result)>0){
    	$output .= " <form>
							<table>";
							$row = mysqli_fetch_assoc($result);

							$output .=  "<tr>
								   	<td><label>Enter Quentity :</label></td>
								    <td><input type='number'  id='new-quentity' required style='width:70px;border-radius:20px;' value='{$row['quentity']}'></td>
							    </tr>
								<tr><td></td>
							    	<td><input type='button' id='quentity-btn' data-uid={$row['id']} value='Update' style='background-color:green;color:white;border-radius:20px;padding:10px'></td>
								</tr>
							 </table>
						</form>";
   				echo $output;
    }
?>