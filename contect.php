<?php
include 'bg_color.php';
session_start();
if ($_SESSION['usertype'] == "admin" || $_SESSION['usertype'] == "user" || $_SESSION['usertype'] == "normal") {
     include 'nav.php';  
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
            font-family: Arial, sans-serif;
           
            margin: 0;
            padding: 0;
      
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .container {
			background:  linear-gradient(135deg, #1d2671, #c33764);
			color : #fff;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2em;
			 
			color : #fff;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        ul {
            padding-left: 20px;
        }

        

        .contact-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .contact-info div {
			background:  linear-gradient(135deg, #1d2671, #c33764);
			color : #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
 
		a{
			 
			color : #fff;
		}
    </style>
</head>

<body>
  
 

    <section id="contact">
        <div class="container">
            <h2>Who We Are</h2>
            <p>Welcome to Ashoka Organization, a dedicated team of professionals passionate about delivering high-quality solutions to meet your needs. Our journey began with a vision to create products that blend innovation, function, and efficiency. Today, we continue to strive toward that goal with a commitment to excellence in everything we do.</p>

            <h2>Our Mission</h2>
            <p>Our mission is to empower businesses and individuals by providing cutting-edge solutions tailored to their unique challenges. Whether it's through web development, software design, or customized services, we are here to help you succeed.</p>

            <h2>Contact Information</h2>
            <div class="contact-info">
                <div>
                    <h3>Phone Number</h3>
                    <p>9045509148</p>
                </div>
                <div>
                    <h3>Email</h3>
                    <p><a href="mailto:negiashok1540@gmail.com">negiashok1540@gmail.com</a></p>
                </div>
                <div>
                    <h3>Instagram</h3>
                    <p><a href="https://www.instagram.com/ashoknegi_13" target="_blank">@ashoknegi_13</a></p>
                </div>
                <div>
                    <h3>WhatsApp Business</h3>
                    <p><a href="https://wa.me/9045509148" target="_blank">9045509148</a></p>
                </div>
            </div>

            <h2>Why Choose Us?</h2>
            <p>At Ashoka Organization, we take pride in our customer-first approach. With a combination of experience, technical expertise, and a passion for what we do, we are confident in delivering outstanding results for each project.</p>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>

<?php 
} else {
    header("Location: index.php");
}
?>
