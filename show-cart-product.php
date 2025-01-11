<?php
 session_start();
 if($_SESSION['usertype']=="admin" || $_SESSION['usertype']=="user" ||  $_SESSION['usertype']=="normal"){
 	include'nav.php';
 	include 'bg_color.php';
 ?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>cart product</title>
		<style>
				body{
			font-family: arial;
			font-size: 15PX;
		}
		#modal{
	background:  linear-gradient(135deg, #1d2671, #c33764);
		 position: fixed;
		 margin-left:52%;
		 margin-top:65px;
		width: 340px;
		height:  500px;
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
			#successmessage{
			background: #DEF1D8;
			color: green;
			padding:10px;
			margin: 10px;
		 	display: none;
		 	position: absolute;
		 	right: 250px;
		 	top: 15px;
		}
	#errormessage{
			background: #EFDCDD;
			color: red;
			padding:10px;
			margin: 10px;
		 	display: none;
		 	position: absolute;
		 	right: 250px; 
		 	top: 15px;
		}

		 

		</style>
	</head>
	<body>
		   <div id="modal">
					<table   cellpadding="10px">
						<tr>
							<td id="load-form">
						  
							</td>
						</tr>
					</table>
				<div id="close-btn" style="margin-top:20px" >X</div>
		</div>

		<table id="main">
			<tr>
		       <td><h1 style="margin-left: 50%;"> Your cart products </h1></td>
			</tr>
			<tr>
				<td id="load-table">
 
				</td>
			</tr>
		</table>

		<div id="errormessage"></div>
		<div id="successmessage"></div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script>
			  $(document).ready(function(){
				  function loadTable(){
					$.ajax({
						url : "load-cart-product.php",
						type : "POST",
						success : function(data){
						  $('#load-table').html(data);
					   }
					});
				} loadTable();


				$(document).on("click","#edit-cart-quentity",function(e){
					var cart_id = $(this).data("id");
			     
			        $('#modal').slideDown(1000);
			        $.ajax({
			        		url : "edit-cart-quentity.php",
			        		type : "POST",
			        		data : {id : cart_id},
			        		success : function(data){
			        			$('#load-form').html(data);
			        		}
			        });
			 
				});

				$('#close-btn').on('click',function(e){
					$('#modal').slideUp(1000);
				});

				$(document).on("click","#quentity-btn",function(e){
						var cart_id = $(this).data('uid');
						var quentity = $('#new-quentity').val();
						//alert(quentity);

						$.ajax({
							url : "update-cart_quentity.php",
							type : "POST",
							data : {id : cart_id , quentity : quentity},
							success : function(data){
								if(data == 1){
									$('#modal').slideUp();
									loadTable();
									$('#successmessage').html("SUCCESS").slideDown();
									$('#errormessage').slideUp();
								}else{
									$('#modal').slideUp();
									loadTable();
									$('#successmessage').html("SUCCESS").slideDown();
									$('#errormessage').slideUp();
								}$('#successmessage').slideUp(3000);
								  $('#errormessage').slideUp(3000);
							}
						});
 				});


 				$(document).on("click","#delete-cart-product",function(e){
 					 var id = $(this).data("id");
 				 var element = this;
 					 $.ajax({
 					 	url : "delete-edit-cart.php",
 					 	type : "POST",
 					 	data : {id : id},
 					 	success : function(data){
 					 		if(data==1){
 					 			$(element).closest("tr").fadeOut(1000);
								  $('#successmessage').html("DELETE").slideDown().css('background-color','red').css('color','white');
								  $('#errormessage').slideUp();
 					 		} $('#successmessage').slideUp(3000);
							  $('#errormessage').slideUp(3000);
 					 	}
 					 });

 				});


			});
		</script>

	</body>
	<footer style="margin-top: 400px ;">
		<?php 
		include'footer.php';
		 ?>
	</footer>
</html>
<?php
 }
?> 