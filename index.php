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
</head>
<body>
<?php
 include('header.php');

 ?>

<section class="slider-container">
  <div class="slider">
    <div><img src="frontend/img/add.jpg" alt="Ad 1"></div>
    <div><img src="frontend/img/add1.jpg" alt="Ad 2"></div>
    <div><img src="frontend/img/add2.jpg" alt="Ad 3"></div>
  </div>
</section>

  <!-- Subscribe section -->
  <section class="subscribe-section">
    <h2>Subscribe With Us</h2>
    <p>Stay Hydrated!</p>
    <a href="http://localhost/water_supply_php_version/subscribe.php" class="subscribe-button">Subscribe</a>
</section>

<section class="product-section">
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
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

    // Fetch product types from the database
    $sql = "SELECT DISTINCT product_type FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productType = $row["product_type"];
            if ($productType === "Water Bottles") { // Filter only waterbottle products
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
                        echo '</div>';
                    }
                    echo '</section>';
                }

                echo '</div>';
            }
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</section>


<!-- Stay Hydrated and Stay Fresh section -->
<section class="stay-hydrated-section py-5">
  <div class="container">
    <h2 class="text-center">Stay Hydrated and Stay Fresh – Throughout the Day!</h2>
    <p>
      With the world now purchasing everything online, we at Bisleri have made sure we have adapted with the times and started our very own Bisleri@doorstep platform to buy all our products, including mineral water and natural Spring Water online. Now, from the comfort of your sofa, you may order any of our products online. They will be delivered to your doorstep ensuring you remain indoors and safe.
    </p>
    <p>
      Sounds interesting? Well, it sure is.
    </p>
    <p>
      We offer online purchase and home delivery options in all major metro cities across India. Choose from a wide range of exclusive Bisleri products such as Bisleri Mineral Water, Vedica, Club Soda, Fonzo, Limonata, Spyci, hand sanitizers and so on.
    </p>
    <p>
      Here are three simple steps to avail the bisleri@doorstep service from the comfort of your own home:
    </p>
    <ol>
      <li>Select a product of your choice from our range of products.</li>
      <li>Select a plan - either a one-time delivery or subscription with Bisleri@doorstep and avail discounts.</li>
      <li>Get your order delivered at your home doorstep.</li>
    </ol>
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
<script>
  // Initialize the Slick Slider
  $(document).ready(function(){
    $('.slider').slick({
      infinite: true,
      speed: 1000,
      autoplay: true,
      autoplaySpeed: 3000,
      slidesToShow: 1,
      slidesToScroll: 1
    });
  });
</script>
</body>
</html>
