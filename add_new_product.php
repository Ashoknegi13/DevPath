<?php
session_start();
include("nav.php");
 
if ($_SESSION['usertype'] == "admin" || $_SESSION['usertype'] == "user") {
	?>
	<html>

	<head>
		<title>Add New Product</title>
		<style>
			bodY{
				background-image: url('upload-image/2.jpg');
		    	background-size: cover;
			}
			#box {
				border: 2px solid slateblue;
				padding: 10px;
				margin-left: 24%;
				width: 50%;
				text-align: center;
				margin-top: 50px;
				border-radius: 50px;
				height: 100%;
			}

			#box input {
				border-radius: 50px;
				margin: 2px;
			}

			h1,h2,h3 {
				text-align: center;
			}

			#box label {
				font-size: 20px;
			}
		</style>
	</head>

	<body>
		<?php include 'bg_color.php'; ?>
		<h2> Add new prdouct</h2>
		<form action="add_new_product_in_db.php" method="POST" enctype="multipart/form-data" autocomplete="off">
			<table id="box">
				<tr>
					<td><label for="">Product id :</label></td>
					<td><input type="text" placeholder="product id" name="product_id" required style="padding: 5px;"></td>
				</tr>

				<tr>
					<td><label for="">Course title :</label></td>
					<td><input type="text" placeholder="Course title" name="course_title" required style="padding: 5px;">
					</td>
				</tr>

				<tr>
					<td><label for="">Course Discription :</label></td>
					<td><textarea type="text" placeholder="Discription" name="course_discription" required
							style="padding: 5px; border-radius: 40PX;"> </textarea></td>
				</tr>

				<tr>
					<td><label for=""> Level : </label></td>
					<td><select name="level" required style="padding: 5px;  width: 190PX; border-radius: 40PX">
							<option>--SELECT--</option>
							<option>Biggner</option>
							<option>Intermideate</option>
							<option>Advanced</option>
						</select></td>
				</tr>

				<tr>
					<td><label for="">prerequisites :</label></td>
					<td><textarea placeholder="prerequisites" name="prerequisites" required
							style="padding: 5px;border-radius: 40PX;"></textarea></td>
				</tr>

				<tr>
					<td><label for="">Course Content : </label></td>
					<td><textarea type="text" placeholder="Content" name="course_content" required
							style="padding: 5px;border-radius: 40PX;"></textarea></td>
				</tr>

				<tr>
					<td><label for="">Duration : </label></td>
					<td><select name="duration" required style="padding: 5px;  width: 190PX; border-radius: 40PX">
							<option>--SELECT--</option>
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
					<td><input type="number" placeholder="Prise" name="prise" required style="padding: 5px;"></td>
				</tr>

				<tr>
					<td><label for="">Course Meterials :</label></td>
					<td><textarea type="text" placeholder="course Meterials" name="course_meterials" required
							style="padding: 5px;border-radius: 40PX;"></textarea></td>
				</tr>

				<tr>
					<td><label for="">Certification :</label></td>
					<td><select name="certification" required style="padding: 5px;  width: 190PX; border-radius: 40PX">
							<option>--SELECT--</option>
							<option>Yes</option>
							<option>No</option>
						</select></td>
				</tr>

				<tr>
					<td><label>Select Image : </label></td>
					<td><input type="file" name="image"></td>
				</tr>


				<tr>
					<td></td>
					<td>
						<button name="add_newbtn"
							style="background: green; color:white; border-radius: 50px;">Sumbit</button>
					</td>

				</tr>
			</table>
		</form>

		<button style="background: cyan; border-radius:50px"><a style="text-decoration: none;color: black;"
				href="getdata.php">Home page</a></button>
	</body>

	</html>

	<?php
	include 'footer.php';
} // this is end of admin and  user add product section
elseif ($_SESSION['usertype'] == "normal") {
	header("Location: getdata.php");
} else {
	session_destroy();
	header("Location: signup.php");
}
?>