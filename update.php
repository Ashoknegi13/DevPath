
  <?php
  	session_start();
  	 
   include("nav.php");
   include("bg_color.php");
  if($_SESSION['usertype']=="admin"){
  ?>
<html>
<title>Edit users</title>
	  <style> 
	  	body{
				font-family: arial;
				color : #fff;
			}
			 
	  	#box{
				border: 2px solid  slateblue;
				background:  linear-gradient(135deg, #1d2671, #c33764);
			 	padding: 10px;
				 width: 50%;
				 margin-left: 23%;
				text-align: center;
				margin-top: 70px;
				border-radius: 50px;
				height: 400px;
				

			}
			#box input,select{
				border-radius: 50px;
				margin: 20px;
				padding: 10px;
			}
			select{
				width: 200px;
			}
			h1,h3{
				text-align: center;
			}
			#box label{
				font-size: 20px;
			}
	  </style>
  
<body>
	<h2 style="text-align:center;color: white;"><u>Update User Details</u></h2>
<form action="updatedata.php" method="POST">
<table id="box">
		<?php
			include 'connection.php';
			$uid = $_GET['id'];
			$sql = "SELECT * FROM userdata WHERE id = {$uid}";
			$result = mysqli_query($conn,$sql) or die("query 1st failed");
			if(mysqli_num_rows($result)>0)
			
				$row=mysqli_fetch_assoc($result);
				
			{
		?>					
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
							<tr>
								<td><label for="uname">Name :</label></td>
								<td><input type="text"  name="uname"  value="<?php echo $row['name'];?>"></td>
							</tr>
								<tr>
								<td><label for="pass">Password :</label></td>
								<td><input type="Password" name="pass" id="pass" placeholder="password" value="<?php echo $row['password'];?>"></td>
							</tr>
							<tr>
								<td><label for="email">Email :</label></td>
								<td><input type="Email" name="email" id="email" placeholder="email" value="<?php echo $row['email'];?>"></td>
							</tr>

							<tr>
								<td><label for="ph">Phone :</label></td>
								<td><input type="number" name="phone" id="ph" placeholder="phone" value="<?php echo $row['phone'];?>" ></td>
							</tr>

							<tr>
								<td><label for="age">Age :</label></td>
								<td><input type="number" name="age" id="age" placeholder="age" value="<?php echo $row['age'];?>"></td>
							</tr>

							<tr>
								<td><label>Gender :</label></td>
								<td><select name="gen">
									<option><?php echo $row['gender']; ?></option>	
									<option  >Male</option>
									<option  >Female</option>
								</select>
							</tr>


							<tr>
								<td><label>User type :</label></td>
								<td><select name="usertype">
									<option><?php echo $row['usertype']; ?></option>
									<option  >admin</option>
									<option  >user</option>
									<option  >normal</option>
								</select>
							</tr>

							 
							<tr>
								<td></td><td>
								<button type="Update" style="background: green; color:white; border-radius: 50px;width: 30%;height: 30px;" >update</button>
								</td>
							</tr>
						<?php
						 } 
				    ?>

	</table>
	</form>
	<button style="background: blue;border-radius:50px;padding:15px;width: 150px;"><a style="color:white; font-size: 30px;text-decoration:none" 	   href="getdata.php">back</a></button>
 </body>

 	<?php   }  // this is   end of admin session 



 	elseif($_SESSION['usertype']=="user"){
 						// this is update for user
  ?>    
     <style>
	  	body{
				font-family: arial;
				color : #fff;
			}
			 
	  	#box{
				border: 2px solid  slateblue;
				background:  linear-gradient(135deg, #1d2671, #c33764);
			 	padding: 10px;
				 width: 50%;
				 margin-left: 23%;
				text-align: center;
				margin-top: 70px;
				border-radius: 50px;
				height: 400px;
				

			}
			#box input{
				border-radius: 50px;
				margin: 2px;
				padding: 10px;
			}
			h1,h3{
				text-align: center;
			}
			#box label{
				font-size: 20px;
				color: white;
			}
	  </style>
  	<body>
	<h2 style="text-align:center;color: white;"><u>Update User Details</u></h2>
<form action="updatedata.php" method="POST">
<table id="box">
		<?php
			include 'connection.php';
			$uid = $_GET['id'];
			$sql = "SELECT * FROM userdata WHERE id = {$uid}";
			$result = mysqli_query($conn,$sql) or die("query 1st failed");
			if(mysqli_num_rows($result)>0)
				$row=mysqli_fetch_assoc($result);
				
			{
		?>					
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
							<tr>
								<td><label for="uname">Name :</label></td>
								<td><input type="text"  name="uname"  value="<?php echo $row['name'];?>"></td>
							</tr>
					 
							<tr>
								<td><label for="email">Email :</label></td>
								<td><input type="Email" name="email" id="email" placeholder="email" value="<?php echo $row['email'];?>"></td>
							</tr>

							<tr>
								<td><label for="ph">Phone :</label></td>
								<td><input type="number" name="phone" id="ph" placeholder="phone" value="<?php echo $row['phone'];?>" ></td>
							</tr>

							<tr>
								<td><label for="age">Age :</label></td>
								<td><input type="number" name="age" id="age" placeholder="age" value="<?php echo $row['age'];?>"></td>
							</tr>

							<tr>
								<td></td><td>
								<button type="Update" style="background:lightgreen;border-radius: 20px;width:20%;height: 40px;">update</button>
								</td>
						
					       				   
							</tr>
						<?php } 

						 

						?>

	</table>
	</form>
		<button style="background: blue;border-radius:50px;padding:15px;width: 150px;"><a style="color:white; font-size: 30px;text-decoration:none"  href="getdata.php">back</a></button>

 </body> 
          <?php }  // this is the end of user  session


        elseif($_SESSION['usertype']=="normal"){
        	  include'bg_color.php';
        	echo "You dont't have any permission to edit data </br>";
        	echo '<a href="getdata.php">Go Back</a>';
        	
        	 
        }
        else{
        	session_destroy();
        	header("Location: signup.php");
        }

        include'footer.php';
		
?>

	</html>