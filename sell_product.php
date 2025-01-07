	<?php
	session_start();
	include("nav.php");
?>

<html>
<title>All Selling Product</title>
   <style>
   	 table{
		text-align: center;
		width: 100%;
		margin-bottom: 40px;
	 }
   	button{
   		border-radius: 50px;
   	}
   	th{
		background-color: blueviolet;
				color: white;
			}
   </style>
  <?php include'bg_color.php'; ?>

   <h1 align="center"><u>All Selling Products Details </u></h1> 
<body>
		<?php
			if($_SESSION['usertype']=="admin")
			{
		?>
		<table border="1px solid black" cellpadding="5px" cellspacing="0px" >
			 <tr>
			 	<th>Sr No.</th>
			 	<th style="width:200px;">Product Name</th>
			 	<th>Product image</th>
			 	<th>User Id</th>
				<th style="width:100px;">Name </th>
				<th style="width:200px;">Email</th>
				<th>Phone </th>
				<th>Age </th>
				<th>Date </th>
				<th>State</th>
				<th>Buying Quantity</th>
				 
				<th>delete</th>
			</tr>

			<?php
			include "connection.php";
			$limit = 3;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page = 1;
			}

			$offset = ($page - 1) * $limit ; 

			$sql = "SELECT * FROM  buyer ORDER BY id DESC LIMIT {$offset},{$limit} ";
			$result = mysqli_query($conn,$sql) or die("Query failed");
			if(mysqli_num_rows($result)>0)
			{   $cnt=0;
 				while($row=mysqli_fetch_assoc($result))
 				{			$cnt++;
			?>
			<tr>
				<td><?php echo  $cnt; ?></td>
			<?php	$pid = $row['product_id'];
				$sql1 = "SELECT * FROM product  WHERE product_id=$pid  ";
				$result1 = mysqli_query($conn,$sql1) or die("Query failed");
				if(mysqli_num_rows($result)>0){
				  $row1 = mysqli_fetch_assoc($result1)
				 ?>
				<td> <?php echo  $row1['course_title']; ?></td>
				<td><img src="product_logo/<?php echo $row1['p_image']; ?>" style="width: 100px; border-radius:50px; border: 1px solid black;">   </td>
				<?php
					
			}
		?>
				<td><?php echo $row['user_id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['phone']; ?></td>
				<td><?php echo $row['age']; ?></td>
				<td><?php echo $row['date']; ?></td>
				<td><?php echo $row['state']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				
				 
				<td><button style="background:red;width:100%"><a style="color: white; text-decoration: none;" href="delete_buyer.php?id=<?php echo $row['id']; ?>">delete</a></button></td>
			
			</tr>
			<?php
			}
		}
	?>  
		</table><br>
		<?php
		$sql2 = "SELECT * FROM buyer";
		$result2 = mysqli_query($conn,$sql2) or die("Pagination query is failed");
		if(mysqli_num_rows($result2)>0){
			  $total_records = mysqli_num_rows($result2);
			  $total_page = ceil($total_records/$limit);

			  echo '<ul style=" margin-left:550px; list-style-type: none;">';
			   if($page>1){
			   	     $first_page=1;
					echo '<button style="background:cyan;width:60px;height:30px"><li><a style="text-decoration:none;" href="sell_product.php?page='.($page-1).'  ">Pre</a></li></button>';
					
			    		echo '<button style="background:cyan;width:50px;height:20px"><li ><a  style="text-decoration:none;" href="sell_product.php?page='.$first_page.' ">'.$first_page.'</a></li></button>'; 
			    		 echo "<b>....</b>";
						}
						
			   for($i=1;$i<=$total_page;$i++){
			   	if($i== $page){
						   	  $active = "active";
						   }else{
						   	$active = "";
						   }

						   if($i==$page AND $i<=$total_page){ for($j=$i;$j<$i+1;$j++)
						   { echo '<button  class="active" style="background:blue;width:50px;height:20px"><li ><a style="color:white;text-decoration:none" href="sell_product.php?page='.$j.' ">'.$j.'</a></li></button>';
						   	 } }

			   }
			    if($page<$total_page){

			    	  echo "<b>....</b>";
			    		echo '<button style="background:cyan;width:50px;height:20px"><li ><a style="text-decoration:none;" href="sell_product.php?page='.$total_page.' ">'.$total_page.'</a></li></button>'; 
			    		if($page==$total_page){
					echo '';
				}else{
					echo '<button style="background:cyan;width:60px;height:30px"><li><a style="text-decoration:none;" href="sell_product.php?page='.($page+1).'  ">Next</a></li></button>';
				}
						}

			 echo '</ul>';
		}
		?>

		<br><button  style="background: cyan; border-radius:50px; margin-bottom: 200PX;width:100px;height:50px" ><a style="color:black; text-decoration:none" href=" getdata.php">Go back</a></button>
	<?php

	 include 'footer.php';

   }      // this is the end of admin details
	

      // --->>>>   this is for user  <<<<------- 
    


			else if($_SESSION['usertype']=="user")
			{
		?>
		<table border="1px solid black" cellpadding="5px" cellspacing="0px">
			 <tr>
			 	<th>id</th>
			 	<th>Product Name</th>
			 	<th>Product image</th>
			    <th>User Id</th>
				<th style="width:100px;">Name </th>
				<th>Email</th>
				<th>Phone </th>
				<th>Age </th>
				<th>Date </th>
				<th style="width:150px;">State</th>
				<th>Buying Quantity</th>
				<th>delete</th>
			</tr>

			<?php
			include "connection.php";
				$limit = 3;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page = 1;
			}

			$offset = ($page - 1) * $limit ; 

			$sql = "SELECT * FROM  buyer ORDER BY id DESC LIMIT {$offset},{$limit} ";
			$result = mysqli_query($conn,$sql) or die("Query failed");
			if(mysqli_num_rows($result)>0)
			{    $cnt=0;
 				while($row=mysqli_fetch_assoc($result))
 				{  $cnt++;
			?>
			<tr> 
				<td><?php echo $row['id']; ?></td>
			<?php	$pid = $row['product_id'];
				$sql1 = "SELECT * FROM product  WHERE product_id=$pid ";
				$result1 = mysqli_query($conn,$sql1) or die("Query failed");
				if(mysqli_num_rows($result)>0){
				  $row1 = mysqli_fetch_assoc($result1)
				 ?>
				<td> <?php echo  $row1['course_title']; ?></td>
				<td><img src="product_logo/<?php echo $row1['p_image']; ?>" style="width: 100px; border-radius:50px; border: 1px solid black;">   </td>
				<?php		
			}
		?>		<td><?php echo $row['user_id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['phone']; ?></td>
				<td><?php echo $row['age']; ?></td>
				<td><?php echo $row['date']; ?></td>
				<td><?php echo $row['state']; ?></td>
			   <td><?php echo $row['quantity']; ?></td>
			   <td><button style="background:red;width:100%"><a style="color: white; text-decoration: none;" href="delete_buyer.php?id=<?php echo $row['id']; ?>">delete</a></button></td>
			</tr>
			<?php
			}
		}
	?>  
		</table><br>
		<?php
		$sql2 = "SELECT * FROM buyer";
		$result2 = mysqli_query($conn,$sql2) or die("Pagination query is failed");
		if(mysqli_num_rows($result2)>0){
			  $total_records = mysqli_num_rows($result2);
			  $total_page = ceil($total_records/$limit);

			  echo '<ul style=" margin-left:500px; list-style-type: none;">';
			   if($page>1){
			   	     $first_page=1;
					echo '<button  style="background:cyan;width:60px;height:30px"><li><a  style=" text-decoration: none; color:black; " href="sell_product.php?page='.($page-1).'  ">Pre</a></li></button>';
					
			    		echo '<button style="background:cyan;width:50px;height:20px"><li ><a style=" text-decoration: none; color:black; " href="sell_product.php?page='.$first_page.' ">'.$first_page.'</a></li></button>'; 
			    		 echo "<b>....</b>";
						}
						
			   for($i=1;$i<=$total_page;$i++){
			   	if($i== $page){
						   	  $active = "active";
						   }else{
						   	$active = "";
						   }

						   if($i==$page AND $i<=$total_page){ for($j=$i;$j<$i+1;$j++)
						   { echo '<button style="background:blue;width:50px;height:20px"><li ><a style="text-decoration:none;	color:white" href="sell_product.php?page='.$j.' ">'.$j.'</a></li></button>';
						   	 } }

			   }
			    if($page<$total_page){

			    	  echo "<b>....</b>";
			    		echo '<button style="background:cyan;width:50px;height:20px"><li ><a style=" text-decoration: none; color:black; " href="sell_product.php?page='.$total_page.' ">'.$total_page.'</a></li></button>'; 
			    		if($page==$total_page){
					echo '';
				}else{
					echo '<button style="background:cyan;width:60px;height:30px"><li><a style=" text-decoration: none; color:black;" href="sell_product.php?page='.($page+1).'  ">Next</a></li></button>';
				}
						}

			 echo '</ul>';
		}
		?>

	<br><button  style="background: cyan; border-radius:50px;width:100px;height:50px" ><a style="color:black; text-decoration:none" href=" getdata.php">Go back</a></button>
	<?php
     include 'footer.php';

   }      // this is the end of  user details
	

  


      // --->>>>   this is for  normal user  <<<<------- 
    


			else if($_SESSION['usertype']=="normal")
			{
		?>
		<table border="1px solid black" cellpadding="5px" cellspacing="0px">
			 <tr>
			 	<th>id</th>
			 	<th>Product Name</th>
			 	<th>Product Image</th>
			 	<th>User Id</th>
				<th style="width:100px;">Name </th>
				<th>Email</th>
				<th style="width:100px;">Phone </th>
				<th style="width:100px;">Age </th>
				<th>Date </th>
				<th style="width:150px;">State</th>
				<th>Buying Quantity</th>
				
			</tr>

			<?php
			include "connection.php";
				$limit = 3;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page = 1;
			}

			$offset = ($page - 1) * $limit ; 

			$sql = "SELECT * FROM  buyer ORDER BY id DESC LIMIT {$offset},{$limit} ";
			$result = mysqli_query($conn,$sql) or die("Query failed");
			if(mysqli_num_rows($result)>0)
			{
 				while($row=mysqli_fetch_assoc($result))
 				{
			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
			<?php	$pid = $row['product_id'];
				$sql1 = "SELECT * FROM product  WHERE product_id=$pid ";
				$result1 = mysqli_query($conn,$sql1) or die("Query failed");
				if(mysqli_num_rows($result)>0){
				  $row1 = mysqli_fetch_assoc($result1)
				 ?>
				<td> <?php echo  $row1['course_title']; ?></td>
				<td><img src="product_logo/<?php echo $row1['p_image']; ?>" style="width: 100px;  border-radius:50px; border: 1px solid black;">   </td>
				<?php		
			}
		?>		<td><?php echo $row['user_id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['phone']; ?></td>
				<td><?php echo $row['age']; ?></td>
				<td><?php echo $row['date']; ?></td>
				<td><?php echo $row['state']; ?></td>
				<td><?php echo $row['quantity']; ?></td>	
			</tr>
			<?php
			}
		}
	?>  
		</table><br>
			<?php
		$sql2 = "SELECT * FROM buyer";
		$result2 = mysqli_query($conn,$sql2) or die("Pagination query is failed");
		if(mysqli_num_rows($result2)>0){
			  $total_records = mysqli_num_rows($result2);
			  $total_page = ceil($total_records/$limit);

			  echo '<ul style=" margin-left:400px; list-style-type: none;">';
			   if($page>1){
			   	     $first_page=1;
					echo '<button style="background:cyan;width:60px;height:30px"><li><a style="text-decoration:none;color:black" href="sell_product.php?page='.($page-1).'  ">Pre</a></li></button>';
					
			    		echo '<button style="background:cyan;width:50px;height:20px"><li ><a  style="text-decoration:none;color:black" href="sell_product.php?page='.$first_page.' ">'.$first_page.'</a></li></button>'; 
			    		 echo "<b>....</b>";
						}
						
			   for($i=1;$i<=$total_page;$i++){
			    
						   if($i==$page AND $i<=$total_page){ for($j=$i;$j<$i+1;$j++)
						   { echo '<button style="background:blue;width:50px;height:20px"><li ><a style="color:white;text-decoration:none" href="sell_product.php?page='.$j.' ">'.$j.'</a></li></button>';
						   	 } }

			   }
			    if($page<$total_page){

			    	  echo "<b>....</b>";
			    		echo '<button style="background:cyan;width:50px;height:20px"><li ><a style="text-decoration:none;color:black"  href="sell_product.php?page='.$total_page.' ">'.$total_page.'</a></li></button>'; 
			    		if($page==$total_page){
					echo '';
				}else{
					echo '<button style="background:cyan;width:60px;height:30px"><li><a style="text-decoration:none;color:black"  href="sell_product.php?page='.($page+1).'  ">Next</a></li></button>';
				}
						}

			 echo '</ul>';
		}
		?>

		<br><button  style="background: cyan; border-radius:50px;width:100px;height:50px" ><a style="color:black; text-decoration:none" href=" getdata.php">Go back</a></button>
	<?php
  include 'footer.php';




   }      // this is the end of  user details
	else{
		session_destroy();
		header("Location: signup.php");
	}


	?>





</body>
</html>