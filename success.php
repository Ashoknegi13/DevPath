<?php
// File download handling
if (isset($_GET['download'])) {
    $filePath = 'course_materials.zip'; // Path to the downloadable course file
    if (file_exists($filePath)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo "<script>alert('File not found.');</script>";
    }
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
    <!-- Success Sound -->
    <audio id="successSound" autoplay>
        <source src="success.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Thank You Content -->
    <div class="container">
        <h1>Payment Successful!</h1>
        <p>Thank you for choosing DevPath! Start your journey and unlock your potential.</p>
        <a href="?download=1" class="btn">Download Your Course</a>
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

        // Play success sound
        const successSound = document.getElementById('successSound');
        successSound.play();
    </script>
</body>
</html>
