 <?php
 include 'connection.php';
 $cart_product_id = $_POST['id'];
  
 
  $sql = "DELETE FROM cart_detail WHERE id = {$cart_product_id} ";
  if(mysqli_query($conn,$sql)){
        echo 1;
  	   }else{
    echo 0;
  }

?>