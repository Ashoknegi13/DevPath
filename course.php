<?php
session_start();
include("nav.php");
if ($_SESSION['usertype'] == "admin" || $_SESSION['usertype'] == "user" || $_SESSION['usertype'] == "normal") {
	?>
	<html>

	<head>
		<title>Course</title>
		<style>
			.heading {
				font-size: 20px;
			}
		</style>
	</head>

	<body>
		<?php include 'bg_color.php';
		$pid = $_GET['id'];
		include "connection.php";
		$sql = "SELECT * FROM product WHERE product_id = '$pid' ";
		$result = mysqli_query($conn, $sql) or die("picture query failed");
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<h2 style='text-align: center; color: white;'><u>'Unlock Your Potential with <b style='color:red'>{$row['course_title']} </b>'</u> </h2><hr><br>
	 				<ol>
	 						<li class='heading'>Headline</li><br>
	 						<ul>
	 							<li>'Achieve Your Goals with  <u style='color:red'>{$row['course_title']} </u> - A Step-by-Step Guide! ' </li>
	 						</ul></br><hr>

	 						<li class='heading'>Course Image </li>
	 						 <ul>
	 						 	 ";
				if ($row['p_image'] == '') {
					echo "<img src='product_logo/1.png' style='width: 70%;  height:600px;border-radius:20px; border: 1px solid black '>";
				} else {
					echo "<img src='product_logo/{$row['p_image']}'  style='width: 70%; height:600px; border-radius:20px; border: 1px solid black'/>  
	 						 </ul><br><hr><br>";
				}

				echo "
	 			   		<li class='heading'>Course Description</li><br>
	 			   		<ul>
	 			   		 <li>{$row['course_discription']}</li>
	 			   		</ul><br><hr><br>

	 			   		<li class='heading'>Key Highlight</li><br>
	 			   		<ul>
	 			   		 <li>{$row['course_meterials']}</li>
	 			   		</ul><br><hr><br>

	 			   		<li class='heading'>Syllabus/Topic Covered</li><br>
	 			   		<ul>
	 			   		 <li>{$row['course_content']}</li>
	 			   		</ul><br><hr><br>

	 			   		<li class='heading'>Course Prerequisites </li><br>
	 			   		<ul>
	 			   		 <li>{$row['prerequisites']}</li>
	 			   		</ul><br><hr><br>

	 			   		<li class='heading'>Course Level </li><br>
	 			   		<ul>
	 			   		 <li>{$row['level']}</li>
	 			   		</ul><br><hr><br>

	 			   	 <li class='heading'>Price </li><br>
	 			   		<ul>
	 			   		 <li>{$row['prise']} Rs/-</li>
	 			   		</ul><br><hr><br>


	 			   		<li class='heading'>Course Duration </li><br>
	 			   		<ul>
	 			   		 <li>{$row['duration']}</li>
	 			   		</ul><br><hr><br>


	 			   </ol>
				<button style='background:cyan;border-radius: 50px;padding:10px;width:10%'><a style='color:black;text-decoration:none';	href='getdata.php'>back</a></button>
				   <button style=' background-color: green;border-radius: 50px;margin-left:35%;height:80px;border-width:3px;border-color:darkred'><a style='color:white;text-decoration: none;font-size:20px' href='buy_course.php?id={$row['product_id']}'>Enroll Now</a></button>"; 
	 			  

			}
		}
		?>

	</body>
	<?php
	include 'footer.php';
	?>


	</html>

<?php }   // end of user and normal and admin 
else {
	header("Location: signup.php");
}


?>