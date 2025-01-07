<?php
 include 'connection.php';
 $pid = $_GET['id'];
 $sql = "DELETE FROM buyer WHERE id = $pid ";
 $result = mysqli_query($conn,$sql) or die("query failed");

 header("Location: sell_product.php");

 mysqli_close($conn);



?>