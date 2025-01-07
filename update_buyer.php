 <?php

     include 'connection.php';
 $pid = $_POST['id'];
 $uid =  $_POST['uid'];
$name =  $_POST['name'];
$email = $_POST['email'];
$phone  = $_POST['phone'];
$age=    $_POST['age'];
$date =  $_POST['date'];
$state=  $_POST['state'];

	$sql = "UPDATE  buyer SET 
	                           name='$name',
	                           email='$email',
	                           phone='$phone',
	                           age='$age',
	                           date='$date',
	                            state='$state'
	                            WHERE  id = $pid";

	$result = mysqli_query($conn,$sql) or die("Query failed");
	 if($result){
	 	header("Location: sell_product.php");
	 }
	 else{
	 	echo "Data not update";
	 }


?>