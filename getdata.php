<?php   // this session is  for admin
  session_start();
  	include('nav.php');
  	?>
  	
  	<html>
  	  <title>Home page</title>
  	<style>
  			body{
			font-family: arial;
			font-size: 16px;
			width: 100%;
			margin:0;
			padding:0;

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
 <div id="search-bar" style="margin-left: 80%;">
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

</u>! Let's Unlock the World of Knowledge!"</h2><br><br>
	<body>	
		<table  border="1px solid black" cellpadding="5px" cellspacing="0px " style=" margin:auto;width:90%">
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
					$limit = 5;
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
					echo ' </ul><br><br>';
				}
		
				include'courseSection.php';
		?>
		 		

  <br><br> 
			 </table><br><hr><br>
	 	 
	 		 <button style=" background:blue; margin-left: 420px;width: 300px;height:50px;"><a style="font-size:20px;text-decoration:none; color:white;" href="add_new_product.php">ADD NEW PRODUCTS</a></button>
	 		  <button style=" background:blue;width: 300px;height:50px;"><a style="text-decoration:none; color:white;font-size:20px" href="sell_product.php">Show all sell products</a></button>



	 		  	
		 

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
	background:  linear-gradient(135deg, #1d2671, #c33764);
		 position: fixed;
		 top: 150px;
        width:100%;
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

	    <div id="search-bar" style="margin-left: 80%;">
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
		<table  border="1px solid black" cellpadding="5px" cellspacing="0px " style="margin:auto;width:70%">

		<br><tr>
					<th>User ID</th>
					<th>Profile picture</th>
					<th>name</th>
					<th>email</th>
					<th>phone</th>
					<th>age</th>
					<th>edit</th>
				</tr>
				<?php 
		 
				
   // this is code for pagination 
				$limit = 5;
				
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
			 
		 echo '<ul style="margin-left: 700px; list-style-type: none;">';
		       if($page>1){
		       	  $first_page=1;
					echo '<button style="background:cyan;width:60px;height:30px"><li><a style="text-decoration:none;color:black" href="getdata.php?page='.($page-1).'  ">Pre</a></li></button>';

			    		echo '<button style="background:cyan;width:60px;height:30px"><li ><a style="text-decoration:none;color:black" href=" getdata.php?page='.$first_page.' ">'.$first_page.'</a></li></button>'; 
			    		 echo "<b>....</b>";
						}
					 for($i=1;$i<=$total_page;$i++){
			    

						   if($i==$page AND $i<=$total_page){ for($j=$i;$j<$i+1;$j++)
						   { echo '<button style="background:blue;width:50px;height:20px"><li ><a style="text-decoration:none;color:white" href=" getdata.php?page='.$j.' ">'.$j.'</a></li></button>';
						   	 } }

			   }
			    if($page<$total_page){

			    	  echo "<b>....</b>";
			    		echo '<button style="background:cyan;width:60px;height:30px"><li ><a style="text-decoration:none;color:black" href=" getdata.php?page='.$total_page.' ">'.$total_page.'</a></li></button>'; 
			    		if($page==$total_page){
					echo '';
				}else{
					echo '<button style="background:cyan;width:60px;height:30px" ><li><a style="text-decoration:none;color:black" href=" getdata.php?page='.($page+1).'  ">Next</a></li></button>';
				}
						}
					echo ' </ul><br><br><br>';
				}
		?>
		 		 
		
				 
			<?php
				include'courseSection.php'; // include course section
			?> 


	<br><br> 
		 
			 </table><br><hr><br><br>
	 		 <button style=" background:blue; margin-left: 550px;width: 300px;height:50px"><a style="text-decoration:none; color:white;font-size: 20px;" href="add_new_product.php">ADD NEW PRODUCTS</a></button>
	 		  <button style=" background:blue;width: 400px;height:50px"><a style="text-decoration:none; color:white;font-size: 20px" href="sell_product.php">SHOW ALL SELLING PRODUCTS</a></button>


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
	background:  linear-gradient(135deg, #1d2671, #c33764);
		 margin-left: 0px;
		 position: fixed;
		 top: 150px;
		width:  100%;
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
		    <div id="search-bar" style="margin-left: 80%;">
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
		   
	<br> <table  border="1px solid black" cellpadding="5px" cellspacing="0px " style="margin-left:150px;width:80%;text-align:center">
				<tr>
					<th>User ID</th>
					<th  >Profile picture</th>
					<th  >name</th>
					<th  > age</th>
					<th  >Email</th>
					<th  >Gender</th>
				</tr>
				<?php 
				 
			 // this is code for pagination 
				$limit = 5;
				
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
					echo '<button style="background:cyan;width:60px;height:30px"><li><a style="color:black;text-decoration:none" href="getdata.php?page='.($page-1).'  ">Pre</a></li></button>';

			    		echo '<button style="background:cyan;width:60px;height:30px" ><li ><a  style="color:black;text-decoration:none" href=" getdata.php?page='.$first_page.' ">'.$first_page.'</a></li></button>'; 
			    		 echo "<b>....</b>";
						}
					 for($i=1;$i<=$total_page;$i++){
			    

						   if($i==$page AND $i<=$total_page){ for($j=$i;$j<$i+1;$j++)
						   { echo '<button  style="background:blue;width:50px;height:20px"><li ><a style="color:white;text-decoration:none" href=" getdata.php?page='.$j.' ">'.$j.'</a></li></button>';
						   	 } }

			   }
			    if($page<$total_page){

			    	  echo "<b>....</b>";
			    		echo '<button style="background:cyan;width:60px;height:30px"><li ><a style="color:black;text-decoration:none" href=" getdata.php?page='.$total_page.' ">'.$total_page.'</a></li></button>'; 
			    		if($page==$total_page){
					echo '';
				}else{
					echo '<button style="background:cyan;width:60px;height:30px"><li><a  style="color:black;text-decoration:none" href=" getdata.php?page='.($page+1).'  ">Next</a></li></button>';
				}
						}
					echo ' </ul><br><br>';
				}
		?>
		 		 
 
		<br><br> 
		<?php
					include'courseSection.php'; // include course section
			?> 

			<br> </table><br><hr>
			  <br><br> <button style="background:blue; margin-left: 650px;width: 300px;height:50px"><a style="font-size:20px;color:white; text-decoration:none;" href="sell_product.php">Show all sell products</a></button>
			
	 	 
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



















  