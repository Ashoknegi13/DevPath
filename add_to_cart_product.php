<?php
session_start();
include("nav.php");
if ($_SESSION['usertype'] == "admin" || $_SESSION['usertype'] == "user" || $_SESSION['usertype'] == "normal") {

	?>

	<html>
	<?php include 'bg_color.php'; ?>
	<h2> Add To your Cart </h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<table>
			<?php
			include 'connection.php';
			$userid = $_SESSION['uid'];
			$product_id = $_GET['id'];
			$sql = "SELECT *FROM product WHERE product_id = '$product_id' ";
			$result = mysqli_query($conn, $sql) or die("Query failed");
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					?>

					<tr>
						<td>Product Image :</td>
						<td style="padding-left: 0px">
							<?php
							if ($row['p_image'] == "") {
								echo "<img src='product_logo/1.png'>";
							} else {
								?>
								<img src="product_logo/<?php echo $row['p_image']; ?>"
									style="width: 100px; border-radius:50px; border: 1px solid black;" />
							<?php
							}
							?>
						</td>
					</tr>
					<tr>
						<td> </td>
						<td><input type="hidden" name="user_id" value="<?php echo $userid; ?>" readonly required></td>
					</tr>
					<tr>
						<td> </td>
						<td><input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" readonly required></td>
					</tr>

					<tr>
						<td><label for="">Course title :</label></td>
						<td><input type="text" name="course_title" value="<?php echo $row['course_title']; ?>" required></td>
					</tr>
					<tr>
						<td><label for="">Normal Prise :</label></td>
						<td><input type="text" name="prise" value="<?php echo $row['prise']; ?>" required readonly></td>
					</tr>



					<tr>
						<td>Quantity</td>
						<td><input type="number" name="quantity" value="1" required></td>
					</tr>


					<tr>
						<td><button name="calculate_prise">Calculate Prise</button></td>
					</tr>


					<?php
					if (isset($_POST['calculate_prise'])) {
						$quantity = $_POST['quantity'];
						?>
						<tr>
							<td><label for="">Prise :</label></td>

							<?php $total = $row['prise'] * $quantity; ?>
							<td><input type="text" name="total_prise" value="<?php echo $total . " Rs/-"; ?> " readonly></td>
						</tr>


						<?php
					}
					?>

					<tr>
						<td><button name="add_cart_btn">add to cart</button></td>
					</tr>
					<?php


					if (isset($_POST['add_cart_btn'])) {
						include 'connection.php';

						echo '<script>alert("Successfully add in cart");</script>';
					}
				}
			}
			?>
		</table>
	</form>
	<button><a style="color:Black" ; href="getdata.php">
			<<<< </a></button>

	</html>

	<?php
} else {
	session_destroy();
	header("Location: signup.php");
}

if (isset($_POST['add_cart_btn'])) {
	$uid          = $_POST['user_id'];
	$pid          = $_POST['product_id'];
	$course_title = $_POST['course_title'];
	$total_prise  = $_POST['total_prise'];
	$quantity     = $_POST['quantity'];

}




?>