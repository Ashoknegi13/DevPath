<?php
session_start();
include("connection.php");
$search_value = $_POST['search'];

$sql = "SELECT * FROM  userdata WHERE name LIKE '%{$search_value}%'   ";
$result = mysqli_query($conn, $sql) or die("query failed");
$output = "";
if (mysqli_num_rows($result) > 0) {
	$output .= '<tr  style="background: blue; color:white">
					       <th width="100px">Id</th>
					       <th>Name</th>';
	if ($_SESSION['usertype'] == "normal" || $_SESSION['usertype'] == "user") {
		echo "";
	} else {
		$output .= '	<th>password</th>';
	}

	$output .= '<th>email</th>
				 
				        	<th>phone</th>
			            <th>age</th>
			            <th>gender</th>';
	if ($_SESSION['usertype'] == "normal") {
		echo "";
	} else {
		$output .= ' <th>user type</th>
			                 <th>Operations</th>';
	}

	$output .= '</tr>';
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$output .= "<tr style='color:white'> 
                  <td>{$row['id']}</td> 
                    <td>{$row['name']}</td>";
		if ($_SESSION['usertype'] == "normal" || $_SESSION['usertype'] == "user") {
			echo "";
		} else {
			$output .= "   <td>{$row['password']}</td>";
		}

		$output .= " <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['age']}</td>
                  <td>{$row['gender']}</td>";
		if ($_SESSION['usertype'] == "normal") {
			echo "";
		} else {
			$output .= " <td>{$row['usertype']}</td>
      		        <td>
      			     <button style='background:green;border-radius:50px;margin:10px'><a style='color:white;text-decoration:none' href=update.php?id=" . $id . ">edit</a></button>";
			if ($_SESSION['usertype'] == "user") {
				echo "";
			} else {
				$output .= "<button style='background:red;border-radius:50px'><a style='color:white;text-decoration:none' href=delete-inline.php?id=" . $id . ">delete</a></button>
      						 </td>";
			}
		}
		$output .= " </tr>";
	}
	mysqli_close($conn);
	echo $output;

} else {
	echo "Record not found";
}
?>