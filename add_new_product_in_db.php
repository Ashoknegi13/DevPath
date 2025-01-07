<?php
   session_start();
     if($_SESSION['usertype']=="admin" || $_SESSION['usertype']=="user" ){


	include 'connection.php';
	$product_id =           $_POST['product_id'];
	$course_title =         $_POST['course_title'];
	$course_discription =   $_POST['course_discription'];
	$level =                $_POST['level'];
	$prerequisites =        $_POST['prerequisites'];
	$course_content =       $_POST['course_content'];
	$duration =             $_POST['duration'];
	$prise =                $_POST['prise'];
	$course_meterials =     $_POST['course_meterials'];
	$certification =        $_POST['certification'];
	$img_name 				=			$_FILES['image']['name'];
	$tmp_name 				=			$_FILES['image']['tmp_name'];
	$folder						=			"product_logo/".$img_name;

	$sql = "INSERT INTO product(product_id,course_title,course_discription,level,prerequisites,course_content,duration,prise,course_meterials,certification,p_image) VALUES('$product_id','$course_title','$course_discription','$level','$prerequisites','$course_content','$duration','$prise','$course_meterials','$certification','$img_name') ";
	$result = mysqli_query($conn,$sql) or die("Query failed");
	if($result){
		move_uploaded_file($tmp_name,$folder);
		header("Location:  getdata.php");
	}else{
		echo "No data insert";
	}

}
	elseif($_SESSION['usertype']=="normal"){
		header("Location: getdata.php");

	}else{
		session_destroy();
		header("Location: signup.php");
	}

?>