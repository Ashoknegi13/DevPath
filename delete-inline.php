<?php  
session_start();
if($_SESSION['usertype']=="admin"){


include 'connection.php';
 $id = $_GET['id'];

 $sql= "DELETE FROM userdata WHERE id = $id";
 $result = mysqli_query($conn,$sql) or die("Query failed");

 header("Location: getdata.php");

 mysqli_close($conn);
}
elseif($_SESSION['usertype']=="user"  ||  $_SESSION['usertype']=="normal" ){
     header("Location: getdata.php");
}else{
	session_destroy();
	header("Location: index.php");
}

?>