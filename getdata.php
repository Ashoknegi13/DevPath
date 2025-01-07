<?php   // this session is  for admin
  session_start();
  	include('nav.php');
  	?>
  	
  	<html>
  	  <title>Home page</title>
  	<style>
  			body{
			font-family: arial;
			font-size: 15px;
			width: 100%;

		}
			th{
				background-color: blueviolet;
				color: white;
			}
  #modal{
	background:  linear-gradient(135deg, #1d2671, #c33764);
		 position: fixed;
		 top: 150px;
		width: 100%;
		height:  100%;
		z-index: 100;
		border: 1px solid black;
		text-align: center;
		display: none;
		}
		#modal-form{
			background: #fff;
			width:30%;
			position: relative;
			tp:20%;
			left: calc(50% - 15%);
			padding: 15px;
			border-radius: 4px;

		}
		#modal-form h2{
  			margin: 0 0 15px;
  			padding-bottom: 10px ;
  			border-bottom: 1px solid black;
		}
		#close-btn{
			background: red;
			color: white;
			width: 30px;
			height: 30px;
			line-height: 30px;
			text-align: center;
			border-radius: 50px;
			position: absolute;
			top: -15px;
			right: -15px;
			cursor: pointer;
		}

		 #modal-cart{
		 background:  TAN;
		 margin-left: 410px;
		 position: fixed;
		 top: 150px;
		width: 400px;
		height:  100%;
		z-index: 100;
		display: none;
		}
			#close-btn-cart{
			background: red;
			color: white;
			width: 30px;
			height: 30px;
			line-height: 30px;
			text-align: center;
			border-radius: 50px;
			position: absolute;
			top: -15px;
			right: -15px;
			cursor: pointer;
		}
  	</style>
  <?php 
  if($_SESSION['usertype']=="admin"){  
?>
     <style>
   	 	 
   	button{
   		border-radius: 50px;
   	}
   </style>
   <?php include'bg_color.php'; ?>

   <!-- This  model for search modal ----------------------------------------------------------->
 <div id="search-bar" style="margin-left: 900px;">
				<label style="font-size: 25px;">Search :</label>
						<input type="Search" id="search" placeholder="search username" autocomplete="off" style="border-radius:50px;padding: 5px;">
		</div>
  <div id="modal">
					<table   cellpadding="10px" width="100%">
							 
					</table>
				<div id="close-btn" style="margin-top:20px" >X</div>
		</div>
 
  
  <h2 style="text-align:center; color: white;">"Welcome,
  	<u style="color:red;"><?php
  	      include "connection.php";
  				$uid=  $_SESSION['uid'];
  	      $query = "SELECT * FROM userdata WHERE id= '$uid' ";
  	      $query1 = mysqli_query($conn,$query) or die("username query failed");
  	       if($query1){
  	       	 $query2 = mysqli_fetch_assoc($query1);
  	      echo $query2['name'];
  	       }else{
  	       	echo "no username";
  	       }
      ?>	

</u>! Let's Unlock the World of Knowledge!"</h2><br>
	<body>	
		<table  border="1px solid black" cellpadding="5px" cellspacing="0px " style="margin-left: 50px;">
				<tr>
					<th>User ID</th>
					<th>Profile picture</th>
					<th style="width:100px;">name</th>
					<th>password</th>
					<th style="width:200px;">email</th>
					<th style="width:100px;">phone</th>
					<th style="width:100px;">age</th>
					<th style="width:100px;">Gender</th>
					<th>User Type</th>
					<th style="width:100px;">edit</th>
					<th style="width:100px;">delete</th>
				</tr>
				<?php 
				include "connection.php";
					$limit = 3;
					if(isset($_GET['page'])){
						$page = $_GET['page'];
					}else{
						$page = 1;
					}
				$offset = ($page - 1)* $limit ;
				$sql = "SELECT * FROM userdata  ORDER BY id DESC LIMIT {$offset},{$limit}";
				$result = mysqli_query($conn,$sql) or die("Query failed");
				if(mysqli_num_rows($result)>0)
				{
					 
					while($row=mysqli_fetch_assoc($result))
					{
						 
						$id = $row['id'];
				?>
				<tr>
					<td style="font-size:20px"><?php  echo $row['id']; ?></td>
					<td><?php
									if($row['file']==""){							
						echo '<img src="user_logo/1.png" style="width: 50px; height: 50px; margin-left:30px;"></td> ';
     								}else{
     									?>

     									<img src="upload-image/<?php echo $row['file']; ?> " style="width: 50px; height: 50px;  margin-left:30px; border-radius:50px; border: 1px solid black ">
     									<?php 
     								}
					?>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['password'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['phone'];?></td>
					<td><?php echo $row['age'];?></td>
					<td><?php echo $row['gender'];?></td>
					<td><?php echo $row['usertype'];?></td>
					<td><button style="background:green;width: 70px"><a id="edit-btn" style=" text-decoration: none; color:  white; " href="update.php?id=<?php echo $row['id']; ?>" >edit</a></button></td>
					<td><button style="background:red;width: 70px"><a  style="color: white; text-decoration: none;" href="delete-inline.php?id=<?php echo $row['id'];?>">delete</a></button></td>
				</tr>
				<?php
					}
				}
				?>

		</table><br>
		<?php
				$sql1 = "SELECT * FROM userdata";
				$result1 = mysqli_query($conn, $sql1) or die('PAGINATION QUERY IS FAILED');
				if(mysqli_num_rows($result1)>0){
					$total_records= mysqli_num_rows($result1);
					$total_pages = ceil($total_records/$limit);
		 echo '<ul style="margin-left: 600px; list-style-type: none;">';
		       if($page>1){
		       	  $first_page=1;
					echo '<button style="background:cyan"><li><a style="text-decoration: none;" href="getdata.php?page='.($page-1).'  ">Pre</a></li></button>';

			    		echo '<button style="background:cyan"><li ><a style="text-decoration: none;" href=" getdata.php?page='.$first_page.' ">'.$first_page.'</a></li></button>'; 
			    		 echo "<b>....</b>";
						}
					 for($i=1;$i<=$total_pages;$i++){
						   if($i==$page AND $i<=$total_pages){
						       for($j=$i;$j<$i+1;$j++){
						           echo '<button  ><li ><a style="text-decoration: none;" style="color:black" href=" getdata.php?page='.$j.' ">'.$j.'</a></li></button>';
						   	    } 
						   	}

			   }
			    if($page<$total_pages){

			    	  echo "<b>....</b>";
			    		echo '<button style="background:cyan"><li ><a style="text-decoration: none;" href=" getdata.php?page='.$total_pages.' ">'.$total_pages.'</a></li></button>'; 
			    		if($page==$total_pages){
					echo '';
				}else{
					echo '<button style="background:cyan"><li><a style="text-decoration: none;" href=" getdata.php?page='.($page+1).'  ">Next</a></li></button>';
				}
						}
					echo ' </ul>';
				}
		?>
		 		

  <br><br><h3 align="center" style="color:white;"> "Success Starts Here - Choose a Course and Get Started!" </h3>	 
		<table border="1px solid black" cellpadding="5px" cellspacing="0px" style="margin-left:200px;">
				<tr>
					<th>Sr no.</th>
					<th style="width:200px;">Course Title</th>
			    <th>Full Description</th>	
					<th style="width:100px;">edit</th>
					<th style="width:100px;">delete</th>
					<th style="width:100px;">Buy</th>
					<th style="width:200px;">Add to cart</th>
					 
				</tr>
				<?php
					include "connection.php";
					$sql = "SELECT *FROM product";
					$result = mysqli_query($conn,$sql) or die("query failed");
					if(mysqli_num_rows($result)>0)
					{  $count=0;
						while($row = mysqli_fetch_assoc($result)){
				      $count++;  ?>	
				<tr>
					 <td style="font-size:20px;"><?php echo $count; ?></td>
					 <td><?php echo $row['course_title']; ?></td>
					  <td  ><a  style="color: white ; text-decoration: none;font-size: 14px" href="course.php?id=<?php echo $row['product_id']; ?>">Details..</a></td>

					  <td><button style="background: blue;width: 70px"><a style="color:white; text-decoration:none;" href="edit_product.php?id=<?php echo $row['product_id']; ?>">edit</a></button></td>

					  <td><button style="background: red;width: 70px"><a  style="color:white; text-decoration:none;" href="delete_product.php?id=<?php echo $row['product_id']; ?>">delete<a/></button></td>

					  		<td><button style="background: lightgreen;width: 70px;"><a style="color:black; text-decoration:none; font-size: 12px;  " href="buy_course.php?id=<?php echo $row['product_id']; ?>">Buy</a></button></td>

					 <td>
					 	<form action="insert-cart-data.php" method="POST">
					 	 <label>Quentity : </label>
					 	 <input type="hidden" name="product_cart"  value="<?php echo $row['product_id'];?>">
					 	<input type="number" name="quantity" id="quantity" value="1" style="width:40px" >
					 	<input type="submit" style="background:green;border-radius: 30px; color:white;width: 60px;cursor: pointer;" id="add_to_cart" value="add" name="add_to_cart_btn" > 
					 </form>	
					 </td> 	
					  		
				</tr>
 
				<?php
				}
			}
		?>
			 </table><br><hr><br>
	 	 
	 		 <button style=" background:cyan; margin-left: 420px;width: 300px;height:50px;"><a style="font-size:20px;text-decoration:none; color:black;" href="add_new_product.php">ADD NEW PRODUCTS</a></button>
	 		  <button style=" background:cyan;width: 300px;height:50px;"><a style="text-decoration:none; color:black;font-size:20px" href="sell_product.php">Show all sell products</a></button>



	 		  	
		 

		 <script src="js/jquery.js"></script>
	   <script>
		$(document).ready(function(){
			$('#search').on("keyup",function(){
				 // --------------This is for  search modal _______________________________>>>
  			var search_term = $(this).val();
  			$('#modal').slideDown('slow');

  			$.ajax({
  					url : "ajax-live-search.php",
  					type : "POST",
  					data : {search : search_term},
  					success : function(data){
  							 $("#modal table").html(data);
  					
  					}
  			});
  		});

 // --------------This is for close button   search modal _______________________________>>>
  		$('#close-btn').on("click",function(){
  			$('#search').val("");
  			$("#modal").slideUp('slow');

  		});
 
  		
	});
	</script>



		 <?php
		
	       


	    //  <---------- This session is for user --------------->
	}
	   elseif ($_SESSION['usertype']=="user") {
	 ?>
	     <style>
  			body{
			font-family: arial;
		}
  #modal{
		 background:  TAN;
		 position: fixed;
		 top: 150px;
width: 1300px;
		height:  100%;

		z-index: 100;
		display: none;
		}
		#modal-form{
			background: #fff;
			width:30%;
			position: relative;
			tp:20%;
			left: calc(50% - 15%);
			padding: 15px;
			border-radius: 4px;

		}
		#modal-form h2{
  			margin: 0 0 15px;
  			padding-bottom: 10px ;
  			border-bottom: 1px solid black;
		}
		#close-btn{
			background: red;
			color: white;
			width: 30px;
			height: 30px;
			line-height: 30px;
			text-align: center;
			border-radius: 50px;
			position: absolute;
			top: -15px;
			right: -15px;
			cursor: pointer;
		}

		 #modal-cart{
		 background:  TAN;
		 margin-left: 410px;
		 position: fixed;
		 top: 150px;
		width: 400px;
		height: 50%;
		z-index: 100;
		display: none;
		}
			#close-btn-cart{
			background: red;
			color: white;
			width: 30px;
			height: 30px;
			line-height: 30px;
			text-align: center;
			border-radius: 50px;
			position: absolute;
			top: -15px;
			right: -15px;
			cursor: pointer;
		}
    
   	button{
   		border-radius: 50px;
   	}
   </style>
	    <?php include'bg_color.php'; ?> 
	  
<!-- This  model for search modal ----------------------------------------------------------->

	    <div id="search-bar" style="margin-left: 900px;">
				<label style="font-size: 25px;">Search :</label>
						<input type="Search" id="search" placeholder="search username" autocomplete="off" style="border-radius:50px;padding: 5px;">
					</div>
  <div id="modal">
				<table   cellpadding="10px" width="100%">
						 
				</table>
				<div id="close-btn" style="margin-top:20px" >X</div>
		</div>

 


 

 <h2 style="text-align:center; color: white;">"Welcome
 <u style="color:red"> <?php
  	      include "connection.php";
  				$uid=  $_SESSION['uid'];
  	      $query = "SELECT * FROM userdata WHERE id= '$uid' ";
  	      $query1 = mysqli_query($conn,$query) or die("username query failed");
  	       if($query1){
  	       	 $query2 = mysqli_fetch_assoc($query1);
  	      echo $query2['name'];

  	       }else{
  	       	echo "no username";
  	       }
      ?>
      	</u>! Let's Unlock the World of Knowledge!"</h2><br>
		<table  border="1px solid black" cellpadding="5px" cellspacing="0px " style="margin-left: 230px;">

				<tr>
					<th>User ID</th>
					<th>Profile picture</th>
					<th style="width:100px;">name</th>
					<th style="width:200px;">email</th>
					<th style="width:100px;">phone</th>
					<th style="width:100px;">age</th>
					<th style="width:100px;">edit</th>
				</tr>
				<?php 
		 
				
   // this is code for pagination 
				$limit = 3;
				
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				}else{
					$page = 1;
				}

				$offset = ($page -1)*$limit;


				$sql = "SELECT * FROM userdata ORDER BY id DESC LIMIT {$offset},{$limit}";
				$result = mysqli_query($conn,$sql) or die("Query failed");

				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$id = $row['id'];
				?>
				<tr>

					<td><?php echo $row['id'];?></td>
					<td><?php
									if($row['file']==""){							
						echo '<img src="user_logo/1.png" style="width: 50px; height: 50px; margin-left:30px; border-radius:50px; border: 1px solid black"></td> ';
     								}else{
     									?>

     									<img src="upload-image/<?php echo $row['file']; ?> " style="width: 50px; height: 50px; margin-left:30px; border-radius:50px; border: 1px solid black;">
     									<?php 
     								}
					?>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['phone'];?></td>
					<td><?php echo $row['age'];?></td>
				<td><button  style="background:green;width: 70px;" ><?php
											if($row['usertype']=="admin"){
												echo "##";
											}else{
									?>
									 
				<a style=" text-decoration: none; color:  white; " href="update.php?id=<?php echo $row['id']; ?>" >edit</a></button></td>
				<?php 
						}
				?>	 
				</tr>
				<?php
					}
				}
				?>
		</table>
				<?php
					  $sql1 = "SELECT * FROM userdata";
					  $result1 = mysqli_query($conn,$sql1) or die("User PAGINATION failed");
					  if(mysqli_num_rows($result1)>0){
 							$total_records = mysqli_num_rows($result1);
 							
 							$total_page = ceil($total_records/$limit);
			 
		 echo '<ul style="margin-left: 550px; list-style-type: none;">';
		       if($page>1){
		       	  $first_page=1;
					echo '<button style="background:cyan"><li><a style="text-decoration:none;color:black" href="getdata.php?page='.($page-1).'  ">Pre</a></li></button>';

			    		echo '<button style="background:cyan"><li ><a style="text-decoration:none;color:black" href=" getdata.php?page='.$first_page.' ">'.$first_page.'</a></li></button>'; 
			    		 echo "<b>....</b>";
						}
					 for($i=1;$i<=$total_page;$i++){
			    

						   if($i==$page AND $i<=$total_page){ for($j=$i;$j<$i+1;$j++)
						   { echo '<button style="background:blue"><li ><a style="text-decoration:none;color:white" href=" getdata.php?page='.$j.' ">'.$j.'</a></li></button>';
						   	 } }

			   }
			    if($page<$total_page){

			    	  echo "<b>....</b>";
			    		echo '<button style="background:cyan"><li ><a style="text-decoration:none;color:black" href=" getdata.php?page='.$total_page.' ">'.$total_page.'</a></li></button>'; 
			    		if($page==$total_page){
					echo '';
				}else{
					echo '<button style="background:cyan" ><li><a style="text-decoration:none;color:black" href=" getdata.php?page='.($page+1).'  ">Next</a></li></button>';
				}
						}
					echo ' </ul>';
				}
		?>
		 		 
		
				 
				 


	<br><br><h3 align="center" style="color:white;"> "Success Starts Here - Choose a Course and Get Started!" </h3>
 
		<table border="1px solid black" cellpadding="5px" cellspacing="0px" style="margin-left: 220px;">
				<tr>
					<th style="width:100px;">ID</th>
					<th style="width:200px;">Course Title</th>
			         <th>Full Description</th>
					<th style="width:100px;"> edit</th>
					<th style="width:100px;">Buy</th>
					<th style="width:200px;">Add to Cart</th>
				</tr>
				<?php
					include "connection.php";
					$sql = "SELECT *FROM product";
					$result = mysqli_query($conn,$sql) or die("query failed");
					if(mysqli_num_rows($result)>0)
					{
						while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
					 <td><?php echo $row['product_id']; ?></td>
					 <td><?php echo $row['course_title']; ?></td>
					  <td><a style="color:white" href="course.php?id=<?php echo $row['product_id']; ?>">Click here</a></td>
				<td><button style="background:  green;width: 70px;"><a style="text-decoration:none;color: white;" href="edit_product.php?id=<?php echo $row['product_id']; ?>">edit</a></button></td>
				<td><button style="background: blue;width: 70px;"><a style="text-decoration:none;color: white;" href="buy_course.php?id=<?php echo $row['product_id']; ?>">Buy</a></button></td>
			
  <td>
					 	<form action="insert-cart-data.php" method="POST">
					 	 <label>Quentity : </label>
					 	 <input type="hidden" name="product_cart"  value="<?php echo $row['product_id'];?>">
					 	<input type="number" name="quantity" id="quantity" value="1" style="width:40px" >
					 	<input type="submit" style="background:green;border-radius: 30px; color:white;width: 60px;cursor: pointer;" id="add_to_cart" value="add" name="add_to_cart_btn" > 
					 </form>	
					 </td> 	
				</tr>

				<?php
				}
			}
		?>
			 </table><br><hr><br>
	 		 <button style=" background:cyan; margin-left: 350px;width: 300px;height:50px"><a style="text-decoration:none; color:black;font-size: 20px;" href="add_new_product.php">ADD NEW PRODUCTS</a></button>
	 		  <button style=" background:cyan;width: 300px;height:50px"><a style="text-decoration:none; color:black;font-size: 20px" href="sell_product.php">Show all sell products</a></button>


	 		<script src="js/jquery.js"></script>
	<script>
		$(document).ready(function(){
			 // --------------This is for search modal _______________________________>>>
			$('#search').on("keyup",function(){
  			var search_term = $(this).val();
  			$('#modal').slideDown('slow');

  			$.ajax({
  					url : "ajax-live-search.php",
  					type : "POST",
  					data : {search : search_term},
  					success : function(data){
  							
  							 $("#modal table").html(data);
  					}
  			});
  		});


 // --------------This is for close button  of  search modal _______________________________>>>
  		$('#close-btn').on("click",function(){
  			$('#search').val("");
  			$("#modal").slideUp('slow');
  		});

 // // --------------This is for  add to cart modal _______________________________>>>
 //  		 $('#add_to_cart').click(function(){
 //      	$('#search').trigger("reset");
 //      	$("#modal-cart").slideDown('slow');	
 //      });
  	

 // --------------This is for close button  of add to cart modal _______________________________>>>
  		$('#close-btn-cart').on("click",function(){
  			$("#modal-cart").slideUp('slow');

  		});
 
  		
	});
	</script>


	<?php 
 
   }  // this is elseif condition brackets
	
    
	// this is for normal user session
       elseif($_SESSION['usertype']=='normal'){
	?>
		
		     <style>
  			body{
			font-family: arial;
		}
  #modal{
		 background:  TAN;
		 margin-left: 0px;
		 position: fixed;
		 top: 150px;
		width: 1300px;
		height:  100%;
		z-index: 100;
		display: none;
		}
		#modal-form{
			background: #fff;
			width:30%;
			position: relative;
			tp:20%;
			left: calc(50% - 15%);
			padding: 15px;
			border-radius: 4px;

		}
		#modal-form h2{
  			margin: 0 0 15px;
  			padding-bottom: 10px ;
  			border-bottom: 1px solid black;
		}
		#close-btn{
			background: red;
			color: white;
			width: 30px;
			height: 30px;
			line-height: 30px;
			text-align: center;
			border-radius: 50px;
			position: absolute;
			top: -15px;
			right: -15px;
			cursor: pointer;
		}

		 
    
   	button{
   		border-radius: 50px;
   	}
 
   	button{
   		border-radius: 50px;
   	}
   </style>

		   <?php include'bg_color.php'; ?> 
		    <div id="search-bar" style="margin-left: 1000px;">
				<label style="font-size: 25px;">Search :</label>
						<input type="Search" id="search" placeholder="search username" autocomplete="off" style="border-radius:50px;padding: 5px;">
					</div>
  <div id="modal">
				<table   cellpadding="10px" width="100%" >
						 
				</table>
				<div id="close-btn" style="margin-top:20px" >X</div>
		</div>
 

		 <h2 style="text-align:center; color: white;">"Welcome
		  <u style="color:red"><?php
  	      include "connection.php";
  				$uid=  $_SESSION['uid'];

  	      $query = "SELECT * FROM userdata WHERE id= '$uid' ";
  	      $query1 = mysqli_query($conn,$query) or die("username query failed");
  	       if($query1){
  	       	 $query2 = mysqli_fetch_assoc($query1);
  	      echo $query2['name'];

  	       }else{
  	       	echo "no username";
  	       }
      ?>
    </u>! Let's Unlock the World of Knowledge!"</h2><br>
		   
		  	<table  border="1px solid black" cellpadding="5px" cellspacing="0px " style="margin-left:300px">
				<tr>
					<th>User ID</th>
					<th style="width:100px;">Profile picture</th>
					<th style="width:100px;"	>name</th>
					<th style="width:50px;"> age</th>
					<th style="width:300px;">Email</th>
					<th style="width:100px;">Gender</th>
				</tr>
				<?php 
				 
			 // this is code for pagination 
				$limit = 3;
				
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				}else{
					$page = 1;
				}
				$offset = ($page -1)*$limit;
				$sql = "SELECT * FROM userdata ORDER BY id DESC LIMIT {$offset},{$limit}";
				$result = mysqli_query($conn,$sql) or die("Query failed");

				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$id = $row['id'];
				?>
				<tr>

					<td><?php echo $row['id'];?></td>
					<td><?php
									if($row['file']==""){							
						echo '<img src="user_logo/1.png" style="width: 50px; height: 50px; margin-left:30px; border-radius:50px; border: 1px solid black"></td> ';
     								}else{
     									?>

     									<img src="upload-image/<?php echo $row['file']; ?> " style="width: 50px; height: 50px; margin-left:30px; border-radius:50px; border: 1px solid black">
     									<?php 
     								}

					?>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['age'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['gender'];?></td>
					 
				 					 
				</tr>
				<?php
					}
				}
				?>
		</table>
		<?php
					  $sql1 = "SELECT * FROM userdata";
					  $result1 = mysqli_query($conn,$sql1) or die("User PAGINATION failed");
					  if(mysqli_num_rows($result1)>0){
 							$total_records = mysqli_num_rows($result1);
 							
 							$total_page = ceil($total_records/$limit);
			 
		 echo '<ul style="margin-left: 580px; list-style-type: none;">';
		       if($page>1){
		       	  $first_page=1;
					echo '<button style="background:cyan"><li><a style="color:black;text-decoration:none" href="getdata.php?page='.($page-1).'  ">Pre</a></li></button>';

			    		echo '<button style="background:cyan" ><li ><a  style="color:black;text-decoration:none" href=" getdata.php?page='.$first_page.' ">'.$first_page.'</a></li></button>'; 
			    		 echo "<b>....</b>";
						}
					 for($i=1;$i<=$total_page;$i++){
			    

						   if($i==$page AND $i<=$total_page){ for($j=$i;$j<$i+1;$j++)
						   { echo '<button  style="background:blue"><li ><a style="color:white;text-decoration:none" href=" getdata.php?page='.$j.' ">'.$j.'</a></li></button>';
						   	 } }

			   }
			    if($page<$total_page){

			    	  echo "<b>....</b>";
			    		echo '<button style="background:cyan"><li ><a style="color:black;text-decoration:none" href=" getdata.php?page='.$total_page.' ">'.$total_page.'</a></li></button>'; 
			    		if($page==$total_page){
					echo '';
				}else{
					echo '<button style="background:cyan"><li><a  style="color:black;text-decoration:none" href=" getdata.php?page='.($page+1).'  ">Next</a></li></button>';
				}
						}
					echo ' </ul>';
				}
		?>
		 		 
 
		<br><br><h3 align="center" style="color:white;"> "Success Starts Here - Choose a Course and Get Started!" </h3>

		 
		<table border="1px solid black" cellpadding="5px" cellspacing="0px" style="margin-left: 250px;">
				<tr>
					<th style="width:100px;">ID</th>
					<th style="width:300px;">Course Title</th>
			        <th>Full Description</th>
			        <th style="width:100px;">Buy</th>
			         <th style="width:200px;">Add to Cart</th>
					
				</tr>
				<?php
					include "connection.php";
					$sql = "SELECT *FROM product";
					$result = mysqli_query($conn,$sql) or die("query failed");
					if(mysqli_num_rows($result)>0)
					{
						while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>
					 <td><?php echo $row['product_id']; ?></td>
					 <td><?php echo $row['course_title']; ?></td>
					  <td><a style="color:white" href="course.php?id=<?php echo $row['product_id']; ?>">Click here</a></td>
				<td><button style="background:green;width: 80px;"><a style="text-decoration: none;color:white"  href="buy_course.php?id=<?php echo $row['product_id']; ?>">Buy</a></button></td>
			
				  <td>
					 	<form action="insert-cart-data.php" method="POST">
					 	 <label>Quentity : </label>
					 	 <input type="hidden" name="product_cart"  value="<?php echo $row['product_id'];?>">
					 	<input type="number" name="quantity" id="quantity" value="1" style="width:40px" >
					 	<input type="submit" style="background:green;border-radius: 30px; color:white;cursor:pointer;width: 60px;" id="add_to_cart" value="add" name="add_to_cart_btn" > 
					 </form>	
					 </td>

				</tr>
 
				<?php
				}
			}
		?>
			 </table><br><hr>
			   <button style="background:cyan; margin-left: 420px;width: 300px;height:50px"><a style="font-size:20px;color:black; text-decoration:none;" href="sell_product.php">Show all sell products</a></button>
			
	 	 
	 		  	<script src="js/jquery.js"></script>
	<script>
		$(document).ready(function(){

			 // --------------This is for  search modal _______________________________>>>

			$('#search').on("keyup",function(){
  			var search_term = $(this).val();
  			$('#modal').slideDown('slow');

  			$.ajax({
  					url : "ajax-live-search.php",
  					type : "POST",
  					data : {search : search_term},
  					success : function(data){						
  							 $("#modal table").html(data);
  					}
  			});
  		});

   // --------------This is for close button  of  search modal _______________________________>>>
  		$('#close-btn').on("click",function(){
  			$('#search').val("");
  			$("#modal").slideUp('slow');
  		});



 // // --------------This is for add to cart modal _______________________________>>>
 //  			 $('#add_to_cart').click(function(){
 //      	$('#search').trigger("reset");
 //      	$("#modal-cart").slideDown('slow');	
 //      });
  	

 // --------------This is for close button  of add to cart modal _______________________________>>>
  		$('#close-btn-cart').on("click",function(){
  			$("#modal-cart").slideUp('slow');

  		});

  	
  		 

  		
	});
	</script>
	 		


	<?php
  }
  else{
  	header("Location: signup.php");
  }
  include('footer.php');
	?>

	
	</body>
 
</html>



















  