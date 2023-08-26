<?php
session_start();
$userLoggedIn = false; // Assume user is not logged in by default

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userLoggedIn = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta tags and title -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Navigation Bar</title>
  <link rel="stylesheet" href="frontend/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
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

  <section class="slider-container">
    <div class="slider">
      <div class="slider">
        <div><img src="frontend/img/add.jpg" alt="Ad 1"></div>
        <div><img src="frontend/img/add1.jpg" alt="Ad 2"></div>
        <div><img src="frontend/img/add2.jpg" alt="Ad 3"></div>
    </div>
    </div>
  </section>

  <!-- Subscribe section -->
  <section class="subscribe-section">
    <h2>Subscribe With Us</h2>
    <p>Stay Hydrated!</p>
    <a href="http://localhost/water_supply_php_version/subscribe.php" class="subscribe-button">Subscribe</a>
</section>


  <!-- Product listing section -->
<section class="product-listing">
    <h2>Product Listing</h2>
    <!-- Product 1 -->
    <div class="product">
      <img src="frontend/img/20 litter.jpg" alt="Product 1">
      <h3> 10 Liter Watter Bottle</h3>
      <p>10 Ltr.</p>
      <span>80 Taka</span>
      <button>Add to Cart</button>
    </div>

    <!-- Product 2 -->
    <div class="product">
      <img src="frontend/img/30 litter.jpg" alt="Product 2">
      <h3>30  Liter Water Can</h3>
      <p>30 Ltr</p>
      <span>90 Taka</span>
      <button>Add to Cart</button>
    </div>

    <!-- Product 3 -->
    <div class="product">
      <img src="frontend/img/40 litter.jpg" alt="Product 3">
      <h3>40 Liter Water Can</h3>
      <p>40 Ltr</p>
      <span>110Taka</span>
      <button>Add to Cart</button>
    </div>
    <!-- Product 4 -->
    <div class="product">
      <img src="frontend/img/1litter.jpg" alt="Product 3">
      <h3>1 liter Water Bottles</h3>
      <p>Case Of 9 Bottles</p>
      <span>225 Taka</span>
      <button>Add to Cart</button>
    </div>
    <div class="show-all-products">
      <a href="{{ url('/products') }}">
        <button>Show All Products</button>
      </a>
    </div>
  </section>

  <!-- Stay Hydrated and Stay Fresh section -->
  <section class="stay-hydrated-section">
    <h2>Stay Hydrated and Stay Fresh – Throughout the Day!</h2>
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



<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
  // Initialize the Slick Slider
  $(document).ready(function(){
    $('.slider').slick({
      dots: true,
      infinite: true,
      speed: 500,
      autoplay: true,
      autoplaySpeed: 3000,
      slidesToShow: 1,
      slidesToScroll: 1
    });
  });
</script>
</body>
</html>
