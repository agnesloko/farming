<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'farming');
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Fetch all products from the database
$sql = "SELECT * FROM images";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel - View Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 40px;
        }
        .text-center{
            color:white;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            max-height: 200px;
            object-fit: cover;
            border-radius: 0.25rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #007bff;
        }

        .card-text {
            color: #6c757d;
        }

        .price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #28a745;
        }

        .container {
            padding: 30px;
        }

        .no-products {
            text-align: center;
            color: #6c757d;
            font-size: 1.2rem;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Available Products</h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="admin/uploads/' . $row['image'] . '" class="card-img-top" alt="Product Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                    echo '<p class="card-text">' . $row['description'] . '</p>';
                    echo '<p class="price">ksh' . $row['price'] . '</p>';
                    echo '<p class="card-text"><strong>Category:</strong> ' . $row['category'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="no-products">No products available.</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
