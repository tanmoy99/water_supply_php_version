<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="frontend/style.css">
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
      <a href="http://localhost/demophp/index.php"><img src="frontend/img/download.jfif" alt="Company Logo" style="width: 90px; height: 100px;">
      </a>
    </div>
    <nav class="navbar-icons">
      <a href="#"><img src="frontend/img/grocery-store.png" alt="Cart">Cart</a>
      <a href="#"><img src="frontend/img/avatar.png" alt="Login">LogIn</a>
      <a href="http://localhost/demophp/products.php"><img src="frontend/img/product.png" alt="Products">Products</a>
      <a href="http://localhost/demophp/aboutUs.php"><img src="frontend/img/contact-us.png" alt="Products">ABOUT US</a>
    </nav>
  </header>

  <section class="product-section">
    <div class="product-category">
        <h2>Marchents</h2>
        <!-- Add Machinist product items here -->
        <section class="product-listing">
            <!-- Product 1 -->
            <div class="product" id="pureit">
                <img src="frontend/img/pure_it.png" alt="Product 1">
                <h3>Unilever Pureit Classic Water Purifier 23L</h3>
                <p>Water Purifier 23L</p>
                <span>5000 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 2 -->
            <div class="product" id="water_dispensar">
                <img src="frontend/img/water_dispensar.png" alt="Product 2">
                <h3>Water Dispensar</h3>
                <p>25L Bottle Water Dispenser</p>
                <span>3000 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 3 -->
            <div class="product" id="paper_cup">
                <img src="frontend/img/paper_cup.png" alt="Product 3">
                <h3>Recyclable Paper Cup</h3>
                <p>100 pcs</p>
                <span>50 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 4 -->
            <div class="product" id="black_mug">
                <img src="frontend/img/black_mug.png" alt="Product 4">
                <h3>Black Mug</h3>
                <p>1 pcs</p>
                <span>550 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 5 -->
            <div class="product" id="paper_coffee_cup">
                <img src="frontend/img/paper_coffee_cup.png" alt="Product 5">
                <h3>One time Coffee Cup</h3>
                <p>12 pcs</p>
                <span>100 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 6 -->
            <div class="product" id="metal_bottle">
                <img src="frontend/img/metal_bottle.png" alt="Product 6">
                <h3>Metal Water Bottle</h3>
                <p>1L Metal body thermoflusk bottle</p>
                <span>800 Taka</span>
                <button>Add to Cart</button>
            </div>
        </section>
    </div>

    <div class="product-category">
        <h2>Soft Drinks</h2>
        <!-- Add Soft Drinks product items here -->
        <section class="product-listing">
            <!-- Product 1 -->
            <div class="product" id="up">
                <img src="frontend/img/7up.png" alt="Product 1">
                <h3>7up 1 Ltr Bottle</h3>
                <p>Single</p>
                <span>100 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 2 -->
            <div class="product" id="can_7up">
                <img src="frontend/img/7up_can.png" alt="Product 2">
                <h3>7up can 125 ml</h3>
                <p>Single</p>
                <span>60 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 3 -->
            <div class="product" id="coke">
                <img src="frontend/img/coke_1L.png" alt="Product 3">
                <h3>Cocacola 1.25L</h3>
                <p>Single</p>
                <span>110 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 4 -->
            <div class="product" id="dew">
                <img src="frontend/img/dew_1L.png" alt="Product 4">
                <h3>Mountain Dew</h3>
                <p>Case Of 6 Bottles</p>
                <span>550 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 5 -->
            <div class="product" id="fanta">
                <img src="frontend/img/fanta_1L.png" alt="Product 5">
                <h3>Fanta 1L</h3>
                <p>Single</p>
                <span>90 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 6 -->
            <div class="product" id="sprite">
                <img src="frontend/img/sprite.png" alt="Product 6">
                <h3>Sprite 1L</h3>
                <p>Single</p>
                <span>90 Taka</span>
                <button>Add to Cart</button>
            </div>
        </section>
    </div>

    <div class="product-category">
        <h2>Water Bottles</h2>
        <!-- Add Water Bottles product items here -->
        <section class="product-listing">
            <!-- Product 1 -->
            <div class="product">
                <img src="frontend/img/20 litter.jpg" alt="Product 1">
                <h3>10 Liter Water Bottle</h3>
                <p>10 Ltr.</p>
                <span>80 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 2 -->
            <div class="product">
                <img src="frontend/img/30 litter.jpg" alt="Product 2">
                <h3>30 Liter Water Can</h3>
                <p>30 Ltr</p>
                <span>90 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 3 -->
            <div class="product">
                <img src="frontend/img/40 litter.jpg" alt="Product 3">
                <h3>40 Liter Water Can</h3>
                <p>40 Ltr</p>
                <span>110 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 4 -->
            <div class="product">
                <img src="frontend/img/1litter.jpg" alt="Product 4">
                <h3>1 Liter Water Bottles</h3>
                <p>Case Of 9 Bottles</p>
                <span>225 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 5 -->
            <div class="product">
                <img src="frontend/img/2ltr.jpg" alt="Product 5">
                <h3>2 Liter Water Bottles</h3>
                <p>Case Of 6 Bottles</p>
                <span>240 Taka</span>
                <button>Add to Cart</button>
            </div>

            <!-- Product 6 -->
            <div class="product">
                <img src="frontend/img/500-ml-.jpg" alt="Product 6">
                <h3>500 ML Water Bottles</h3>
                <p>Case Of 24 Bottles</p>
                <span>480 Taka</span>
                <button>Add to Cart</button>
            </div>
        </section>
    </div>
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
  <!-- Include this script tag at the end of the body -->
<script>
  // Define an object to store cart items
  const cart = {};

  // Add event listeners to all "Add to Cart" buttons
  const addToCartButtons = document.querySelectorAll('.add-to-cart');
  addToCartButtons.forEach(button => {
      button.addEventListener('click', () => {
          const productName = button.previousElementSibling.previousElementSibling.textContent;
          const price = button.previousElementSibling.textContent.replace('Taka', '').trim();

          if (cart[productName]) {
              cart[productName].quantity += 1;
          } else {
              cart[productName] = {
                  quantity: 1,
                  price: parseFloat(price),
              };
          }

          updateCartDisplay();
      });
  });

  // Update the cart display in the UI
  function updateCartDisplay() {
      const cartDisplay = document.querySelector('.cart-display');
      let cartItems = '';

      for (const product in cart) {
          const { quantity, price } = cart[product];
          const total = (quantity * price).toFixed(2);
          cartItems += `${product}: ${quantity} (Total: ${total} Taka)<br>`;
      }

      cartDisplay.innerHTML = cartItems;
  }
</script>
</body>
</html>