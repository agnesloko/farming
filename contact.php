<?php
// Include database connection
include 'db_connection.php';

// Initialize variables for error/success messages
$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize inputs
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $phone = $conn->real_escape_string(trim($_POST['phone']));
    $location = $conn->real_escape_string(trim($_POST['location']));

    // Validate required fields
    if (empty($name) || empty($email)) {
        $error = "Name and Email are required fields.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        // Insert data into database
        $sql = "INSERT INTO contacts (name, email, phone_number, location) 
                VALUES ('$name', '$email', '$phone', '$location')";

        if ($conn->query($sql) === TRUE) {
            $success = "Your information has been successfully submitted.";
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 18px;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }
        
        .form-group label {
            font-weight: bold;
        }
        .alert {
            margin-top: 20px;
        }

        .navbar {
            background-color: #f39c12;
            animation: navbarColorChange 5s linear infinite;
        }

        .navbar-brand img {
            height: 60px;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 18px;
            transition: color 0.6s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #333 !important;
            background-color: grey;
        }

        @keyframes navbarColorChange {
            0% {
                background-color: #f39c12;
            }
            50% {
                background-color: orange;
            }
            100% {
                background-color: grey;
            }
        }
        footer {
            background-color: black;
            color: white;
            padding: 40px 0;
        }

        .footer-title {
            font-size: 1.25rem;
            color: pink;
            margin-bottom: 20px;
        }

        .social-icons a {
            color: pink;
            margin-right: 15px;
            font-size: 20px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: white;
        }

        .footer-line {
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        .footer-row p {
            margin: 0;
        }

        .footer-row a {
            color: pink;
            text-decoration: none;
        }

        .footer-row a:hover {
            text-decoration: underline;
        }

        .copyright {
            color: white;
        }

        .year {
            color: pink;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Fruitfix Logo"> Fruitfix</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about_us.html">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="product.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="Teams.html">Teams</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center">Contact Us</h2>
        <p class="text-center">Please fill out the form below, and we'll get back to you soon.</p>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter your location">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div><br><br>
    <footer>
        <div class="container">
            <div class="row footer-row">
                <div class="col-md-4">
                    <h5 class="footer-title">Contact Details</h5>
                    <p>Email: lokoagness25@gmail.com<br>justusmwendwa022@gmail.com</p>
                    <p>Phone: 0704304222/0115998400</p>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">Address</h5>
                    <p> Wote - Makueni, Kenya</p>
                    <p> P.O BOX 78 – 90300</p>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-line"></div>
            <p class="text-center copyright">&copy; <span class="year">2025</span> Your Organization. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Update year dynamically
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
