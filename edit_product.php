<?php
session_start();
include("nav.php");
if ($_SESSION['usertype'] == "admin") {
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit Product</title>
	<head>
		<style>
			body{
				font-family: arial;
				color : #fff;
				padding:0px;
				margin:0px;
			}
			#box {
				background:  linear-gradient(135deg, #1d2671, #c33764);
				padding: 10px;
				width: 50%;
				margin-left: 23%;
				text-align: center;
				margin-top: 3%;
				border-radius: 50px;
				height: 600px;
			}

			#box input {
				border-radius: 50px;
				margin: 30px;
				padding: 14px;
				width: 70%;


			}
			textarea{
				margin: 30px;
				width: 90px%;
			}

			h1,
			h2,
			h3 {
				text-align: center;
			}

			#box label {
				font-size: 20px;
			}
			textarea{
				width:40%;	
			}
		</style>
	</head>
	<?php include 'bg_color.php'; ?>
	<h2> Update This prdouct!!!</h2> 
	<form action="update_product.php" method="POST" enctype="multipart/form-data">
		<table id="box">
			<?php
			include 'connection.php';
			$product_id = $_GET['id'];
			$sql = "SELECT *FROM product WHERE product_id = '$product_id' ";
			$result = mysqli_query($conn, $sql) or die("Query failed");
			if (mysqli_num_rows($result) > 0) {

				while ($row = mysqli_fetch_assoc($result)) {
					?>
					<input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">

					<tr>
						<td>
							<?php
							if ($row['p_image'] == "") {
								echo "<img src='product_logo/1.png'>";
							} else {
								?>
								<img src="product_logo/<?php echo $row['p_image']; ?>"
									style="width: 100px; border-radius:50px; border: 1px solid black" />
								<?php
							}
							?>
						</td>
					</tr>




					<tr>
						<td><label for="">Product id :</label></td>
						<td><input type="text" name="product_id" value="<?php echo $row['product_id']; ?>" readonly required></td>
					</tr>

					<tr>
						<td><label for="">Course title :</label></td>
						<td><input type="text" name="course_title" value="<?php echo $row['course_title']; ?>" required></td>
					</tr>

					<tr>
						<td><label for="">Course Discription :</label></td>
						<td><textarea   name="course_discription"  required><?php echo $row['course_discription']; ?></textarea>
						</td>
					</tr>

					<tr>
						<td><label for="level"> Level : </label></td>
						<td><select name="level" value="<?php echo $row['level']; ?>" required>
								<option><?php echo $row['level']; ?></option>
								<option>Biggner</option>
								<option>Intermideate</option>
								<option>Advanced</option>
							</select></td>
					</tr>

					<tr>
						<td><label for="prerequisites">prerequisites :</label></td>
						<td><textarea name="prerequisites"  required> <?php echo $row['prerequisites']; ?> </textarea></td>
					</tr>

					<tr>
						<td><label for="">Course Content : </label></td>
						<td><textarea  name="course_content"  required> <?php echo $row['course_content']; ?> </textarea></td>
					</tr>

					<tr>
						<td><label for="">Duration : </label></td>
						<td><select name="duration" required>
								<option><?php echo $row['duration']; ?></option>
								<option>2 Month</option>
								<option>4 Month</option>
								<option>6 Month</option>
								<option>8 Month</option>
								<option>10 Month</option>
								<option>12 Month</option>
							</select></td>
					</tr>

					<tr>
						<td><label for="">Prise :</label></td>
						<td><input type="text" name="prise" value="<?php echo $row['prise']; ?>" required></td>
					</tr>

					<tr>
						<td><label for="">Course Meterials :</label></td>
						<td><textarea name="course_meterials"  required><?php echo $row['course_meterials']; ?></textarea>
						</td>
					</tr>

				 

					<tr>
						<td>Change Logo</td>

						<td> <input type="file" name="f_name"> </td>
					</tr>
					<tr>
						<td>
							<button name="update_newbtn"
								style="background: green; color:white; border-radius: 50px;width: 60%;">Update</button>
						</td>
					</tr>
					<?php
				}
			}
			?>
		</table>
	</form>
	<button style="background: cyan; border-radius:50px;height:5%"><a style="color:black;font-size:20px; text-decoration:none"
			href="getdata.php">back</a></button>

	</html>

	<?php
}  // end of admin update
elseif ($_SESSION['usertype'] == "user") {
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit Product</title>
 

	<head>
		<style>
			body{
				font-family: arial;
				background-image: url('u	pload-image/2.jpg');
		    	background-size: cover;
				color : #fff;
			}
			#box {
				background:  linear-gradient(135deg, #1d2671, #c33764);
				background-color: gray;
				padding: 10px;
				width: 50%;
				margin-left: 23%;
				text-align: center;
				margin-top: 3%;
				border-radius: 50px;
				height: 600px;
			}
			#box input {
				border-radius: 50px;
				margin: 30px;
				padding: 14px;
				width: 70%;


			}
			textarea{
				margin: 30px;
				width: 90px%;
			}
			h1,
			h2,
			h3 {
				text-align: center;
			}

			#box label {
				font-size: 20px;
			}
		</style>
	</head>
	<?php include 'bg_color.php'; ?>
	<h2> Update This prdouct!!!</h2>
	<form action="update_product.php" method="POST">
		<table id="box">
			<?php
			include 'connection.php';
			$product_id = $_GET['id'];
			$sql = "SELECT *FROM product WHERE product_id = '$product_id' ";
			$result = mysqli_query($conn, $sql) or die("Query failed");
			if (mysqli_num_rows($result) > 0) {

				while ($row = mysqli_fetch_assoc($result)) {
					?>
					<input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">

					<tr>
						<td>
							<?php
							if ($row['p_image'] == "") {
								echo "<img src='product_logo/1.png'>";
							} else {
								?>
								<img src="product_logo/<?php echo $row['p_image']; ?>"
									style="width: 100px; border-radius:50px; border: 1px solid black" />
								<?php
							}
							?>
						</td>
					</tr>


					<tr>
						<td><label for="">Course title :</label></td>
						<td><input type="text" name="course_title" value="<?php echo $row['course_title']; ?>" required></td>
					</tr>

					<tr>
						<td><label for="">Course Discription :</label></td>
						<td><textarea name="course_discription"  required><?php echo $row['course_discription']; ?></textarea>
						</td>
					</tr>

					<tr>
						<td><label for=""> Level : </label></td>
						<td><select name="level" value="<?php echo $row['level']; ?>" required>
								<option><?php echo $row['level']; ?></option>
								<option>Biggner</option>
								<option>Intermideate</option>
								<option>Advanced</option>
							</select></td>
					</tr>

					<tr>
						<td><label for="">prerequisites :</label></td>
						<td><textarea  name="prerequisites" required><?php echo $row['prerequisites']; ?></textarea> </td>
					</tr>

					<tr>
						<td><label for="">Course Content : </label></td>
						<td><textarea name="course_content"  required><?php echo $row['course_content']; ?></textarea></td>
					</tr>

					<tr>
						<td><label for="">Duration : </label></td>
						<td><select name="duration" required>
								<option><?php echo $row['duration']; ?></option>
								<option>2 Month</option>
								<option>4 Month</option>
								<option>6 Month</option>
								<option>8 Month</option>
								<option>10 Month</option>
								<option>12 Month</option>
							</select></td>
					</tr>

					<tr>
						<td><label for="">Prise :</label></td>
						<td><input type="text" name="prise" value="<?php echo $row['prise']; ?>" required></td>
					</tr>

					<tr>
						<td><label for="">Course Meterials :</label></td>
						<td><textarea name="course_meterials"  required><?php echo $row['course_meterials']; ?> </textarea>
						</td>
					</tr>

					< 

					<tr>
						<td></td>
						<td>
							<button name="update_newbtn"
								style="margin-top:20px;background: green; color:white; border-radius:20px;width: 60%">Update</button>
						</td>
					</tr>
					<?php
				}
			}
			?>
		</table>

	</form>
	<button style="background: cyan; border-radius:50px;width:10%;height:5%"><a style="color:black;font-size:20px; text-decoration:none"
			href="getdata.php">back</a></button>

	</html>

	<?php


} elseif ($_SESSION['usertype'] == "normal") {
	header("Location: getdata.php");
} else {
	session_destroy();
	header("Location: index.php");
}
include 'footer.php';
?>