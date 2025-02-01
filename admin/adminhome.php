<?php
include 'db.php';

// Fetch total admins count
$admin_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM admins");
$admin_row = mysqli_fetch_assoc($admin_result);
$total_admins = $admin_row['total'];

// Fetch total products count
$product_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM images");
$product_row = mysqli_fetch_assoc($product_result);
$total_products = $product_row['total'];

// Fetch total messages count
$message_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM contacts");
$message_row = mysqli_fetch_assoc($message_result);
$total_messages = $message_row['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .dashboard-title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        .card {
            transition: 0.3s;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card i {
            font-size: 50px;
            margin-bottom: 15px;
            color: #007bff;
        }

        .card-title {
            font-weight: bold;
            font-size: 22px;
        }

        .card-body {
            padding: 30px;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
            background-color: #343a40;
            color: white;
            border-radius: 5px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="dashboard-title">Admin Dashboard</h1>

        <div class="row">
            <!-- Add Product -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-box"></i>
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Total number of products:</p>
                        <h2><?php echo $total_products; ?></h2>
                        <a href="uploadproducts.php" class="btn-custom">Manage Products</a>
                    </div>
                </div>
            </div>

            <!-- View Messages -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-envelope"></i>
                        <h5 class="card-title">Messages</h5>
                        <p class="card-text">Total customer messages:</p>
                        <h2><?php echo $total_messages; ?></h2>
                        <a href="contact_us.php" class="btn-custom">View Messages</a>
                    </div>
                </div>
            </div>

            <!-- Number of Admins -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-users"></i>
                        <h5 class="card-title">Admins</h5>
                        <p class="card-text">Total number of administrators:</p>
                        <h2><?php echo $total_admins; ?></h2>
                        <a href="admins.php" class="btn-custom">View Admins</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    

</body>
</html>
