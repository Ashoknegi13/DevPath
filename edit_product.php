<?php
		session_start();
		include("nav.php");
		if($_SESSION['usertype']=="admin"){


?>

<html>
<head>
	<style>
			 
	  	#box{
				border: 2px solid   slateblue;
/*				background-color: tan;*/
				  background-color:  gray;
				padding: 10px;
				margin-left:400px;
				text-align: center;
				margin-top: 40px;
				border-radius: 50px;
				height: 600px;
			}
			#box input{
				border-radius: 50px;
				margin: 5px;
				padding: 14px;
				 
			}
			h1,h2,h3{
				text-align: center;
			}
			#box label{
				font-size: 20px;
			}

	  </style>
</head>
  <?php include'bg_color.php'; ?> 
	<h2> Update This prdouct!!!</h2>
	<form action="update_product.php" method="POST" enctype="multipart/form-data">
		<table id="box">
			 <?php
			 	include 'connection.php';
			 	 $product_id = $_GET['id'];
			 	$sql = "SELECT *FROM product WHERE product_id = '$product_id' ";
			 	$result = mysqli_query($conn,$sql) or die("Query failed");
			 	if(mysqli_num_rows($result)>0){

			 		while($row=mysqli_fetch_assoc($result)){
			 ?>
			 <input type="hidden" name="id" value="<?php echo $row['product_id'];?>">

			 <tr>
			 	<td>
			 		 <?php
			 		 				if($row['p_image']==""){
			 		 					echo "<img src='product_logo/1.png'>";
			 		 				}else{
			 		 					?>
			 		 					<img src="product_logo/<?php echo $row['p_image'];?>" style="width: 100px; border-radius:50px; border: 1px solid black"/> 
			 		 				<?php	
			 		 				}
			 		 ?>
			 	</td>
			 </tr>




		<tr>
			<td><label for="">Product id :</label></td>
			<td><input type="text"  name="product_id" value="<?php echo $row['product_id'];?>"  readonly   required></td>
		</tr>

		<tr>
			<td><label for="">Course title :</label></td>
			<td><input type="text"  name="course_title"	value="<?php echo $row['course_title'];?>" required></td>
		</tr>

		<tr>
			<td><label for="">Course Discription :</label></td>
			<td><input type="text"  name="course_discription" value="<?php echo $row['course_discription'];?>" required></td>
		</tr>
		
		<tr>
			<td><label for=""> Level : </label></td>
			<td><select name="level" value="<?php echo $row['level'];?>"  required>
				    <option><?php echo $row['level'];?></option>
					<option>Biggner</option>
					<option>Intermideate</option>
					<option>Advanced</option>
			</select></td>
		</tr>
				
		<tr>
			<td><label for="">prerequisites :</label></td>
			<td><input type="text"  name="prerequisites" value="<?php echo $row['prerequisites'];?>"  required></td>
		</tr>
		
		<tr>
			<td><label for="">Course Content : </label></td>
			<td><input type="text"  name="course_content" value="<?php echo $row['course_content'];?>" required></td>
		</tr>
		
		<tr>
			<td><label for="">Duration : </label></td>
			<td><select name="duration"   required>
					<option><?php echo $row['duration'];?></option>
					<option>2 Month</option>
					<option>4 Month</option>
					<option>6 Month</option>
					<option>8 Month</option>
					<option>10 Month</option>
					<option>12 Month</option>
			</select></td>
		</tr>
		
		<tr>
			<td><label for="">Prise :</label></td>
			<td><input type="text"  name="prise" value="<?php echo $row['prise'];?>" required></td>
		</tr>

		<tr>
			<td><label for="">Course Meterials :</label></td>
			<td><input type="text"  name="course_meterials" value="<?php echo $row['course_meterials'];?>" required></td>
		</tr>

		<tr>
			<td><label for="">Certification :</label></td>
			<td><select name="certification"  required>
					<option><?php echo $row['certification'];?></option>
					<option>Yes</option>
					<option>No</option>
			</select></td>
		</tr>

		<tr><td>Change Logo</td> 

			<td> <input type="file" name="f_name"> </td> </tr>
		<tr>
			<td>
				<button name="update_newbtn" style="background: green; color:white; border-radius: 50px;width: 100px;">Update</button>
			</td>
		</tr>
		<?php
	}
}
?>
		</table>
	</form>
	   <button style="background: cyan; border-radius:50px"><a style="color:black; text-decoration:none" 	   href="getdata.php">back</a></button>
</html>

<?php
	}  // end of admin update
	elseif($_SESSION['usertype']=="user"){
?>
   
<html>
<head>
	<style>
			 
	  	#box{
				border: 2px solid   slateblue;
/*				background-color: tan;*/
				  background-color:  gray;
				padding: 10px;
				margin-left:400px;
				text-align: center;
				margin-top: 40px;
				border-radius: 50px;
				height: 600px;
			}
			#box input{
				border-radius: 50px;
				margin: 5px;
				padding: 14px;
				 
			}
			h1,h2,h3{
				text-align: center;
			}
			#box label{
				font-size: 20px;
			}

	  </style>
</head>
     <?php include'bg_color.php'; ?> 
	<h2> Update This prdouct!!!</h2>
	<form action="update_product.php" method="POST">
		<table id="box">
			 <?php
			 	include 'connection.php';
			 	 $product_id = $_GET['id'];
			 	$sql = "SELECT *FROM product WHERE product_id = '$product_id' ";
			 	$result = mysqli_query($conn,$sql) or die("Query failed");
			 	if(mysqli_num_rows($result)>0){

			 		while($row=mysqli_fetch_assoc($result)){
			 ?>
			 <input type="hidden" name="id" value="<?php echo $row['product_id'];?>">

			 <tr>
			 	<td>
			 		 <?php
			 		 				if($row['p_image']==""){
			 		 					echo "<img src='product_logo/1.png'>";
			 		 				}else{
			 		 					?>
			 		 					<img src="product_logo/<?php echo $row['p_image'];?>" style="width: 100px; border-radius:50px; border: 1px solid black"/> 
			 		 				<?php	
			 		 				}
			 		 ?>
			 	</td>
			 </tr>
		 

		<tr>
			<td><label for="">Course title :</label></td>
			<td><input type="text"  name="course_title"	value="<?php echo $row['course_title'];?>" required></td>
		</tr>

		<tr>
			<td><label for="">Course Discription :</label></td>
			<td><input type="text"  name="course_discription" value="<?php echo $row['course_discription'];?>" required></td>
		</tr>
		
		<tr>
			<td><label for=""> Level : </label></td>
			<td><select name="level" value="<?php echo $row['level'];?>"  required>
				    <option><?php echo $row['level'];?></option>
					<option>Biggner</option>
					<option>Intermideate</option>
					<option>Advanced</option>
			</select></td>
		</tr>
				
		<tr>
			<td><label for="">prerequisites :</label></td>
			<td><input type="text"  name="prerequisites" value="<?php echo $row['prerequisites'];?>"  required></td>
		</tr>
		
		<tr>
			<td><label for="">Course Content : </label></td>
			<td><input type="text"  name="course_content" value="<?php echo $row['course_content'];?>" required></td>
		</tr>
		
		<tr>
			<td><label for="">Duration : </label></td>
			<td><select name="duration"   required>
					<option><?php echo $row['duration'];?></option>
					<option>2 Month</option>
					<option>4 Month</option>
					<option>6 Month</option>
					<option>8 Month</option>
					<option>10 Month</option>
					<option>12 Month</option>
			</select></td>
		</tr>
		
		<tr>
			<td><label for="">Prise :</label></td>
			<td><input type="text"  name="prise" value="<?php echo $row['prise'];?>" required></td>
		</tr>

		<tr>
			<td><label for="">Course Meterials :</label></td>
			<td><input type="text"  name="course_meterials" value="<?php echo $row['course_meterials'];?>" required></td>
		</tr>

		<tr>
			<td><label for="">Certification :</label></td>
			<td><select name="certification"  required>
					<option><?php echo $row['certification'];?></option>
					<option>Yes</option>
					<option>No</option>
			</select></td>
		</tr>

		<tr><td></td>
			<td>
				<button name="update_newbtn" style="margin-top:20px;background: green; color:white; border-radius:20px;width: 90px;">Update</button>
			</td>
		</tr>
		<?php
	}
}
?>
		</table>
		 
	</form>
	<button style="background: cyan; border-radius:50px"><a style="color:black; text-decoration:none" 	   href="getdata.php">back</a></button>
</html>

<?php 

 	
} 
 elseif($_SESSION['usertype']=="normal"){
 	header("Location: getdata.php");
 }
else{
	session_destroy();
	header("Location: signup.php");
}
include'footer.php';
?>
