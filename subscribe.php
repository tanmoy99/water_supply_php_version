<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subscribe Page</title>
  <link rel="stylesheet" href="frontend/suscribe.css">
</head>
<body>
  <header>
    <h1>Subscribe With Us</h1>
    <p>Subscribe With Us to Get Water At Your Doorstep</p>
  </header>

  <main>
    <form class="subscribe-form">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone" required>

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required>

      <label for="bottle-size">Select Bottle Size:</label>
      <select id="bottle-size" name="bottle-size" required>
        <option value="" disabled selected>Select Size</option>
        <option value="20">20 Liters</option>
        <option value="40">40 Liters</option>
        <option value="premium">Premium 40 Liters</option>
      </select>

      <label>Select Delivery Frequency:</label>
      <div class="frequency-options">
        <label><input type="radio" name="frequency" value="daily" required> Daily</label>
        <label><input type="radio" name="frequency" value="weekly"> Weekly</label>
        <label><input type="radio" name="frequency" value="monthly"> Monthly</label>
      </div>

      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" min="1" required>

      <p>Total Price Monthly: <span id="total-price">0.00 Taka</span></p>

      <button type="submit" class="subscribe-button">Subscribe</button>
    </form>
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const bottleSizeSelect = document.getElementById("bottle-size");
      const quantityInput = document.getElementById("quantity");
      const frequencyOptions = document.getElementsByName("frequency");
      const totalPriceElement = document.getElementById("total-price");

      // Define prices for different bottle sizes
      const prices = {
        "20": 60,
        "40": 90,
        "premium": 120
      };

      // Function to update the total price
      function updateTotalPrice() {
        const selectedSize = bottleSizeSelect.value;
        const quantity = quantityInput.value;
        const selectedFrequency = Array.from(frequencyOptions).find(option => option.checked)?.value;

        if (!selectedFrequency) {
          return;
        }

        const pricePerDelivery = prices[selectedSize];
        const totalPrice = calculateTotalPrice(pricePerDelivery, quantity, selectedFrequency);
        totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
      }

      // Function to calculate total price based on frequency
      function calculateTotalPrice(price, quantity, frequency) {
        switch (frequency) {
          case "daily":
            return price * quantity * 30; // Assuming 30 days in a month
          case "weekly":
            return price * quantity * 4;  // Assuming 4 weeks in a month
          case "monthly":
            return price * quantity;
          default:
            return 0;
        }
      }

      // Listen for changes in bottle size, quantity, and frequency
      bottleSizeSelect.addEventListener("change", updateTotalPrice);
      quantityInput.addEventListener("input", updateTotalPrice);
      frequencyOptions.forEach(option => option.addEventListener("change", updateTotalPrice));
    });
  </script>
  <footer>
    <p>&copy; 2023 AQUA DROPS. All rights reserved.</p>
  </footer>
</body>
</html>
