<?php
include 'bg_color.php';
session_start();
if ($_SESSION['usertype'] == "admin" || $_SESSION['usertype'] == "user" || $_SESSION['usertype'] == "normal") {

	?>

	<html>

	<head>
		<title>
			About us
		</title>
		<style>
			body {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				font-size: 17PX;
			}
		</style>
	</head>

	<body>
		<?php
		include 'nav.php';
		?>
		<header>
			<ul>
				<li>
					<h1>Welcome Section </h1>
				</li>
		</header>
		<b>Headline :</b>"Empowering Your Coding Journey"

		<p><b>Discription : </b>
			" Welcome to <u style="color:red">DevPath</u> your gateway to mastering programming skills! We believe that
			coding is for everyone , and our plateform is designed to make learniing both accessible and enjoyable to make
			learning both accessibl eand enjoyable for beginners and professionals alike ".
		</p>

		<h1>
			<li> Mission Statement </li>
		</h1>

		<p>
			" our mission is to provide high-qualit, affordable , and practical programming courses that help you build
			real-world skills and achieve your carrer goals."
		</p>

		<h2>
			<li>What We Offer </li>
		</h2>
		<ul>
			<li><strong>Integrity : </strong>We belive in being transparent and honest with our clients and parteners.</li>
			<li><strong>Innovation : </strong>We belive in being transparent and honest with our clients and parteners.</li>
			<li><strong>Customer Focus : </strong>We belive in being transparent and honest with our clients and parteners.
			</li>
			<li><strong>Teamwork : </strong>We belive in being transparent and honest with our clients and parteners.</li>
		</ul>

		<h2>Why Choose Us?</h2>
		<p>
			At Ashoka organization , we take pride in our customers-appproch. With a combination of exprience , technical
			expertise , and a passion for what we do , we are confident in delivering outstanding result for each project.
		</p>
	</body>
	<?php
	include 'footer.php';
	?>

	</html>
	<?php
} else {
	header("Location: signup.php");
}
?>