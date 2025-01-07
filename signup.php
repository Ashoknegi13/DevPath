<?php
  include 'nav.php';
    if(isset($_POST['sumbit1'])){
	   include 'connection.php';
     $uname = $_POST['uname'];
	   $upass = $_POST['pass'];
	   $uemail = $_POST['email'];
	   $uphone = $_POST['phone'];
	   $uage = $_POST['age'];
	   $gen = $_POST['gen'];
	   $usertype = $_POST['usertype'];
	   $file_name = $_FILES['image']['name'];
	   $file_tmp = $_FILES['image']['tmp_name'];
	   $folder = "upload-image/".$file_name; 

// befor inserting the user data checking user name, email,phone already exit or not ------------->>
 	//    $check_name = mysqli_query($conn,"SELECT * FROM userdata WHERE name = '$uname' ");
 	//    $check_email = mysqli_query($conn,"SELECT * FROM userdata WHERE email = '$uemail' ");
    //  $check_phone = mysqli_query($conn,"SELECT * FROM userdata WHERE phone = '$uphone' ");
    //  $error = array();
    //  if(mysqli_num_rows($check_name)>0){
   	//    $error['1'] = "Username already taken.....";
    //  }else if(mysqli_num_rows($check_email)>0){
   	//    $error['1'] ="email already taken....." ;
    //  }else if(mysqli_num_rows($check_phone)>0){
    //  	$error['1'] = "phone already taken.....";
    //  }
  
    // if(isset($error['1'])){ 
	//     echo "<script>alert('{$error['1']}')</script>";
    //  }

// this is for if user not exits on database so insert new user in database
    // if(count($error)<1){
	    $sql = "INSERT INTO userdata(name,password,email,phone,age,gender,usertype,file) values ('$uname','$upass','$uemail','$uphone','$uage','$gen','$usertype','$file_name')"; 
	    $result = mysqli_query($conn,$sql) or die("query failed");
	       if($result){
		        move_uploaded_file($file_tmp,$folder);
		        header("Location: 	welcome.php");
	      	}else {
		       echo "Data is not submitted";
		        }
     // } // count error
 }
  
?> 


<html>
 <head>
	<title>Dev Path landing Page</title>
	 <style>
			body{
				font-family: arial;
				background-image: url('upload-image/bg.jpg');
				background-size: cover;
				color : #fff;
			} 
		   #box{
				border: 2px solid  white;
  	          background:  linear-gradient(135deg, #1d2671, #c33764);
				padding: 20px;
				margin: 5px;
				text-align: center;
				margin-top: 20px;
				border-radius: 50px;
				height: 500px;
				 
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
		<h1  style="color: white; font-size:24px;margin-top: 30px;"> Welcome To <u style="color:RED">DevPath</u> - Your One-Stop Plateform for Learning</h1><hr><br>
	<body>
		 			<div class="containe">
				     <h2><li>Explore, Learn, and Elevate Your Skills</li></h2>				
		     	<p>
				    At <b style="color:red">[ DevPath ]</b> , we provide a diverse range o programming languages course designed for every learner . Whether you're a bignner or an advanced user , you'll find course tailored to fit your learning journey.
			   </p>

		  	<h2><li>Feature You'll Love</li> </h2>
			   <p>
				  <ol>
				 	  <li><b>Customized Profile Management: </b> Manage your profile and track your <br> course  purchases effortlessly . </li>
				 	  <li><b>Cart & Purchase : </b> Easily add course to your carft and proceed with <br>secure purchase . </li>
				 	  Start Learning right away !
				 	   <li><b>Admin Control : </b> For our administrators , the plateform offers full control <br>over course, user management , and content update. </li>	
				 </ol>
			</p>
			<h2><li>Our Services</li></h2>
			<ol>
				<li><strong>WEB DEVELOPMENT : </strong> we use HTML , CSS .</li>
				<li><strong>JAVA DEVELOPMENT : </strong> We us java language.</li>
				<li><strong>PHP DEVELOPMENT : </strong> We use php language.</li>
				<li><strong>WEB SECURITY : </strong> We manege Website security.</li>
			</ol>
		</div>

	<div align="center" >
		<h1 style="color: red;"> <u>Register  here:</u></h1>
      <form action=""  method="POST" autocomplete="off" enctype="multipart/form-data">	
					<table id="box" >
            <tr>
            	 <td></td>
               <td id="unique-data">      
						</td>
						</tr>
						<tr>
							<td><label for="uname">Name :</label></td>
							<td><input type="text" name="uname" id="uname" placeholder="username" required>
              </td>
              </tr>
						<tr>
								<td><label for="pass">Password :</label></td>
								<td><input type="Password" name="pass" id="pass" placeholder="password"  required></td>
				 	 </tr>
					  <tr>
								<td><label for="email">Email :</label></td>
								<td><input type="Email" name="email" id="email" placeholder="email"  required></td>
					  </tr>

					  <tr>
								<td><label for="ph">Phone :</label></td>
								<td><input type="number" name="phone" id="ph" placeholder="phone"  required></td>
					 </tr>

					  <tr>
								<td><label for="age">Age :</label></td>
								<td><input type="number" name="age" id="age" placeholder="age"  required></td>
					  </tr>

					  <tr>
								<td><label>Gender :</label></td>
								<td><select name="gen" required >
									<option>--SELECT--</option>	
									<option>Male</option>
									<option>Female</option>
								  </select></td>
					   </tr>

					   <tr>
					 		   <td><input type="hidden" name="usertype" value="normal"></td>
					   </tr>

				     <tr>
								<td><label>Picture :</label></td>
								<td><input style="padding-left: 40px;" type="file" name="image"  ></td>
					  </tr>

					  <tr>
								<td></td>
								<td style="padding-left:70px">
									<button  name="sumbit1"  style="background:blue;border-radius:50px;color:white;width: 200px;height: 30px;cursor: pointer;">Sign Up</button>
								</td>
					 </tr>

				</table>
			</form>
		</div>
	 		

		<h3 style="color:white">If you are already register please click hear and <div align="center"><br>
			 <button style="background:green;border-radius:50px;width: 300px;height:40px;"><a style="color:white; text-decoration:none;" href="welcome.php" >Login hear</a></button>
			</div>
  </h3>
				<h2 style="color:white"><li>Why Choose Us?</li></h2>
			<p>
				 <ul>
				 	<li style="color:white"><b>Compreshensive Course Catalog :</b></li>
				 		 <p style="color:white">Explore a wide range of programming languages, from beginner to advances levels.</p>
				 	
				 		 <li style="color:white"><b> User-Friendly Experience:</b></li>
				 		 <p style="color:white">Simple registration, qucik login,and seamless navigation for a smooth learning experience .</p>
				 		<li style="color:white"><b>Secure and private : </b></li>
				 		<p style="color:white">Your data is safe with us , with secure authentication and access controle for a personalized experience.</p>
				 </ul>
			</p>
	<hr>
				 <i><b style="color:white">Join Our Community</b></i>
				 <p style="color:white; text-shadow:red" >View the latest additions to our user base and see which courses are trending . Our community of  learners is growing every day - join us to start your learning journey !</p>
	</body>




 <script src="js/jquery.js"></script>
	   <script>
		$(document).ready(function(){
			$('#uname').on("keyup",function(){
				 // --------------This is for   find unique name  _______________________________>>>
  			var search_term = $(this).val();
  			$('#unique-data').slideDown();

  			$.ajax({
  					url : "match-username.php",
  					type : "POST",
  					data : {search : search_term},
  					success : function(data){
  							$("#unique-data").html(data);
  							$('#unique-data').slideUp();	 
  					}
  			});
  		});


  		$('#email').on("keyup",function(){
				 // --------------This is for uniqe email  _______________________________>>>
  			var search_term = $(this).val();
  			$('#unique-data').slideDown();

  			$.ajax({
  					url : "match-email.php",
  					type : "POST",
  					data : {search : search_term},
  					success : function(data){
  							$("#unique-data").html(data);
  							$('#unique-data').slideUp();	 
  					}
  			});
  		});


  		$('#ph').on("keyup",function(){
				 // --------------This is for   uniqe   number _______________________________>>>
  			var search_term = $(this).val();
  			$('#unique-data').slideDown();

  			$.ajax({
  					url : "match-phone.php",
  					type : "POST",
  					data : {search : search_term},
  					success : function(data){
  							$("#unique-data").html(data);
  							$('#unique-data').slideUp();	 
  					}
  			});
  		});

	}); // script 

</script>
</html>

<?php
include 'footer.php';
?>