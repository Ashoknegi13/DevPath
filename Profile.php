<?php
session_start();
include'nav.php';

if(isset($_POST['btn'])){

 
$yid = $_POST['yid'];
	 $name = $_POST['name'];
	  $pass = $_POST['pass'];
	 $email = $_POST['email']; 
	 $ph = $_POST['ph'];
	 $age= $_POST['age'];
	 $gender =$_POST['gender'];
	 $file_name = $_FILES['image']['name'];
	 $file_tmp = $_FILES['image']['tmp_name'];
	 $folder = "upload-image/".$file_name;
	 include'connection.php';
	 if(!empty($file_name)){
	 $sql = "UPDATE userdata SET name     ='$name',
	 							 password = '$pass',
	 							 email    ='$email',
	 							 phone =    '$ph',		
	 							 age      ='$age',
	 							 gender   ='$gender',
	 							 file     ='$file_name' 
	 							WHERE id = '$yid'  ";
	 						}
	 						else{
	 $sql = "UPDATE userdata SET name     ='$name',
	 							 password = '$pass',
	 							 email    ='$email',
	 							 phone =    '$ph',		
	 							 age      ='$age',
	 							 gender   ='$gender' 
	 							WHERE id = '$yid'  ";	
	 						}

   $result = mysqli_query($conn,$sql) or die("query failed");
   if($result){
   	  move_uploaded_file($file_tmp,$folder);
    
   	 echo "<script>alert('UPDATE SUCCESSFULLY .....')</script>";
   }else{
   	  echo "can't match profile";
   	  echo "<a href='profile.php'> Go back</a>";
   }

}

 
if($_SESSION['usertype']=="admin" || $_SESSION['usertype']=="user" || $_SESSION['usertype']=="normal"){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	   <style>
	  	body{
				font-family: arial;
				background-image: url('upload-image/2.jpg');
		    	background-size: cover;
			    opacity: 0.8;
			 
			}
	  	#box{
				border: 2px solid  slateblue;
/*				background-color: tan;*/
                 background-color:  gray;
				padding: 10px;
				margin-left:450px;
				text-align: center;
				margin-top: 70px;
				border-radius: 50px;
				height: 400px;

			}
			#box input{
				border-radius: 50px;
				margin: 5px;
				padding: 10px;
			}
			h1,h3{
				text-align: center;
			}
			#box label{
				font-size: 20px;
			}
	  </style>
</head>
<body>
		<form action="" method="POST" enctype="multipart/form-data">
			<table id="box">
				<?php
					include'connection.php';
					$uid = $_SESSION['uid'];
					$sql = "SELECT * FROM userdata WHERE id = '$uid' ";
					$result = mysqli_query($conn,$sql) or die("query failed");
					if(mysqli_num_rows($result)>0){
						while ($row = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					
						<td><label>Profile Picture :</label></td>
						<td><?php  
								if($row['file']==""){
									echo  '<img src="user_logo/1.png" style="width: 100px; border-radius:20px; border: 1px solid black "> ';
								}else{
								?>
							  <img src="upload-image/<?php echo $row['file']?>"  style="width: 100px; border-radius:20px; border: 1px solid black" /> 		
							  <?php    
								}
								?>

					     </td>
					 
				<tr>
					
						<td><label>User ID :</label></td>
						<td><input type="text" name="yid" readonly value="<?php echo $row['id']; ?> " ></td>
					 
				</tr>

				<tr>
					
						<td><label>Name :</label></td>
						<td><input type="text" name="name" value="<?php echo $row['name']; ?> " ></td>
					 
				</tr>

				<tr>
					
						<td><label> Password :</label></td>
						<td><input type="text" name="pass" value="<?php echo $row['password']; ?>" ></td>
					 
			   </tr>


			   	<tr>
				
						<td><label>Email id:</label></td>
					<td><input type="email" name="email" value="<?php echo $row['email']; ?>" ></td>
					
				</tr>

				<tr>
				
						<td><label> Phone Number:</label></td>
						<td><input type="text" name="ph" value="<?php echo $row['phone']; ?>" ></td>
				 	
				 </tr>

				<tr>
				
						<td><label>Age :</label></td>
						<td><input type="text" name="age" value="<?php echo $row['age']; ?>" ></td>
					
				</tr>
		             
				<tr>
		           
						<td><label>Gender :</label></td>

						<td>
								<select name="gender" >
									<option><?php echo  $row['gender']; ?></option>
									<option>male</option>
									<option>female</option>
								</select>
					   </td>
				
				</tr>

				<tr>
						<td><label>UserType:</label></td>
						<td><input type="text" name="usertype" readonly value="<?php echo $row['usertype']; ?>" ></td>
					
				</tr>

				<tr>
				
						<td><label>change Poto :</label></td>
						<td><input type="file" name="image"></td>
					
				</tr>
				<tr> <td></td>
						<td><button style="background:cyan;margin-left: 90px; border-radius: 50px;" name="btn">Update Profile</button></td>
				   </tr>

				<?php 
					  }
					}else{
						echo "No data found ";
					}
				?>
			</table>

					
				   <tr>
						<td><button style="background: blue; border-radius:50px;width:200px;height:40px"><a style="color: white;text-decoration: none; " href="getdata.php">Home page</a></button></td>
				   </tr>
		</form>
</body>
</html>
<?php
	include'footer.php';
}else{
	header("Location: signup.php");
}
?>


