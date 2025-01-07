<?php
session_start();
include 'connection.php';
$userid = $_SESSION['uid'];
$sql = " SELECT * FROM cart_detail WHERE user_id = {$userid}";
$result = mysqli_query($conn, $sql) or die("query failed");
$cnt = 0;
$output = "";
if (mysqli_num_rows($result) > 0) {

	$output .= "<table border='1px solid black' cellpadding='5px' cellspacing='0px' style='margin-left:200px;margin-bottom:200px' ><tr style='background-color: blueviolet; color: white;'>
			 	 
				<th>Sr. number</th>
				<th style='width:100px;'>User Id</th>
				<th style='width:200px;'>Course Name </th>
				<th>Total Prise</th>
				<th>Quentity</th>
				<th style='width:100px;'>Save</th>
				<th style='width:100px;'>Delete</th>
				<th style='width:100px;'>Buy</th>
			</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$cnt++;

		$output .= "<tr>
						<td> {$cnt} </td>
						<td>  {$row['user_id']} </td>
						<td> {$row['course_name']} </td>
						<td>  {$row['Total_prise']} </td>
					 
						<td> {$row['quentity']}</td>
						
						<td><input type='button' style='background-color:green;color:white;border-radius:20px;cursor:pointer;width: 70px;margin-left:10px'    data-id='{$row['id']}'   id='edit-cart-quentity' value='Edit'></td>
				 
							
							<td><input type='button' style='background-color:red;color:white;border-radius:20px;cursor:pointer;width: 70px;margin-left:10px' data-id=' {$row['id']}' id='delete-cart-product' value='delete'></td>

							<td><button style='background-color:green ;width: 70px;border-radius:20px;cursor:pointer;margin-left:10px'><a style='color:white;text-decoration:none' href='course.php?id={$row['product_id']}'>Buy</a></button></td>

					</tr>";

	}


	$output .= "</table>";
	echo $output;
}




?>