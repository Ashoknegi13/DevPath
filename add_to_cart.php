<?php

$p_id = $_POST['p_id'];

$conn = mysqli_connect("localhost","root","","user") or die("connection failed");
$sql = "SELECT * FROM   product WHERE product_id = '$p_id' ";
$result = mysqli_query($conn,$sql) or die("query failed");
$output = "";
if(mysqli_num_rows($result)>0){
		$output = '	<h2>add to cart </h2>
				<tr  style="background: skyblue;">
					<th width="100px">Id</th>
					<th>product name</th>
				</tr>';

				while($row= mysqli_fetch_assoc($result)) {
					$id = $row['id'];
 $output .= "<tr style='background-color:cyan'> 
                              <td>{$row['id']}</td> 
                              <td>{$row['course_title']}</td>
            </tr>";
				}
				 

				mysqli_close($conn);
				echo $output;

}else{
      echo "Record not found";
}
?>