<?php
include 'bg_color.php';
session_start();
if ($_SESSION['usertype'] == "admin" || $_SESSION['usertype'] == "user" || $_SESSION['usertype'] == "normal") {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
			background:  linear-gradient(135deg, #1d2671, #c33764);
			color : #fff;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial;

        }
        h1 {
            font-size: 2.5em;
            margin-bottom: px;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            font-size: 1.1em;
            
        }

        .container {
			background:  linear-gradient(135deg, #1d2671, #c33764);
			color : #fff;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
          
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2em;
            margin-top: 20px;
        }

        p {
            font-size: 1.2em;
            line-height: 1.6;
        }

        .highlight {
            color: red;
        }

        b {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
 

    <div class="container">
        <p><b>Headline:</b> "Get in Touch with Us"</p>
        <p><b>Description:</b> Welcome to <u class="highlight">DevPath</u> Contact page! We believe that your feedback and questions are important. Please feel free to reach out to us for any inquiries, suggestions, or assistance you need related to our courses and services.</p>

        <h2>Contact Information</h2>
        <ul>
            <li><strong>Phone Number:</strong> 9045509148</li>
            <li><strong>Email:</strong> negiashok132@gmail.com</li>
            <li><strong>Instagram:</strong> @ashoknegi_13</li>
            <li><strong>WhatsApp Business:</strong> 9045509148</li>
        </ul>

        <h2>Why Contact Us?</h2>
        <p>At DevPath, we take pride in providing excellent customer service and support. Whether you have a question about our courses, need assistance with a project, or simply want to know more about our offerings, we are here to help. Our team is dedicated to providing timely responses and professional guidance for all your queries.</p>

        <h2>How to Reach Us</h2>
        <p>If you have any questions or need further assistance, feel free to contact us through the provided channels. We respond to all inquiries as quickly as possible, and we value every opportunity to connect with our users.</p>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>

<?php
} else {
    header("Location: signup.php");
}
?>
