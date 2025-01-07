<?php
  session_start();
  include("nav.php");
  if(isset($_POST['sumbit'])){
  if($_SESSION['usertype']=="admin"  || $_SESSION['usertype']=="user"  || $_SESSION['usertype']=="normal"){
?>

<html>
<title>Thankyou</title>
       <?php include'bg_color.php'; ?> 
	  <h3 align="center"  style='color:red;margin-left:30px'><u> you buy this product :</u></h3>
</html>
<body align="center">

<?php 
 if(isset($_POST['sumbit'])){
	include 'connection.php';
	$product_id = $_POST['product_id'];
	$uid = $_POST['uid'];
	$name = $_POST['b_name'];
	$email = $_POST['b_email'];
	$phone = $_POST['b_phone'];
	$age = $_POST['b_age'];
	$date = $_POST['b_date'];
	$state = $_POST['b_state'];
	$quantity = $_POST['quantity'];


	$sql = "INSERT INTO buyer(product_id,user_id,name,email,phone,age,date,state,quantity) VALUES('$product_id','$uid','$name','$email','$phone','$age','$date','$state','$quantity')   ";
	$result = mysqli_query($conn,$sql) or die("Query failed");
	if($result){
         $sql1 = "SELECT *FROM product WHERE product_id =  $product_id ";
		  $result1 = mysqli_query($conn,$sql1) or die('Query failed');
		  if(mysqli_num_rows($result1)>0){
		  	  while($row=mysqli_fetch_assoc($result1)){
		  	  $total_quantity = $row['prise']*$quantity;
		  	  	 echo "<ol><h3> course_title</h3> :   <li>".  $row['course_title'] ."</li><br><hr>";
		  	  	 echo "<h3>level : <li> </h3>".  $row['level']."</li><br><hr>";
		  	  	 
		  	  	 echo "<h3>duration :  </h3><li>".  $row['duration']. "</li><br><hr>" ;
		  	  	 echo "<h3>Normal prise :  </h3><li>". $row['prise']." Rs/-</li><br><hr>" ;
		  	  	   echo "<h3> Quantity :  </h3><li>". $quantity."</li><br><hr>" ;
		  	  	  echo "<h3> total prise : </h3><li>". $total_quantity." Rs/-</li><br><hr>" ;
		  	  	 echo "<h3>certification : </h3><li>".  $row['certification']."</li><br><hr></ol>" ;
		  	  	  
		  	  }
		  				
		  	 	if($product_id==7){
		  	    echo "<button style='background:yellow;border-radius: 50px;margin-left:80px;height:80px;border-width:3px;border-color:darkred'>
		  	        <a style='color:darkred;text-decoration: none;font-size:20px' href=' https://drive.google.com/file/d/1G2qnyxkhhW6rEJkE6ArQRgO37V-oVOnT/view '>Download Course</a></button>"; 
		  	 	}
		  	 	elseif($product_id==1){
		  	    echo "<button style='background:yellow;border-radius: 50px;margin-left:80px;height:80px;border-width:3px;border-color:darkred'>
		  	        <a style='color:darkred;text-decoration: none;font-size:20px' href=' https://drive.google.com/file/d/1GyVbz3XSXG5eRDw_dgA2Ukfpzr4gxfHD/view'>Download Course</a></button>"; 
		  	 	}elseif($product_id==3){
		  	    echo "<button style='background:yellow;border-radius: 50px;margin-left:80px;height:80px;border-width:3px;border-color:darkred'>
		  	        <a style='color:darkred;text-decoration: none;font-size:20px' href=' https://drive.google.com/file/d/1H9DRoTncPDOPqncQCl98_lDcCFyzF440/view'>Download Course</a></button>"; 
		  	 	}

		  }
	}else{
		echo "can't insert data into databse";
	}

	mysqli_close($conn);
 }else{
 	echo "Data is not submitted";
 }
 
}  // end of session
else{
	header("Location: signup.php");
}
}else{
	header("Location: course.php");
}
?>

</body>