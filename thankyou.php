<?php
$api_key = "rzp_test_Cjz1no5Om9G6Wi";
$product_id = $_POST['product_id'];
$user_id = $_POST['uid'];
$buyer_name = $_POST['b_name'];
$buyer_email = $_POST['b_email'];
$buyer_phone = $_POST['b_phone'];
$buyer_age = $_POST['b_age'];
$date = $_POST['date'];
$buyer_state = $_POST['b_state'];
$buyer_quentity = $_POST['quantity'];
$total_prise = $_POST['total_prise'];
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevPath - Secure Payment</title>
    <style>
        /* General styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1d2671, #c33764); /* Custom gradient */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        /* Card container */
        .payment-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
            perspective: 1000px;
            animation: slideIn 0.8s ease-out;
        }

        .payment-container:hover {
            transform: scale(1.05);
        }

        /* Header styling */
        .payment-header {
            font-size: 32px;
            font-weight: 700;
            color: #1d2671;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
        }

        .payment-subheader {
            font-size: 18px;
            text-align: center;
            color: #7F8C8D;
            font-style: italic;
            margin-bottom: 30px;
        }

        /* Course details styling */
        .course-details {
            margin-bottom: 30px;
            font-size: 16px;
            color: #34495E;
        }

        .course-details strong {
            font-weight: 700;
            color: #2C3E50;
        }

        /* Button styling */
        .razorpay-button {
            background: linear-gradient(135deg, #FF3366, #FF0066); /* Dynamic gradient */
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            padding: 18px 35px;
            border: none;
            border-radius: 12px;
            width: 100%;
            cursor: pointer;
            text-transform: uppercase;
            box-shadow: 0 8px 35px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
        }

        .razorpay-button:hover {
            background: linear-gradient(135deg, #FF0066, #FF3366);
            box-shadow: 0 12px 45px rgba(0, 0, 0, 0.3);
            transform: translateY(-4px);
        }

        .razorpay-button:active {
            transform: translateY(2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        /* Fade-in animation */
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="payment-container">
    <div class="payment-header">Secure Payment for DevPath Course</div>
    <div class="payment-subheader">Join us and level up your programming skills with high-quality courses!</div>

    <!-- Course Details Section -->
    <div class="course-details">
        <p><strong>Course Name:</strong> <?php echo $product_id; ?></p>
        <p><strong>Buyer Name:</strong> <?php echo $buyer_name; ?></p>
        <p><strong>Total Price:</strong> ₹<?php echo number_format($total_prise, 2); ?></p>
        <p><strong>Quantity:</strong> <?php echo $buyer_quentity; ?></p>
    </div>

    <!-- Payment Form -->
    <form action="success.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="uid" value="<?php echo $user_id; ?>">
        <input type="hidden" name="b_name" value="<?php echo $buyer_name; ?>">
        <input type="hidden" name="b_email" value="<?php echo $buyer_email; ?>">
        <input type="hidden" name="b_phone" value="<?php echo $buyer_phone; ?>">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="b_age" value="<?php echo $buyer_age; ?>">
        <input type="hidden" name="b_state" value="<?php echo $buyer_state; ?>">
        <input type="hidden" name="quantity" value="<?php echo $buyer_quentity; ?>">

        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo $api_key; ?>"
            data-amount="<?php echo $total_prise * 100; ?>"
            data-currency="INR"
            data-id="<?php echo $product_id; ?>"
            data-buttontext="Pay with Razorpay"
            data-name="DevPath"
            data-description="Empowering learners with high-quality programming courses and tools for success."
            data-image="https://example.com/your_logo.jpg"
            data-prefill.name="<?php echo $buyer_name; ?>"
            data-prefill.email="<?php echo $buyer_email; ?>"
            data-prefill.contact="<?php echo $buyer_phone; ?>"
            data-theme.color="#FF0066"
        ></script>
        <input type="hidden" custom="Hidden Element" name="hidden"/>
    </form>

</div>

</body>
</html>
