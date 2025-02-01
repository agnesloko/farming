<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"><!-- Link to external stylesheet -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        nav {
            background: #333;
            color: white;
            padding: 10px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000; /* Keep navbar above the content */
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex; /* Align items horizontally */
            justify-content: right; /* Center the items */
        }
        nav ul li {
            margin: 0 15px; /* Spacing between the links */
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        section {
            padding: 80px 20px 20px; /* Add padding to push content below the navbar */
        }
        a {
            display: inline-block;
            padding: 10px 15px;
           
            color: white;
            text-decoration: none;
            margin-top: 10px;
        }
        a:hover {
            color: red;
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
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="uploadproducts.php">Products</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="admins.php">Admins</a></li>
            <li><a href="contact_us.php">Contact</a></li>
        </ul>
    </nav>

    <section>
        <h1>Welcome to the Admin Dashboard</h1>
        


        <?php include 'adminhome.php';?>
        <a href="logout.php">Logout</a> <!-- Logout link -->
    </section>
     
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
</body>
</html>
