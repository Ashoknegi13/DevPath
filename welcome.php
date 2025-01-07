<?php
include 'nav.php';

?>
<html>

<head>
	<title>Dev Path login Page</title>
	<style>
		body {
			background-image: url('upload-image/2.jpg');
			background-size: cover;
			font-family: arial;

		}

		#box {
			border: 2px solid black;
			background-color: gray;
			border-radius: 20px;
			height: 400px;
			width: 400px;
			margin: 30px;
			padding: 40px;
			text-align: center;
			opacity: 0.7;

		}

		#box input {
			padding: 10px;
			margin-top: 20px;
			border-radius: 20px;
		}

		#box button {
			margin-top: 10px;
			border-radius: 20px;
			width: 90px;
			height: 30px;
			background-color: green;
			color: white;
		}

		h2,
		h3,
		h4 {
			text-align: center;
			color: white;
		}
	</style>
</head>

<body>
	<h2 style="font-size:50px"><u>"Your Path to Success Begins Here- Log In Now."</u> </h2>

	<h2 style="color: red;">!! Access Portal !!</h2>
	<form action="welcome.php" method="POST" autocomplete="off">
		<div align="center">
			<table id="box">
				<tr>
					<td>
						<label id="field">username :</label>
						<input type="text" placeholder="username" name="username" required>
					</td>
				</tr>
				<tr>
					<td>
						<label>password :</label>
						<input type="Password" placeholder="password" name="password" required>
					</td>
				</tr>

				<tr>
					<td>
						<button name="login">Login</button>
					</td>
				</tr>
			</table>
		</div>
	</form>

	<h3 style="color:white;">Dont't Have any account Press <b> --> </b><button
			style="background:cyan; border-radius: 20px;width: 90px;height: 40px;"><a href="signup.php"
				style="text-decoration:none; color:black;">Sign Up</a></button></h3>

</body>

</html>

<?php

include 'footer.php';
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	include "connection.php";
	$sql = "SELECT * FROM userdata WHERE name='$username' && password='$password' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['usertype'] = $row['usertype'];
		$_SESSION['uid'] = $row['id'];
		$_SESSION['uname'] = $row['name'];
		header("Location: getdata.php");
	} else {
		echo "<script>alert('Invalid username and password'); </script>";
	}
}

?>