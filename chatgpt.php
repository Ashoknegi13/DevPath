 
    <style>
    
        .container {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); /* 2 cards per row */
            gap: 90px; /* Space between cards */
        }
        .card {
            background:  linear-gradient(135deg,rgb(36, 42, 100), #c33764);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            width: 90%;
        }
        .card-header {
            background:  linear-gradient(135deg, #1d2671, #c33764);
            color:white;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }
        .card-body {
            padding: 15px;
            flex: 1;
        }
        .card-body p {
            margin: 0 0 10px;
            color: white;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background:  linear-gradient(135deg,rgb(111, 124, 236), #c33764);
        }
        .btn {
            padding: 8px 12px;
            font-size: 14px;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-edit {
            background:  linear-gradient(135deg,rgb(50, 59, 137), #c33764);
        }
        .btn-edit:hover {
            background-color: #d4880e;
        }
        .btn-delete {
            background:  linear-gradient(135deg, #1d2671, #c33764);
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
        .btn-buy {
            background:  linear-gradient(135deg, #1d2671, #c33764);
        }
        .btn-buy:hover {
            background-color: #2980b9;
        }
        .btn-cart {
            background:  linear-gradient(135deg, #1d2671, #c33764);
        }
        .btn-cart:hover {
            background-color:rgb(21, 227, 107);
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; margin-bottom: 20px; color: white;"> "Success Starts Here - Choose a Course and Get Started!" </h1>
    <div class="container">
        <?php
        include "connection.php";
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql) or die("Query failed");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <!-- Card -->
        <div class="card">
            <div class="card-header"><?php echo $row['course_title']; ?></div>
            <div class="card-body">
                <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
                <p><strong>Description:</strong> <?php echo $row['course_discription']; ?> <br><br>
                    <a style="color: white; text-decoration: none; font-size: 20px" href="course.php?id=<?php echo $row['product_id']; ?>"><b><u>Full description.....</u></b></a>
                </p>
            </div>
            <div class="card-footer">
                <button class="btn btn-edit">
                    <a style="color:white; text-decoration:none;" href="edit_product.php?id=<?php echo $row['product_id']; ?>">Edit</a>
                </button>
                <button class="btn btn-delete">
                    <a style="color:white; text-decoration:none;" href="delete_product.php?id=<?php echo $row['product_id']; ?>">Delete</a>
                </button>
                <button class="btn btn-buy">
                    <a style="color:white; text-decoration:none; " href="buy_course.php?id=<?php echo $row['product_id']; ?>">Buy</a>
                </button>
                <button class="btn btn-cart">
                    <form action="insert-cart-data.php" method="POST">
                        <label>Quantity: </label>
                        <input type="hidden" name="product_cart" value="<?php echo $row['product_id']; ?>">
                        <input type="number" name="quantity" id="quantity" value="1" style="width: 40px">
                        <input type="submit" style="background:green; border-radius: 30px; color:white; width: 60px; cursor: pointer;" id="add_to_cart" value="Add" name="add_to_cart_btn"> 
                    </form>
                </button>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</body>
 
