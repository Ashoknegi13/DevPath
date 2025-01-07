<?php
session_start();
// Data came from the previous page (thankyou.php)
$product_id = $_POST['product_id'];
$uid = $_POST['uid'];
$b_name = $_POST['b_name'];
$b_email = $_POST['b_email'];
$b_phone = $_POST['b_phone'];
$date = $_POST['date'];
$b_age = $_POST['b_age'];
$b_state = $_POST['b_state'];
$quantity = $_POST['quantity'];

include('connection.php');
$sql = "INSERT INTO buyer (product_id, user_id, name, email, phone, age, date, state, quantity) 
        VALUES ('$product_id', '$uid', '$b_name', '$b_email', '$b_phone', '$b_age', '$date', '$b_state', '$quantity')";
$result = mysqli_query($conn, $sql) or die("Insert buyer detail query failed");

if ($result) {
    echo "";
} else {
    echo "<script>alert('Query failed to insert buyer details');</script>";
    header("Location: getdata.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1d2671, #c33764);
            color: #fff;
            overflow: hidden;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 3.5rem;
            margin: 0 0 20px;
            color: #ffeb3b;
            text-shadow: 0px 0px 20px rgba(255, 255, 0, 0.9);
        }

        p {
            font-size: 1.5rem;
            margin: 0 0 30px;
            color: #ffe57f;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 15px 30px;
            font-size: 1.2rem;
            color: #fff;
            background: #00c853;
            border-radius: 50px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, background 0.3s;
        }

        .btn:hover {
            transform: scale(1.1);
            background: #008c3a;
        }

        /* Dollar Animation */
        .dollar {
            position: absolute;
            font-size: 2rem;
            color: #00ff88;
            animation: float 5s infinite ease-in-out;
            opacity: 0.9;
            text-shadow: 0px 0px 10px rgba(0, 255, 136, 0.9);
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) scale(0.5);
                opacity: 0.3;
            }
        }
    </style>
</head>
<body>

     

    <!-- Thank You Content -->
    <div class="container">
        <h1>Payment Successful!</h1>
        <p>Thank you for choosing DevPath! Start your journey and unlock your potential.</p>
        
        <!-- Download Button -->
        <?php
        if ($product_id == 1) {
            echo "<a href='https://drive.google.com/file/d/1RNeiThz1FHUJBvCFV_2rVQ3bEmD7ZMyk/view?download=1' class='btn' target='_blank' id='downloadBtn'>Download Web Development Course</a>";
        } elseif ($product_id == 2) {
            echo "<a href='https://drive.google.com/file/d/1RS8sVjuaRQY9qGmfd03qJUK1ON6rfsZR/view?download=1' class='btn' target='_blank' id='downloadBtn'>Download Java Course</a>";
        } elseif ($product_id == 3) {
            echo "<a href='https://drive.google.com/file/d/1RS8sVjuaRQY9qGmfd03qJUK1ON6rfsZR/view?download=1' class='btn' target='_blank' id='downloadBtn'>Download C language Course</a>";
        } elseif ($product_id == 4) {
            echo "<a href='https://drive.google.com/file/d/1RXEbyVW8HM4cRsc_Ti6n1gOLL61Ofoss/view?download=1' class='btn' target='_blank' id='downloadBtn'>Download PHP Course</a>";
        } else {
            echo "<a href='getdata.php' class='btn'>No Course Available (Go to Home Page)</a>";
        }
        ?>

    </div>

    <!-- Dollar Animation -->
    <script>
        const totalDollars = 50; // Number of dollar symbols
        for (let i = 0; i < totalDollars; i++) {
            const dollar = document.createElement('div');
            dollar.classList.add('dollar');
            dollar.textContent = '$';
            dollar.style.left = Math.random() * 100 + 'vw';
            dollar.style.animationDuration = 3 + Math.random() * 5 + 's';
            dollar.style.fontSize = Math.random() * 2 + 1 + 'rem';
            dollar.style.color = `hsl(${Math.random() * 360}, 100%, 70%)`;
            document.body.appendChild(dollar);
        }

       
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // When the download button is clicked, open PDF and redirect
            $('#downloadBtn').click(function (e) {
                // Open the PDF in a new tab
                var pdfWindow = window.open($(this).attr('href'), '_blank');
                
                // After the user closes the PDF window, redirect to getdata.php
                var checkPDFClosed = setInterval(function () {
                    if (pdfWindow.closed) {
                        // Redirect to getdata.php
                        window.location.href = 'getdata.php';
                        clearInterval(checkPDFClosed);
                    }
                }, 1000); // Check every second
                return false; // Prevent default link behavior
            });
        });
    </script>
</body>
</html>
