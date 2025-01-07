<html>

<head>
	<style>
		body {
			margin: 0px;
			padding: 0px;

		}

		.navbar ul {
			background-color: gray;
			/*			        background-color: darkorange;*/
			/*                     background-color:  saddlebrown;*/
			list-style-type: none;
			padding: 0px;
			maergin: 0px;
			overflow: hidden;

		}

		.navbar a {
			color: white;
			text-decoration: none;
			display: block;
			padding: 12px;
			text-align: center;
			overflow: hidden;
		}

		.navbar li {
			float: left;

		}


		.navbar a:hover {
			color: black;
		}


		.navbar .active {
			background-color: blue;
			color: white;

		}
	</style>
</head>
<nav class="navbar">
	<ul>
		<?php
		if (isset($_SESSION['usertype'])) {
			echo '<li><a class="active" href="Profile.php">Profile</a><li>
					 			<li><a  href="getdata.php">| Home</a><li>
					 			<li><a  href="contect.php">| Contect Us</a><li>
								<li><a  href="about.php">| About Us</a><li>
                                <li><a  href="logout.php">|  Logout</a><li>
							<button style="background:blue;margin-left:710px;border-radius:20px"><a href="show-cart-product.php">Show cart Product</a></button>
					 			';
		} else {
			echo '<li><a href="signup.php"> | Register </a></li>
							<li><a  href="logout.php">|  Login</a><li>
							       ';
		}
		?>
	</ul>
</nav>

</html>