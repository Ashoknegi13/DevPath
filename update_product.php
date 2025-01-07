 <?php
  session_start();
  if($_SESSION['usertype']=="admin"){

     include 'connection.php';
     $pid = $_POST['id'];
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
	$p_image 			= 		$_FILES['f_name']['name'];
	$tmp_image 			= 		$_FILES['f_name']['tmp_name'];
	$folder =              "product_logo/".$p_image;


	if(!empty($p_image)){
	$sql = "UPDATE product SET product_id = '$product_id',
	                          course_title='$course_title',
	                          course_discription='$course_discription',
	                          level='$level',
	                          prerequisites='$prerequisites',
	                          course_content='$course_content',
	                           duration='$duration',
	                           prise='$prise',
	                           course_meterials='$course_meterials',
	                           certification='$certification',
	                            p_image = '$p_image'  
	                            WHERE product_id = '$pid' ";

	        }else{
	        	$sql = "UPDATE product SET product_id = '$product_id',
	                          course_title='$course_title',
	                          course_discription='$course_discription',
	                          level='$level',
	                          prerequisites='$prerequisites',
	                          course_content='$course_content',
	                           duration='$duration',
	                           prise='$prise',
	                           course_meterials='$course_meterials',
	                           certification='$certification' 
	                            WHERE product_id = '$pid' ";
	        }

	$result = mysqli_query($conn,$sql) or die("Query failed");
	 if($result){
	 	move_uploaded_file($tmp_image,$folder);
	 	header("Location:  getdata.php");
	 }
	 else{
	 	echo "Data not update";
	 }



// <-------------------------end of admin update product ------------------------->
 }elseif($_SESSION['usertype']=="user"){


     include 'connection.php';
     $pid = $_POST['id'];
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

	$sql = "UPDATE product SET  
	                          course_title='$course_title',
	                          course_discription='$course_discription',
	                          level='$level',
	                          prerequisites='$prerequisites',
	                          course_content='$course_content',
	                           duration='$duration',
	                           prise='$prise',
	                           course_meterials='$course_meterials',
	                           certification='$certification' 
	                            WHERE product_id = '$pid' ";

	$result = mysqli_query($conn,$sql) or die("Query failed");
	 if($result){
	 	header("Location:  getdata.php");
	 }
	 else{
	 	echo "Data not update";
	 }
 }  // <--------- tHIS IS END OF USER UPDATE ---------->
 elseif($_SESSION['usertype']=="normal"){
 	header("Location: getdata.php");
 }


 else{
 		session_destroy();
 		header("Location: signup.php");
 }
?>