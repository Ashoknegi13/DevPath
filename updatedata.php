<?php 
 session_start();
 if($_SESSION['usertype']=="admin"){

  include 'connection.php';
    $uid = $_POST['id'];
	 $name = $_POST['uname'];
	 $pass = $_POST['pass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
     $age = $_POST['age'];
     $gen = $_POST['gen'];
     $usertype = $_POST['usertype'];
     

	$sql = "UPDATE userdata SET name='$name', password='$pass',email='$email',phone='$phone', age='$age' , gender='$gen', usertype='$usertype' WHERE id= '$uid' ";
	$result=mysqli_query($conn,$sql) or die("query  failed");
	 header("Location: getdata.php");
	 //getdata
 
mysqli_close($conn);

}elseif($_SESSION['usertype']=="user"){
  include 'connection.php';
    $uid = $_POST['id'];
	 $name = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
     $age = $_POST['age'];
$sql = "UPDATE userdata SET name='$name',email='$email',phone='$phone', age='$age' WHERE id= '$uid' ";
	$result=mysqli_query($conn,$sql) or die("query  failed");
	 header("Location: getdata.php");
mysqli_close($conn);
}elseif($_SESSION['usertype']=="normal"){
	header("Location: getdata.php");
}else{
	header("Location: index.php");
}					
?>


						 
