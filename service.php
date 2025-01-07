<html>
	<head>
		<title>
			 About us
		</title>
		<style>
			*{
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}

			body{
				font-family: arial;
				line-height: 1.6;
				background-color: orange;
				color: black;
				padding: 20px;
			}
			header{
				text-align: center;
				padding: 20px 0;
				background-color: darkorange;
				color: #fff;
			}

			h1{
				margin-bottom: 10px;
				font-size: 2.5em;
				font-weight: bold;
			}
			.container{
				max-width: 1200px;
				margin: 20px auto;
				padding: 20 px;
				background-color: #fff;
				border-radius: 10px;
				box-shadow: 0 2px 10px rgba(0,0,0.1);
			}
			h2{
				margin-bottom: 20px;
				font-size:2em ;
				color: #333;
			}
			p{
				margin-bottom: 20px;
				font-size:1.1em ;
				color: #333;
			}
			ol{
				margin-bottom: 20px;
				padding-left: 20px;
			}
			li{
				margin-bottom: 10px;
				font-size:1.1em ;
				color: blue;
			}
			li strong{
			 
				color: #333;
			}
		</style>
	</head>

	<body>
		<?php
		include'nav.php';
		?>
		<header>
		<h1>This is Our  Services </h1>
		</header> 

		<section id="about">
			<div class="containe">
				<h2>Who we are</h2>				
			 
			<p>
				Welcome to Ashoka arOrgnization , a dedicated team of professionals passionate about delevring high-quality solution to meet your needs. Our journey began with a vision to create  produc that blend innovation , function , and effication. today wwe continue to strive towards that goal with a commitment to continue to strive toward theat goal with a commitment to excellence in everything.

			</p>

			<h2>Our Mission </h2>
			<p>
				oUR MISSION IS TO EMPROIVE BUSSINESS AND INDIVIDUALS BY PROVIDING CUTTING-ADGE SOLUTION TAILORED TO THEIR UNIQUE CHALLENGES . WHETHER IT's  THROUGH WEB DEVELOPMENT , SOFTWARE DESIGN , OR CUSTOMIZED, SERVICES,
			</p>

			<h2>Our Services</h2>
			<ol>
				<li><strong>WEB DEVELOPMENT : </strong> we use HTML , CSS .</li>
				<li><strong>JAVA DEVELOPMENT : </strong> We us java language.</li>
				<li><strong>PHP DEVELOPMENT : </strong> We use php language.</li>
				<li><strong>WEB SECURITY : </strong> We manege Website security.</li>
			</ol>

				<h2>Why Choose Us?</h2>
			<p>
				At Ashoka organization , we take pride in our customers-appproch. With a combination of exprience , technical expertise , and a passion for what we do , we are confident in delivering outstanding result for each project.
			</p>
		</div>
			 

		</section>




	</body>
	<?php
		include'footer.php';
		?>
</html>