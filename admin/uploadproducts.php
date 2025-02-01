<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'farming');
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Handle product upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];

    // Ensure the uploads directory exists
    $uploadsDir = __DIR__ . '/uploads';
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0755, true);
    }

    $target = $uploadsDir . '/' . basename($image);

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Insert product details into the database
        $sql = "INSERT INTO images (name, description, price, category, image) 
                VALUES ('$name', '$description', '$price', '$category', '$image')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Product uploaded successfully');</script>";
        } else {
            echo "<script>alert('Failed to save product in the database');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image');</script>";
    }
}

// Handle product deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Get the image filename from the database
    $result = $conn->query("SELECT image FROM images WHERE id = $id");
    $product = $result->fetch_assoc();
    $imagePath = __DIR__ . '/uploads/' . $product['image'];

    // Delete the image file
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete the product from the database
    $conn->query("DELETE FROM images WHERE id = $id");
    echo "<script>alert('Product deleted successfully'); window.location.href = 'uploadproducts.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Admin Panel</h1>
        <div class="card mb-5">
            <div class="card-header">Upload Product</div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>

        <h2>Uploaded Products</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM images");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><img src='uploads/" . $row['image'] . "' width='100' alt='Product Image'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>ksh" . $row['price'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td><a href='uploadproducts.php?delete=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
