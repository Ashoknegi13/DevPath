<?php
	include "connection.php";

	$pid = $_GET['id'];

	$sql = "DELETE FROM product WHERE product_id = $pid ";
	$result = mysqli_query($conn,$sql) or die("Query failed");
	header("Location:   getdata.php");

	mysqli_close($conn);



?>