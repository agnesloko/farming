<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Fruitfix</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 18px;
            background-image: url('images/orange2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            scroll-behavior: smooth;
            color: #333;
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

        .products-section {
            padding: 50px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .products-section h2 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 40px;
            color: #f39c12;
        }

        .info-section {
            text-align: center;
            margin-bottom: 40px;
            font-size: 18px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 1;
            animation: fadeInLines 7s ease-out forwards;
        }

        .info-section h3 {
            font-size: 28px;
            color: #f39c12;
            margin-bottom: 15px;
        }

        .info-section p {
            margin: 10px 0;
            animation: fadeInLine 2s ease forwards;
            opacity: 0;
        }

        .info-section p:nth-child(2) {
            animation-delay: 2s;
        }

        .info-section p:nth-child(3) {
            animation-delay: 4s;
        }

        .info-section p:nth-child(4) {
            animation-delay: 6s;
        }

        .info-section p:nth-child(5) {
            animation-delay: 8s;
        }

        .info-section p:nth-child(6) {
            animation-delay: 10s;
        }

        @keyframes fadeInLine {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card {
            text-align: center;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
            animation: productCardColorChange 5s linear infinite;
        }

        @keyframes productCardColorChange {
            0% {
                background-color: #fff;
            }
            50% {
                background-color: orange;
            }
            100% {
                background-color: grey;
            }
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.5s ease;
        }

        .product-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .product-card:hover img {
            transform: scale(1.08);
        }

        .product-card h5 {
            font-size: 24px;
            margin: 20px 0 10px;
            color: #333;
        }

        .product-card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .product-card .number {
            font-size: 18px;
            color: #f39c12;
            font-weight: bold;
        }

        .banner {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background-color: #f39c12;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            border-radius: 10px;
            animation: fadeInUp 1.5s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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

    <!-- Products Section -->
    <section class="products-section" id="products">
        <h2>Welcome to our available Products</h2>

        <!-- Information Section -->
        <div class="info-section">
            <h3>Why Choose Our Fruits?</h3>
            <p><strong>Taste Profile:</strong> Sweet, tangy, and juicy flavors that captivate your taste buds.</p>
            <p><strong>Nutritional Benefits:</strong> Packed with vitamins, minerals, and antioxidants to support a healthy lifestyle.</p>
            <p><strong>Uses:</strong> Enjoy them as snacks, blend into fresh juices, or use in delicious desserts.</p>
            <p><strong>Eco-Friendly Packaging:</strong> Our fruits are packed in biodegradable and protective materials, ensuring freshness while caring for the environment.</p>
            <p><strong>Shipping:</strong> Local delivery and nationwide shipping available. Estimated delivery times vary from 1-5 days, depending on location.</p>
        </div>
        <?php include 'admin/viewproducts.php'; ?>
        <div class="container">
            <div class="row">
                <!-- Pixies -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="images/pixie5.jpg" alt="Pixies">
                        <h5>Pixies</h5>
                        <p class="number">1</p>
                        <p>Sweet and tangy, perfect for a healthy snack. Pixies are a favorite for their unique flavor and juiciness.</p>
                    </div>
                </div>
                <!-- Oranges -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="images/orange3.jpg" alt="Oranges">
                        <h5>Oranges</h5>
                        <p class="number">2</p>
                        <p>Rich in vitamin C, our oranges are freshly picked to deliver the best taste and nutrition.</p>
                    </div>
                </div>
                <!-- Mangoes -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="images/mango3.jpg" alt="Mangoes">
                        <h5>Mangoes</h5>
                        <p class="number">3</p>
                        <p>Juicy and flavorful, our mangoes are sourced from the best farms to ensure premium quality.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner -->
        <div class="banner">
            Explore the finest selection of fresh fruits at Fruitfix!
        </div>
       
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
    <script>
        // Update year dynamically
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    
</body>
</html>
