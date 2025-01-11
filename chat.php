<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Catalog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: column;
        }
        .card-header {
            background-color: #6c63ff;
            color: #ffffff;
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
            color: #555;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #f9f9f9;
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
            background-color: #f39c12;
        }
        .btn-edit:hover {
            background-color: #d4880e;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
        .btn-buy {
            background-color: #3498db;
        }
        .btn-buy:hover {
            background-color: #2980b9;
        }
        .btn-cart {
            background-color: #2ecc71;
        }
        .btn-cart:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; margin-bottom: 20px; color: #333;">Course Catalog</h1>
    <div class="container">
        <!-- Card 1 -->
        <div class="card">
            <div class="card-header">Introduction to PHP</div>
            <div class="card-body">
                <p><strong>ID:</strong> 1</p>
                <p><strong>Description:</strong> Learn the basics of PHP programming, including syntax, functions, and more.</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
                <button class="btn btn-buy">Buy</button>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="card">
            <div class="card-header">Advanced MySQL</div>
            <div class="card-body">
                <p><strong>ID:</strong> 2</p>
                <p><strong>Description:</strong> Dive deep into database design, optimization, and complex queries.</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
                <button class="btn btn-buy">Buy</button>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
        <!-- Additional Cards -->
        <!-- Add more course cards as needed -->
    </div>
</body>
</html>
