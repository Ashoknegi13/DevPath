<?php
session_start();

if ($_SESSION['usertype'] == "admin" || $_SESSION['usertype'] == "user" || $_SESSION['usertype'] == "normal") {
	if (isset($_POST['add_to_cart_btn'])) {
		include 'connection.php';
		$userid = $_SESSION['uid'];

		if (isset($_POST['quantity'])) {
			$total_quentity = $_POST['quantity'];
		} else {
			$total_quentity = 1;
		}

		$product_id = $_POST['product_cart'];

		$sql = "SELECT * FROM product WHERE product_id = {$product_id}";
		$result = mysqli_query($conn, $sql) or die("Query failed");
		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$product_prise = $row['prise'];
			$course_title = $row['course_title'];

			$total_prise = $total_quentity * $product_prise;


			$sql1 = "INSERT INTO cart_detail(user_id,product_id,course_name,Total_prise,quentity) VALUES('$userid','$product_id','$course_title','$total_prise','$total_quentity')   ";
			$result1 = mysqli_query($conn, $sql1) or die("query failed");
			if ($result1) {
				header("Location: show-cart-product.php");

			}
		}

	} else {
		echo "btn does't work";
	}
}
?>