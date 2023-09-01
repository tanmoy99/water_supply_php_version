<?php
session_start();
$userLoggedIn = false; // Assume user is not logged in by default

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userLoggedIn = true;

$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_id = $_SESSION['user_id'];
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
    $database = 'php_water_supply';

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
  <title>Home Page</title>
  <link rel="stylesheet" href="frontend/random.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Inter&display=swap" rel="stylesheet">
  <!-- Slick Slider CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <link rel="stylesheet" href="frontend/products_style.css">
</head>
<body>
<?php
 include('header.php');

 ?>
<section class="product-section py-5">
  <div class="container">
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
            echo '<div class="product-category mb-4">';
            echo '<h2>' . $productType . '</h2>';

            // Fetch products of the current type
            $productsSql = "SELECT * FROM products WHERE product_type = '$productType'";
            $productsResult = $conn->query($productsSql);

            if ($productsResult->num_rows > 0) {
                echo '<div class="row product-listing">';
                while ($product = $productsResult->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="product">';
                    echo '<img src="' . $product["image_url"] . '" alt="' . $product["product_name"] . '" class="img-fluid">';
                    echo '<h3>' . $product["product_name"] . '</h3>';
                    echo '<p>' . $product["description"] . '</p>';
                    echo '<span>' . $product["price"] . ' Taka</span>';

                    // Add the "Add to Cart" button within a form
                    echo '<form method="post">';
                    echo '<input type="hidden" name="product_name" value="' . $product["product_name"] . '">';
                    echo '<input type="hidden" name="price" value="' . $product["price"] . '">';
                    echo '<input type="hidden" name="image_url" value="'.$product["image_url"].'">';
                    echo '<button class="add-to-cart" type="submit" name="add_to_cart">Add to Cart</button>';
                    echo '</form>';

                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }

            echo '</div>';
        }
    }

    // Close the database connection
    $conn->close();
    ?>
  </div>
</section>

<!-- Footer section -->
<footer class="bg-dark py-4">
  <div class="container">
    <div class="footer-content row">
      <div class="footer-left col-md-4">
        <a href="https://www.facebook.com/bisleriindia"><img src="frontend/img/fb-logo.jpg" alt="Facebook"></a>
        <a href="https://www.instagram.com/bisleriindia/"><img src="frontend/img/insta.jpg" alt="Instagram"></a>
        <a href="https://twitter.com/bisleriindia"><img src="frontend/img/twit.png" alt="Twitter"></a>
      </div>
      <div class="footer-center col-md-4">
        <img src="frontend/img/download.jfif" alt="AQUA DROPS Logo" class="logo-image">
        <p>aqua@Doorstep</p>
        <p>123 Main Street, Anytown, CA 12345</p>
        <p>Phone: (123) 456-7890</p>
        <p>Email: info@aqua.com</p>
      </div>
      <div class="footer-right col-md-4">
        <a href="">About Us</a>
        <a href="#">Contact Us</a>
        <a href="#">Terms of Service</a>
      </div>
    </div>
  </div>
</footer>
  <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Slick Slider JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</body>
</html>
