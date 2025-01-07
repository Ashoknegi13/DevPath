<?php 
 session_start();
  include("nav.php");
	 		
 if($_SESSION['usertype']=="admin"  || $_SESSION['usertype']=="user"  || $_SESSION['usertype']=="normal"){
 $pid = $_GET['id'];
?>
<html>
<title>Buy course</title>
<style>
	  	body{
				font-family: arial;
			 	background-image: url('upload-image/2.jpg');
		    	background-size: cover;		 
			}
	  	#box{
				border: 2px solid  slateblue;
/*				background-color: tan;*/
                 background-color:  gray;
				padding: 10px;
				margin-left:400px;
				text-align: center;
				margin-top: 70px;
				border-radius: 50px;
				height: 400px;
				width: 700px;
			}
			#box input{
				border-radius: 50px;
				margin: 20px;
				padding: 10px;
				width: 300px;
				opacity: 0.9;
			}
			h1,h3{
				text-align: center;
			}
			#box label{
				font-size: 20px;
			}
	  </style>
   
   <body>
				 
	 <h2 style="text-align: center; color:white;font-size: 50px;"><u>Fill Details</u></h2>
	 <form action="thankyou.php" method="POST">
	 	<table id="box">

	 		 <tr>
	 		 	<td>
	 		 		<input type="hidden" name="product_id" value="<?php echo $pid; ?>">
	 		 	</td>
	 		 </tr>

	 		 <?php
	 		 include'connection.php';
	 		 $uid = $_SESSION['uid'];
	 		 $sql = "SELECT * FROM userdata WHERE id = {$uid}";
	 		 $result = mysqli_query($conn,$sql) or die("Query failed");
	 		 if(mysqli_num_rows($result)>0){

	 		 	while ($row= mysqli_fetch_assoc($result)){

	 		 ?>
	 		 <tr>
	 			<td>
	 				<label>User Id :</label>
	 			</td>
	 			<td>
	 				<input type="text" name="uid" value="<?php echo $row['id'];?>" readonly required>
	 			</td>
	 			<td>
	 		</tr>

	 		<tr>
	 			<td>
	 				<label>Name :</label>
	 			</td>
	 			<td>
	 				<input type="text" name="b_name" value="<?php echo $row['name'];?>" readonly required>
	 			</td>
	 			<td>
	 		</tr>

	 		<tr>
		     	<td>
	 			<label>Email :</label>
	 			</td>
	 			<td>
	 				<input type="email" name="b_email" value="<?php echo $row['email'];?>" readonly required>
	 			</td>
	 		</tr>

	 		<tr>	
	 			<td>
	 			<label>Phone No. :</label>
	 			</td>
	 			<td>
	 				<input type="number" name="b_phone" value="<?php echo $row['phone'];?>" readonly required>
	 			</td>
	 		</tr>

	 		<tr>
	 			<td>
	 			<label>Age : </label>
	 			</td>
	 			<td>
	 				<input type="number" name="b_age" value="<?php echo $row['age'];?>" readonly required>
	 			</td>
	 		</tr>

	 		<tr>
	 			<td>
	 			<label>Date  : </label>
	 			</td>
	 			<td>
	 				<input type="Date" name="b_date"  required>
	 			</td>
	 		</tr>

	 		<tr>
	 			<td>
	 			<label>State :</label>
	 			</td>
	 			<td>
	 				<input type="text" name="b_state" required>
	 			</td>	
	 		</tr>

	 		<tr>
	 			<?php echo "<td><label>
					        Quantity : </label></td>
					        <td> <input type='number' name='quantity'  id='enter_quentity' placeholder='enter quantity' data-id='{$pid}' required>
					  	</td> ";?>
			</tr>


        <tr id="total-prise" style="display: none;">	 			
	 	  
	 	</tr>

	 		<tr><td></td>
	 			<td> 
	 				<button name="sumbit" style="background: green; color:white; border-radius: 50px;width: 150px;height: 30px;" >Buy Now</button>
	 			</td>
	 		</tr>

	 		<?php
	 	}
	 }

	 		?>
	 	</table>
	 </form>
	 <button style="background: cyan; border-radius:50px;width:200px;height:30px"><a style="color:black; text-decoration:none"   href="getdata.php">Home Page</a></button>

     <script src="js/jquery.js"></script>
     <script>
        	$(document).ready(function(){
        		
        			$('#close-btn').on("click",function(){
  		         	          $("#modal").slideUp('slow');
  		                 });

        		$('#enter_quentity').on("keyup",function(){
  				      var product_id = $(this).data('id');
  				      var enter_quntity = $(this).val();
  				      if(enter_quntity == ""){
  				      $('#total-prise').slideUp();	
  				      }else{
  				        $('#total-prise').slideDown();
  				      $.ajax({
  					    	url : "quantity-count.php",
  					    	type : "POST",
  						    data : {id : product_id , quantity : enter_quntity},
  						    success : function(data){
  						    	$('#box #total-prise').html(data);
  					    	}
  				    });
  				  }    
  		      });
        	

        	});


  		</script>
  		</body>
</html>

<?php
include'footer.php'; 
}   // end of session
else{
	session_destroy();
	 header("Location: signup.php");
}