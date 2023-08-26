<?php
session_start();
$userLoggedIn = false; // Assume user is not logged in by default

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userLoggedIn = true;
}

// Initialize the cart in the session if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding items to the cart
if (isset($_POST['add_to_cart'])) {
    $productName = $_POST['product_name'];
    $price = $_POST['price'];

    // Database configuration
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = 'watersupplyphp';

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the product into the cart table
    $insertQuery = "INSERT INTO cart (user_id, product_name, price) VALUES (?, ?, ?)";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("iss", $_SESSION['user_id'], $productName, $price);

    if ($stmt->execute()) {
        // Product added successfully, show a success message
        $message = "Product added to cart!";
    } else {
        // Error occurred while adding the product, show an error message
        $message = "Error adding product to cart.";
    }

    $stmt->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="frontend/products.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <style>
        /* Add this CSS to your existing style.css or in a <style> tag in your HTML */
        .product-listing {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Three columns */
            gap: 20px; /* Gap between products */
            padding: 20px;
        }

        .product {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<header class="navbar">
    <div class="logo">
      <a href="http://localhost/water_supply_php_version/index.php"><img src="frontend/img/download.jfif" alt="Company Logo" style="width: 90px; height: 100px;">
      </a>
    </div>
    <nav class="navbar-icons">
    <?php if ($userLoggedIn) : ?>
        <a href="http://localhost/water_supply_php_version/cart.php"><img src="frontend/img/grocery-store.png" alt="Cart">Cart</a>
        <a href="http://localhost/water_supply_php_version/userDashboard.php"><img src="frontend/img/avatar.png" alt="Dashboard">Dashboard</a>
    <?php else : ?>
        <a href="http://localhost/water_supply_php_version/login.php"><img src="frontend/img/avatar.png" alt="Login">LogIn</a>
    <?php endif; ?>
    <a href="http://localhost/water_supply_php_version/products.php"><img src="frontend/img/product.png" alt="Products">Products</a>
    <a href="http://localhost/water_supply_php_version/aboutUs.php"><img src="frontend/img/contact-us.png" alt="Products">ABOUT US</a>
</nav>
  </header>
    <section class="product-section">
        <?php
        // Database configuration
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = 'watersupplyphp';

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch product types from the database
        $sql = "SELECT DISTINCT product_type FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productType = $row["product_type"];
                echo '<div class="product-category">';
                echo '<h2>' . $productType . '</h2>';

                // Fetch products of the current type
                $productsSql = "SELECT * FROM products WHERE product_type = '$productType'";
                $productsResult = $conn->query($productsSql);

                if ($productsResult->num_rows > 0) {
                    echo '<section class="product-listing">';
                    while ($product = $productsResult->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<img src="' . $product["image_url"] . '" alt="' . $product["product_name"] . '">';
                        echo '<h3>' . $product["product_name"] . '</h3>';
                        echo '<p>' . $product["description"] . '</p>';
                        echo '<span>' . $product["price"] . ' Taka</span>';
                        
                        // Add the "Add to Cart" button within a form
                        echo '<form method="post">';
                        echo '<input type="hidden" name="product_name" value="' . $product["product_name"] . '">';
                        echo '<input type="hidden" name="price" value="' . $product["price"] . '">';
                        echo '<button class="add-to-cart" type="submit" name="add_to_cart">Add to Cart</button>';
                        echo '</form>';
                        
                        echo '</div>';
                    }
                    echo '</section>';
                }

                echo '</div>';
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </section>
<footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-left">
          <a href="https://www.facebook.com/bisleriindia"><img src="frontend/img/fb-logo.jpg" alt="Facebook"></a>
          <a href="https://www.instagram.com/bisleriindia/"><img src="frontend/img/insta.jpg" alt="Instagram"></a>
          <a href="https://twitter.com/bisleriindia"><img src="frontend/img/twit.png" alt="Twitter"></a>
        </div>
        <div class="ahsan-magi">
          <div class="footer-center">
            <img src="frontend/img/download.jfif" alt="AQUA DROPS Logo" class="logo-image">
            <p>aqua@Doorstep</p>
            <p>123 Main Street, Anytown, CA 12345</p>
            <p>Phone: (123) 456-7890</p>
            <p>Email: info@aqua.com</p>
          </div>
        </div>
        <div class="footer-right">
         <a href="">About Us</a>
          <a href="#">Contact Us</a>
          <a href="#">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
