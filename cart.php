<?php
session_start();
$userLoggedIn = false; // Assume user is not logged in by default

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userLoggedIn = true;
}

$totalAmount = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="frontend/style.css">
    <link rel="stylesheet" href="frontend/cart.css">
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
<main>
    <section class="section-9 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table" id="cart">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
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

                                // Fetch cart items for the logged-in user
                                $userId = $_SESSION['user_id'];
                                $cartSql = "SELECT * FROM cart WHERE user_id = '$userId'";
                                $cartResult = $conn->query($cartSql);

                                if ($cartResult->num_rows > 0) {
                                    while ($cartItem = $cartResult->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>';
                                        echo '<div class="d-flex align-items-center justify-content-center">';
                                        echo '<h2>' . $cartItem["product_name"] . '</h2>';
                                        echo '</div>';
                                        echo '</td>';
                                        echo '<td>' . $cartItem["price"] . '</td>';
                                        echo '<td>';
                                        echo '<div class="input-group quantity mx-auto" style="width: 100px;">';
                                        echo '<div class="input-group-btn">';
                                        echo '<button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1"><i class="fa fa-minus"></i></button>';
                                        echo '</div>';
                                        echo '<input type="text" class="form-control form-control-sm  border-0 text-center" value="1">';
                                        echo '<div class="input-group-btn">';
                                        echo '<button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1"><i class="fa fa-plus"></i></button>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</td>';
                                        echo '<td>' . $cartItem["price"] . '</td>';
                                        echo '<td>';
                                        echo '<button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="5">Your cart is empty.</td></tr>';
                                }

                                // Close the database connection
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card cart-summary">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summary</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                                <div>Subtotal</div>
                                <div>$<?php echo $totalAmount; ?></div>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <div>Shipping</div>
                                <div>$20</div>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                                <div>Total</div>
                                <div>$<?php echo $totalAmount + 20; ?></div>
                            </div>
                            <div class="pt-5">
                                <a href="checkout.php" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                    <div class="input-group apply-coupon mt-4">
                        <input type="text" placeholder="Coupon Code" class="form-control">
                        <button class="btn btn-dark" type="button" id="button-addon2">Apply Coupon</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
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





