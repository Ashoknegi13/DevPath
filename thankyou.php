<?php
$api_key = "rzp_test_Cjz1no5Om9G6Wi";
$product_id = $_POST['product_id'] ."<br>";
 $user_id = $_POST['uid'] ."<br>";
 $buyer_name = $_POST['b_name'] ."<br>";
 $buyer_email = $_POST['b_email'] ."<br>";
  $buyer_phone = $_POST['b_phone'] ."<br>";
  $buyer_age = $_POST['b_age'] ."<br>";
 $buyer_state = $_POST['b_state'] ."<br>";
$buyer_quentity = $_POST['quantity'] ."<br>";
// echo $total_prise = $_POST['total_prise'] ."<br>";
echo $money = 1;

 ?>
  
  <form action="success.php" method="POST">
  <input type="text" name="uid" value="<?php echo $row['id']; ?>" hidden>
  <input type="text" name="b_name" value="<?php echo $row['name']; ?>" hidden>
  <input type="email" name="b_email" value="<?php echo $row['email']; ?>" hidden>
  <input type="number" name="b_phone" value="<?php echo $row['phone']; ?>" hidden>
  <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" hidden>
  <input type="number" name="b_age" value="<?php echo $row['age']; ?>" hidden>
  <input type="text" name="b_state" required hidden>
  <input type="text" name="b_state" required hidden>



<script
   src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $api_key ;?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $money*100; ?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-id="<?php echo $product_id ;?>"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay with Razorpay"
    data-name="DevPath"
    data-description="Empowering learners with high-quality programming courses and tools for success."
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="<?php echo $buyer_name ;?>"
    data-prefill.email="<?php echo $buyer_email ;?>"
	data-prefill.contact="<?php echo $buyer_phone ;?>"
	  
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden"/>
</form>