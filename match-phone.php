<?php
session_start();
$search_value = $_POST['search'];

$conn = mysqli_connect("localhost","root","","user") or die("connection failed");
$sql = "SELECT * FROM  userdata WHERE phone LIKE '%{$search_value}%'   ";
$result = mysqli_query($conn,$sql) or die("query failed");
$output = "";
if(mysqli_num_rows($result)>0){
		 $output .="<input style='width: 180px;height: 20px;background-color:red;color:white' type='text' value='number already Exit'>";
}else{
	$output .="<input style='width: 180px;height: 20px; background-color:green;color:white' type='text' value='Good'>";
}

echo $output;

?>