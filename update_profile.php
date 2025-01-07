<?php
	
	 $yid = $_POST['yid'];
	 $name = $_POST['name'];
	  $pass = $_POST['pass'];
	 $email = $_POST['email'];
	 $age= $_POST['age'];
	 $gender =$_POST['gender'];
	
	 include'connection.php';
	 $sql = "UPDATE userdata SET name     ='$name',
	 							 password = '$pass',
	 							 email    ='$email',		
	 							 age      ='$age',
	 							 gender   ='$gender'
	 							WHERE id = '$yid'
	 									";
   $result = mysqli_query($conn,$sql) or die("query failed");
   if($result){
   	header("Location:profile.php");
   }else{
   	  echo "can't match profile";
   	  echo "<a href='profile.php'> Go back</a>";
   }
?>